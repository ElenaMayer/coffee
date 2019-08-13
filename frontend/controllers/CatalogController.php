<?php

namespace frontend\controllers;

use common\models\Category;
use common\models\Product;
use yii\data\ActiveDataProvider;
use yii\helpers\Url;
use Yii;

class CatalogController extends \yii\web\Controller
{
    public function beforeAction($action)
    {
        if (parent::beforeAction($action)) {
            Url::remember();
            return true;
        } else {
            return false;
        }
    }

    public function actionList($categoryId) {

        $categories = Category::find()->indexBy('id')->orderBy('id')->all();

        $productsQuery = Product::find()->where(['is_active' => 1]);
        return $this->listCatalog($categoryId, $categories, $productsQuery);
    }

    public function actionSale($categorySlug){
        $categories = Category::find()->indexBy('id')->orderBy('id')->all();

        $productsQuery = Product::find()->where(['is_active' => 1])->andWhere(['not', ['new_price' => null]]);
        return $this->listCatalog($categorySlug, $categories, $productsQuery);
    }

    public function listCatalog($categorySlug, $categories, $productsQuery){
        /** @var Category $category */
        $category = null;
        $get = Yii::$app->request->get();
        if (!empty($get) && isset($get['urlParams'])){
            $this->redirect($get['urlParams']);
        }

        $this->prepareFilter($productsQuery);
        if ($categorySlug !== null) {
            $category = Category::find()->where(['slug' => $categorySlug])->one();
        }
        if ($category) {
            if(!$category->parent)
                $productsQuery->andWhere(['category_id' => $this->getCategoryIds($categories, $category->id)]);
            else {
                $productsQuery->andWhere(['REGEXP', 'subcategories','^'.$category->id.'$|^'.$category->id.',.+|^.+,'.$category->id.'$|^.+,'.$category->id.',']);
            }
        }
        $productsDataProvider = new ActiveDataProvider([
            'query' => $productsQuery,
            'pagination' => [
                'pageSize' => Yii::$app->params['catalogPageSize'],
            ],
        ]);
        return $this->render('list', [
            'category' => isset($category)? $category : null,
            'menuItems' => Category::getMenuItems($category->id),
            'models' => $productsDataProvider->getModels(),
            'pagination' => $productsDataProvider->getPagination(),
            'pageCount' => $productsDataProvider->getCount(),
            'noveltyProducts' => Product::getNovelties(),
        ]);
    }

    private function prepareFilter(&$query){
        if($get = Yii::$app->request->get()){
            if(isset($get['color']) && $get['color'] != 'all'){
                $query->andWhere(['color' => $get['color']]);
            }
            if(isset($get['size']) && $get['size'] != 'all'){
                $query->joinWith('sizes')
                    ->andWhere(['{{product_size}}.size' => $get['size']])
                    ->andWhere(['>', '{{product_size}}.count', 0]);
            }
            if(isset($get['min_price']) && isset($get['max_price'])){
                $query->andWhere(['between', 'price', $get['min_price'], $get['max_price']]);
            }
            if(isset($get['order'])){
                if ($get['order'] == 'price_lh'){
                    $query->select(['*', '(CASE WHEN new_price > 0 THEN new_price ELSE price END) as price_common']);
                    $query->orderBy('price_common ASC');
                } elseif ($get['order'] == 'price_hl'){
                    $query->select(['*', '(CASE WHEN new_price > 0 THEN new_price ELSE price END) as price_common']);
                    $query->orderBy('price_common DESC');
                } elseif ($get['order'] == 'sale'){
                    $query->select(['*', '(CASE WHEN new_price > 0 THEN (price/new_price) ELSE 0 END) as sale']);
                    $query->orderBy('is_in_stock DESC, sale DESC');
                } else {
                    $query->orderBy('is_in_stock DESC, id DESC');
                }
            } else {
                $query->orderBy('is_in_stock DESC, id DESC');
            }
        } else {
            $query->orderBy('is_in_stock DESC, id DESC');
        }
    }

    public function actionProduct($categoryId, $productId)
    {
        $product = Product::find()->where(['id' => $productId])->one();

        if($product && $product->is_active){
            $category = Category::find()->where(['slug' => $categoryId])->one();

            return $this->render('product', [
                'category' => $category,
                'product' => $product,
            ]);
        } else {
            return $this->redirect('/catalog/list');
        }
    }

    public function actionView()
    {
        return $this->render('view');
    }

    /**
     * @param Category[] $categories
     * @param int $activeId
     * @param int $parent
     * @return array
     */
    private function getMenuItems($categories, $activeId = null, $parent = null)
    {
        $menuItems = [];
        foreach ($categories as $category) {
            if ($category->parent_id === $parent) {
                $menuItems[$category->id] = [
                    'active' => $activeId === $category->id,
                    'label' => $category->title,
                    'url' => ['catalog/list', 'id' => $category->id],
                    'items' => $this->getMenuItems($categories, $activeId, $category->id),
                ];
            }
        }
        return $menuItems;
    }


    /**
     * Returns IDs of category and all its sub-categories
     *
     * @param Category[] $categories all categories
     * @param int $categoryId id of category to start search with
     * @param array $categoryIds
     * @return array $categoryIds
     */
    private function getCategoryIds($categories, $categoryId, &$categoryIds = [])
    {
        foreach ($categories as $category) {
            if ($category->id == $categoryId) {
                $categoryIds[] = $category->id;
            }
            elseif ($category->parent_id == $categoryId){
                $this->getCategoryIds($categories, $category->id, $categoryIds);
            }
        }
        return $categoryIds;
    }
}

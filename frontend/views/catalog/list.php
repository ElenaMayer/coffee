<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
use common\models\StaticFunction;
use common\models\Category;

/* @var $this yii\web\View */
$title = $category === null ? 'Каталог' : $category->title;
$this->title = Html::encode($title);
$this->params['breadcrumbs'][] = $this->title;
?>

<section class="section section-shop -pdtop0">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-md-offset-1">
                <div class="shop-filter">
                    <div class="shop-filter_block -white -mob50">
                        <div class="shop-filter_title">Категории</div>
                        <div class="filter-list">
                            <?php foreach (Category::find()->all() as $cat):?>
                                <a href="/catalog/<?=$cat->slug?>" class="filter-list_main_link <?php if($cat->id == $category->id):?>active<?php endif;?>" data-toggle="collapse"><?=$cat->title?> (<?= count($cat->products) ?>) <i class="fa fa-angle-right"></i></a>
                            <?php endforeach;?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-7 half-col-pd-lt">
                <div class="shop-filter">
                    <div class="shop-filter_top-block clearfix">
                        <div class="shop-filter_info">
                            <?php
                            $begin = $pagination->getPage() * $pagination->pageSize + 1;
                            $end = $begin + $pageCount - 1;
                            ?>
                            Товары <?= $begin ?>-<?= $end ?> из <?= $pagination->totalCount ?>
                        </div>
                        <div class="shop-filter_sort">
                            <span class="shop-filter_sort-title">Сортировать по:</span>

                            <select name="orderby" class="selectpicker" id="p_sort_by" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                                <option value="<?= StaticFunction::addGetParamToCurrentUrl('order', 'popular') ?>" <?php if(!Yii::$app->request->get('order') || Yii::$app->request->get('order') == 'popular'):?>selected="selected"<?php endif;?>>По популярности</option>
                                <option data-icon="fa fa-sort-amount-asc" value="<?= StaticFunction::addGetParamToCurrentUrl('order', 'price_asc') ?>" <?php if(!Yii::$app->request->get('order') || Yii::$app->request->get('order') == 'price_asc'):?>selected="selected"<?php endif;?>>По цене</option>
                                <option data-icon="fa fa-sort-amount-desc" value="<?= StaticFunction::addGetParamToCurrentUrl('order', 'price_desc') ?>" <?php if(!Yii::$app->request->get('order') || Yii::$app->request->get('order') == 'price_desc'):?>selected="selected"<?php endif;?>>По цене</option>
                                <option data-icon="fa fa-sort-alpha-asc" value="<?= StaticFunction::addGetParamToCurrentUrl('order', 'title_asc') ?>" <?php if(!Yii::$app->request->get('order') || Yii::$app->request->get('order') == 'title_asc'):?>selected="selected"<?php endif;?>>По названию</option>
                                <option data-icon="fa fa-sort-alpha-desc" value="<?= StaticFunction::addGetParamToCurrentUrl('order', 'title_desc') ?>" <?php if(!Yii::$app->request->get('order') || Yii::$app->request->get('order') == 'title_desc'):?>selected="selected"<?php endif;?>>По названию</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="shop-grid -col-3 -center">
                    <div class="row">
                        <?php foreach (array_values($models) as $index => $model) :?>
                            <?= $this->render('_product', ['model'=>$model]); ?>
                        <?php endforeach;?>
                    </div>
                    <nav aria-label="Page navigation">
                        <?php echo LinkPager::widget([
                            'pagination' => $pagination,
                            'options' => [
                                'class' => 'pagination right clear',
                            ],
                            'pageCssClass' => 'page-numbers',
                            'firstPageLabel' => false,
                            'firstPageCssClass' => 'page-numbers',
                            'lastPageLabel' => false,
                            'lastPageCssClass' => 'page-numbers',
                            'activePageCssClass' => 'active',
                            'prevPageCssClass' => 'page-numbers',
                            'nextPageCssClass' => 'page-numbers next',
                            'prevPageLabel' => '<i class="fa fa-angle-left"></i>',
                            'nextPageLabel' => '<i class="fa fa-angle-right"></i>',
                            'maxButtonCount' => 6
                        ]); ?>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
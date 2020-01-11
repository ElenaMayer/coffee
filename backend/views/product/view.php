<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use common\models\Category;

/* @var $this yii\web\View */
/* @var $model common\models\Product */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Товары', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-view">

    <h1><a href='https://<?= Yii::$app->params['domain']?>/catalog/<?=$model->category->slug?>/<?=$model->id?>'><?= Html::encode($this->title) ?></a></h1>

    <div class="product-images">
        <?php foreach ($model->images as $image):?>
            <div class="product-image">
                <?= Html::a('x', ['/image/delete', 'id' => $image->id], ['class' => 'image_remove']) ?>
                <?= Html::img($image->getUrl('small'));?>
            </div>
        <?php endforeach;?>
    </div>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Удалить? :)',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'category_id',
                'value' => function ($model) {
                    return empty($model->category_id) ? '-' : $model->category->title;
                },
            ],
            'article',
            'title',
            'description:ntext',
            'price',
            [
                'attribute' => 'is_active',
                'value' => function ($model) {
                    return $model->is_active ? 'Да' : 'Нет';
                },
            ],
            [
                'attribute' => 'is_in_stock',
                'value' => function ($model) {
                    return $model->is_in_stock ? 'Да' : 'Нет';
                },
            ],
            'time'
        ],
    ]) ?>

    <?php if($model->relations):?>
        <h2><?= $model->getAttributeLabel('relationsArr'); ?></h2>

        <div class="product-images">
            <?php foreach ($model->relations as $relation):?>
                <div class="product-image">
                    <a href="<?= Url::toRoute(['product/view', 'id' => $relation->child_id])?>">
                        <?= Html::img($relation->child->images[0]->getUrl('small'));?>
                    </a>
                </div>
            <?php endforeach;?>
        </div>
    <?php endif;?>
</div>

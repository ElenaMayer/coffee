<?php
use yii\helpers\Html;
use yii\helpers\Markdown;
?>

<div class="col-sm-6 col-md-6 col-lg-4">
    <div class="shop-item -center">
        <a href="/catalog/<?= $model->category->slug ?>/<?= $model->id ?>" class="shop-img">
            <?php
            $images = $model->images;
            if (isset($images[0])) {
                echo Html::img($images[0]->getUrl(), ['width' => '100%']);
            }
            ?>
        </a>
        <h5 class="shop-title"><?= Html::encode($model->title) ?></h5>
        <p class="shop-descr"><?= $model->category->title ?></p>
        <div class="shop-content_bot clearfix">
            <div class="shop-price"><?= $model->price ?><span><i class="fa fa-ruble"></i></span></div>
            <div class="shop-overlay">
                <ul class="shop-info_list">
                    <li><?= Html::a('<i class="fa fa-shopping-cart" aria-hidden="true"></i>', ['cart/add', 'id' => $model->id])?></li>
                    <li><a href="/catalog/<?= $model->category->slug ?>/<?= $model->id ?>"><i class="fa fa-arrow-right" aria-hidden="true"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
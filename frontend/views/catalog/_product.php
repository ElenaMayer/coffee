<?php
use yii\helpers\Html;
use yii\helpers\Markdown;
?>

<div class="col-sm-6 col-md-6 col-lg-4">
    <div class="shop-item -center <?php if($model->getIsInStock()):?>active<?php endif;?>">
        <a href="/catalog/<?= $model->category->slug ?>/<?= $model->id ?>" class="shop-img">
            <?php
            $images = $model->images;
            if (isset($images[0])) {
                echo Html::img($images[0]->getUrl('medium'), ['width' => '100%']);
            }
            ?>
        </a>
        <?php if(!$model->getIsInStock()):?>
            <span class="sold-out valign">Нет в наличии</span>
        <?php endif;?>
        <h5 class="shop-title"><?= Html::encode($model->title) ?></h5>
        <p class="shop-descr"><?= $model->category->title ?></p>
        <div class="shop-content_bot clearfix">
            <div class="shop-price"><?= $model->price ?><span><i class="fa fa-ruble"></i></span></div>
            <div class="shop-overlay">
                <?php if($model->getIsInStock()):?>
                    <div class="cd-customization shop-info_list">
                        <button data-id ="<?=$model->id?>" type="button" class="add-to-cart">
                            <em><span>В корзину </span><i class="fa fa-shopping-cart" aria-hidden="true"></i></em>
                            <svg x="0px" y="0px" width="32px" height="32px" viewBox="0 0 32 32">
                                <path stroke-dasharray="19.79 19.79" stroke-dashoffset="19.79" fill="none" stroke="#FFFFFF" stroke-width="2" stroke-linecap="square" stroke-miterlimit="10" d="M9,17l3.9,3.9c0.1,0.1,0.2,0.1,0.3,0L23,11"/>
                            </svg>
                        </button>
                    </div>
                <?php endif;?>
            </div>
        </div>
    </div>
</div>
<?php
use yii\helpers\Html;
use yii\helpers\Markdown;
use common\models\Product;

$title = $product->title;
$this->params['breadcrumbs'][] = ['label' => $category->title, 'url' => ['/catalog/' . $category->slug]];
$this->params['breadcrumbs'][] = $title;
$this->title = Html::encode($title);
?>

<section class="section section-product -pd_top_0">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-7 ">
                <div class="product-img_slider clearfix">
                    <div class="product-img_slider_nav" id="product-img_slider_nav">
                        <?php
                        $images = $product->images;?>
                        <?php foreach ($images as $image):?>
                            <div class="product-img_slider_nav-item">
                                <a href="javascript:void(0);">
                                    <img src="img/img-coffee.png" alt="">
                                    <?php echo Html::img($image->getUrl('small'), ['alt' => $product->title]);?>
                                </a>
                            </div>
                        <?php endforeach;?>
                    </div>
                    <div class="product-img_slider_for">
                        <?php foreach ($images as $image):?>
                            <div class="item">
                                <a href="javascript:void(0);">
                                    <?php echo Html::img($image->getUrl(), ['alt' => $product->title]);?>
                                </a>
                            </div>
                        <?php endforeach;?>
                    </div>
                </div>
            </div>
            <div class="col-md-5 ">
                <h3 class="product-inner_title"><?= Html::encode($product->title) ?></h3>
                <span class="product-inner_subtitle"><?= $product->category->title?></span>
                <div class="product-inner_price_block">
                    <div class="product-inner_price_new"><?= $product->price ?><i class="fa fa-ruble"></i></div>
                </div>
                <p class="product-inner_descr"><?= Markdown::process($product->description) ?></p>
                <?= Html::a('<span>В корзину</span><i class="fa fa-shopping-cart" aria-hidden="true"></i>', ['cart/add', 'id' => $product->id], ['class' => 'btn btn-md btn-primary btn-upper btn-ico'])?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-9 col-md-offset-2">
                <span class="product-more">
                    НОВИНКИ
                </span>
                <div class="shop">
                    <div class="shop-grid -col-4">
                        <div class="row">
                            <?php foreach (Product::getNovelties(3) as $product):?>
                                <?php
                                $images = $product->images;
                                ?>
                                <div class="col-sm-6 col-md-6 col-lg-4">
                                    <div class="shop-item">
                                        <a href="/catalog/<?= $product->category->slug?>/<?= $product->id?>" title="<?= $product->title?>" class="shop-img">
                                            <img src="<?=$images[0]->getUrl('medium')?>" alt="<?= $product->title?>">
                                        </a>
                                        <h5 class="shop-title"><?= $product->title?></h5>
                                        <p class="shop-descr"><?= $product->category->title?></p>
                                        <div class="shop-content_bot clearfix">
                                            <div class="shop-price"><?= $product->price?><i class="fa fa-ruble"></i></div>
                                            <?= Html::a('<span>В корзину</span><i class="fa fa-caret-right" aria-hidden="true"></i>', ['cart/add', 'id' => $product->id], ['class' => 'shop-buy'])?>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach;?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
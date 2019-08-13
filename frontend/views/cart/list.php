<?php
use \yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $products common\models\Product[] */

$title = 'Корзина';
$this->title = Html::encode($title);
$this->params['breadcrumbs'][] = $this->title;
?>

<section class="section section-shop -cart">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="cart">
                    <div class="cart-table">
                        <div class="row cart-table_title">
                            <div class="col-sm-2 cart-product_img" >
                            </div>
                            <div class="col-sm-3 cart-product_title-block -center">
                                Товар
                            </div>
                            <div class="col-sm-2 cart-product_price -center">
                                Цена
                            </div>
                            <div class="col-sm-2 cart-product_quantity -center">
                                Количество
                            </div>
                            <div class="col-sm-2 cart-product_total-price -center">
                                Всего
                            </div>
                            <div class="col-sm-1 cat-product_del">

                            </div>
                        </div>
                        <?php foreach($products as $product):?>
                            <div class="row cart-table_descr">
                            <div class="col-sm-2 col-xs-4  cart-product_img" >
                                <div class="cart-img">
                                    <?php
                                    $images = $product->images;
                                    if (isset($images[0])) {
                                        echo Html::img($images[0]->getUrl(), ['width' => '100%', 'alt' => $product->title]);
                                    }?>
                                </div>
                            </div>
                            <div class="col-sm-3 col-xs-8 cart-product_title-box -center">
                                <div class="cart-product">
                                    <h5 class="cart-product_title"><?= Html::encode($product->title) ?></h5>
                                    <span class="cart-product_subtitle"><?= $product->category->title?></span>
                                </div>
                            </div>
                            <div class="col-sm-2 col-xs-8 cart-product_price -center">
                                <div class="cart-price">
                                    <?= $product->price ?><span><i class="fa fa-ruble"></i>
                                </div>
                            </div>
                            <div class="col-sm-2 cart-product_quantity -center">
                                <div>
                                    <?= $quantity = $product->getQuantity()?>
                                    <?= Html::a('-', ['cart/update', 'id' => $product->getId(), 'quantity' => $quantity - 1], ['class' => 'btn btn-danger', 'disabled' => ($quantity - 1) < 1])?>
                                    <?= Html::a('+', ['cart/update', 'id' => $product->getId(), 'quantity' => $quantity + 1], ['class' => 'btn btn-success'])?>
                                </div>
                            </div>
                            <div class="col-sm-2  cart-product_total-price -center">
                                <div class="cart-price -strong"><?= $product->getCost() ?><i class="fa fa-ruble"></i></div>
                            </div>
                            <div class="col-sm-1  cat-product_del -center">
                                <div>
                                    <?= Html::a('<i class="fa fa-times" aria-hidden="true"></i>', ['cart/remove', 'id' => $product->getId()], ['class' => 'cart-close'])?>
                                </div>
                            </div>
                        </div>
                        <?php endforeach;?>
                    </div>
                    <div class="cart-checkout_wrapper">
                        <div class="cart-checkout">
                            <?= Html::a('<span>Оформить заказ</span><i class="fa fa-long-arrow-right" aria-hidden="true"></i>', ['cart/order'], ['class' => 'btn btn-md btn-primary btn-ico btn-upper -mg_rt10'])?>
                            <div class="cart-total">
                                <h5 class="cart-total_title">ИТОГО:</h5>
                                <div class="cart-total_price">
                                    <?= $total ?><i class="fa fa-ruble"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
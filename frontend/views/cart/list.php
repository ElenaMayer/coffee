<?php
use \yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $products common\models\Product[] */

$title = 'Корзина';
$this->title = Html::encode($title);
$this->params['breadcrumbs'][] = $this->title;

$cart = \Yii::$app->cart;
?>

<?php if($cart->getCount() > 0):?>
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
                                Наименование
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
                            <?php if($product->getIsActive()):?>
                                <div class="row cart-table_descr">
                                    <div class="col-sm-2 col-xs-4  cart-product_img" >
                                        <div class="cart-img">
                                            <a href="/catalog/<?= $product->category->slug ?>/<?= $product->id ?>">
                                                <?php
                                                $images = $product->images;
                                                if (isset($images[0])) {
                                                    echo Html::img($images[0]->getUrl('small'), ['width' => '100%', 'alt' => $product->title]);
                                                }?>
                                            </a>
                                            <?php if(!$product->getIsInStock()):?>
                                                <span class="sold-out valign">Нет в наличии</span>
                                            <?php endif;?>
                                        </div>
                                    </div>
                                    <div class="col-sm-3 col-xs-8 cart-product_title-box -center">
                                        <div class="cart-product">
                                            <a href="/catalog/<?= $product->category->slug ?>/<?= $product->id ?>"><h5 class="cart-product_title"><?= Html::encode($product->title) ?></h5></a>
                                            <span class="cart-product_subtitle">Арт. <?= $product->article?></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-2 col-xs-8 cart-product_price -center">
                                        <div class="cart-price">
                                            <?= $product->price ?><span><i class="fa fa-ruble"></i>
                                        </div>
                                    </div>
                                    <div class="col-sm-2 cart-product_quantity -center">
                                        <div>
                                            <?php if($product->getIsInStock()):?>
                                                <?php $quantity = $product->getQuantity()?>
                                                <a data-id="<?= $product->getId() ?>" id="cart-qty-minus" class="btn <?php if(($quantity - 1) < 1):?>disabled<?php endif;?>">-</a>
                                                <span class="qty"><?= $quantity ?></span>
                                                <a data-id="<?= $product->getId() ?>" id="cart-qty-plus" class="btn">+</a>
                                            <?php else:?>
                                                0
                                            <?php endif;?>
                                        </div>
                                    </div>
                                    <div class="col-sm-2 cart-product_total-price -center">
                                        <div class="cart-price -strong"><span><?= $product->getCost() ?></span><i class="fa fa-ruble"></i></div>
                                    </div>
                                    <div class="col-sm-1 cat-product_del -center">
                                        <div>
                                            <a data-id="<?= $product->getId() ?>" id="remove_cart_item" class="cart-close"><i class="fa fa-times" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </div>
                            <?php endif;?>
                        <?php endforeach;?>
                    </div>
                    <div class="cart-checkout_wrapper">
                        <div class="cart-checkout">
                            <?= Html::a('<span>Оформить заказ</span><i class="fa fa-long-arrow-right" aria-hidden="true"></i>', ['cart/order'], ['class' => 'btn btn-md btn-primary btn-ico btn-upper -mg_rt10'])?>
                            <div class="cart-total">
                                <h5 class="cart-total_title">ИТОГО:</h5>
                                <div class="cart-total_price">
                                    <span><?= $total ?></span><i class="fa fa-ruble"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php else: ?>
    <section class="section section-shop -cart">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="cart">
                        <div class="cart-empty">
                            Ваша корзина в данный момент пуста.
                        </div>
                    </div>
                    <p class="return-to-shop">
                        <a class="btn btn-md btn-primary btn-ico btn-upper -mg_rt10" href="/catalog/coffee">
                            Вернуться к покупкам
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </section>
<?php endif;?>
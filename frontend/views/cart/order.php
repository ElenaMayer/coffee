<?php
use \yii\helpers\Html;
use \yii\bootstrap\ActiveForm;
use common\models\Order;

/* @var $this yii\web\View */
/* @var $products common\models\Product[] */

$title = 'Оформление заказа';
$this->title = Html::encode($title);
$this->params['breadcrumbs'][] = $this->title;
?>

<section class="section section-checkout">
    <div class="container-fluid">
        <div class="checkout">
            <?php
            /* @var $form ActiveForm */
            $form = ActiveForm::begin([
                'id' => 'order-form',
            ]) ?>

                <div class="row">
                    <div class="col-md-6 col-md-offset-1">
                        <h5 class="checkout-title">Детали заказа</h5>
                        <div class="checkout-form">
                            <div class="row">
                                <div class="col-md-12">
                                    <?= $form->field($order, 'fio') ?>
                                </div>
                                <div class="col-md-6">
                                    <?= $form->field($order, 'email') ?>
                                </div>
                                <div class="col-md-6">
                                    <?= $form->field($order, 'phone') ?>
                                </div>
                            </div>
                            <?= $form->field($order, 'shipping_method')->dropDownList(Order::getShippingMethods()); ?>
                            <div class="shipping_methods" style="display: none">
                                <?= $form->field($order, 'address')->textInput(['placeholder' => 'Новосибирск, ул.Ленина д.1 кв.1', 'class' => 'form-control dark order-address']); ?>
                            </div>
                            <?= $form->field($order, 'payment_method')->dropDownList(Order::getPaymentMethods()); ?>
                            <?= $form->field($order, 'notes')->textarea() ?>
                        </div>
                    </div>
                    <div class="col-md-4 half-col-pd-lt">
                        <h5 class="checkout-title">ВАШ ЗАКАЗ</h5>
                        <table class="table checkout-table">
                            <thead>
                            <tr>
                                <th style="width: 45%;" class="text-left">Товар</th>
                                <th style="width: 35%;"></th>
                                <th style="width: 20%;" class="text-center">Всего</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($products as $product):?>
                                <?php if($product->getIsInStock() && $product->getIsActive()):?>
                                    <tr>
                                        <td style="width: 45%;" >
                                            <div class="checkout-table_product">
                                                <a href="/catalog/<?= $product->category->slug ?>/<?= $product->id ?>">
                                                    <span class="checkout-table_product-title"><?= Html::encode($product->title) ?></span>
                                                </a>
                                                <span class="checkout-table_product-subtitle">Арт. <?= $product->article?></span>
                                            </div>
                                        </td>
                                        <td class="col-sm-2 cart-product_quantity -centercart-product_quantity" style="width: 35%;"><?= $quantity = $product->getQuantity()?></td>
                                        <td style="width: 20%;" class="text-center">
                                            <span class="checkout-table_price"><?= $product->getCost() ?><span><i class="fa fa-ruble"></i></span>
                                        </td>
                                    </tr>
                                <?php endif;?>
                            <?php endforeach ?>
                            </tbody>
                        </table>
                        <div class="checkout-total clearfix">
                            <h5 class="checkout-total_title">ИТОГО:</h5>
                            <div class="checkout-total_price"><span><?= $total ?></span><i class="fa fa-ruble"></i></div>
                            <div class="checkout-clear"></div>
                            <h5 class="checkout-shipping_title">ДОСТАВКА:</h5>
                            <div class="checkout-shipping_text">Бесплатно</div>
                        </div>
                        <?= Html::submitButton('<span>Отправить заказ</span><i class="fa fa-long-arrow-right" aria-hidden="true"></i>', ['class' => 'btn btn-md btn-primary btn-ico btn-upper -mg_rt10']) ?>
                    </div>
                </div>
            <?php ActiveForm::end() ?>
        </div>
    </div>
</section>
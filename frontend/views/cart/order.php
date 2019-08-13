<?php
use \yii\helpers\Html;
use \yii\bootstrap\ActiveForm;

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
                                <div class="col-md-6">
                                    <?= $form->field($order, 'fio') ?>
                                </div>
                                <div class="col-md-6">
                                    <?= $form->field($order, 'email') ?>
                                </div>
                                <div class="col-md-6">
                                    <?= $form->field($order, 'phone') ?>
                                </div>
                                <div class="col-md-6">
                                    <?= $form->field($order, 'address') ?>
                                </div>
                            </div>
                            <h5 class="checkout-title">КОММЕНТАРИЙ</h5>
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
                                <tr>
                                    <td style="width: 45%;" >
                                        <div class="checkout-table_product">
                                            <span class="checkout-table_product-title"><?= Html::encode($product->title) ?></span>
                                            <span class="checkout-table_product-subtitle"><?= $product->category->title?></span>
                                        </div>
                                    </td>
                                    <td style="width: 35%;"><?= $quantity = $product->getQuantity()?></td>
                                    <td style="width: 20%;" class="text-center">
                                        <span class="checkout-table_price"><?= $product->getCost() ?><span><i class="fa fa-ruble"></i></span>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                            </tbody>
                        </table>
                        <div class="checkout-total clearfix">
                            <h5 class="checkout-total_title">ИТОГО:</h5>
                            <div class="checkout-total_price"><?= $total ?><i class="fa fa-ruble"></i></div>
                        </div>
                        <?= Html::submitButton('<span>Отправить заказ</span><i class="fa fa-long-arrow-right" aria-hidden="true"></i>', ['class' => 'btn btn-md btn-primary btn-ico btn-upper -mg_rt10']) ?>
                    </div>
                </div>
            <?php ActiveForm::end() ?>
        </div>
    </div>
</section>
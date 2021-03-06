<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \common\models\Order;

/* @var $this yii\web\View */
/* @var $model common\models\Order */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'status')->dropDownList(Order::getStatuses()) ?>

    <?= $form->field($model, 'fio')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'shipping_method')->dropDownList(Order::getShippingMethods()) ?>

    <div class="shipping_method_field method_rp" <?php if($model->shipping_method != 'rp'):?>style="display: none"<?php endif;?>">
        <?= $form->field($model, 'address')->textInput(['maxlength' => 255]) ?>
        <?= $form->field($model, 'zip')->textInput(['maxlength' => 6]) ?>
    </div>

    <?php /*$form->field($model, 'shipping_cost')->textInput(['maxlength' => 255])*/ 1?>

    <?= $form->field($model, 'payment_method')->dropDownList(Order::getPaymentMethods()) ?>

    <?php /*$form->field($model, 'payment')->dropDownList([1 => 'Есть', 0 => 'Нет'])*/ 1 ?>

    <?= $form->field($model, 'notes')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Редактировать', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

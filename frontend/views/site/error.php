<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

$this->title = $name;
?>

<div class="wrapper-content">
    <section class="section-welcome section -full-height -page_404" style="background-image: linear-gradient(to top , rgba(0,0,0, 0.5) 0%, rgba(0,0,0,0.5) 100%) , url(img/ico_coffe_beans.png) ,  url(img/bg-welcome.png); ">
        <div class="content">
            <div class="page_404-block">
                <div class="page_404-title"><?= Html::encode($this->title) ?></div>
                <p class="page_404-descr"><?= nl2br(Html::encode($message)) ?></p>
                <a href="/catalog/coffee" class="btn btn-primary btn-xl">Вернуться к покупкам</a>
            </div>
        </div>
    </section>
</div>
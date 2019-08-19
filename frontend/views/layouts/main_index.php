<?php
use yii\helpers\Html;
use frontend\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="apple-touch-icon" sizes="120x120" href="/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/img/favicons/favicon-16x16.png">
    <link rel="manifest" href="/img/favicons/manifest.json">
    <link rel="mask-icon" hasdref="img/favicons/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="theme-color" content="#ffffff">
    <meta name = "format-detection" content = "telephone=no">

    <meta charset="<?= Yii::$app->charset ?>"/>
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title . ' - ' . Yii::$app->name ) ?></title>
    <?php $this->head() ?>
</head>
<?php $this->beginBody() ?>
<body data-spy="scroll" data-target=".header"  data-offset="76" class="-loading video-landing standart-grid add-scroll">

<!-- PRELOADER -->
<div class="preloader -black">
    <div class="preloader_logo">
        <div class="sk-folding-cube selected">
            <div class="sk-cube1 sk-cube"></div>
            <div class="sk-cube2 sk-cube"></div>
            <div class="sk-cube4 sk-cube"></div>
            <div class="sk-cube3 sk-cube"></div>
        </div>
    </div>
</div>
<!-- PRELOADER END -->

<!-- TOP LINE -->
<header canvas class="header -scroll_white header--2-elements header-scrolling-menu">
    <nav class="navbar navbar-default">
        <div class="container-fluid">

            <div class="header-top-line-wrap">
                <?php $itemsInCart = Yii::$app->cart->getCount(); ?>
                <div class="right-side-top-line">
                    <a href="/cart" class="cart-price">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                        <span class="cart-products"><?= $itemsInCart ?></span>
                    </a>
                    <!-- mobile menu button -->
                    <div class="navbar-header navbar-header--on-white">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main_navbar" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <!-- mobile menu button END -->
                </div>

                <div class="collapse navbar-collapse" id="main_navbar">

                    <ul class="nav navbar-nav">
                        <li>
                            <a href="#section-home">
                                <svg version="1.1" class="ico-square" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                     viewBox="0 0 9.2 9.2" enable-background="new 0 0 9.2 9.2" xml:space="preserve">
									<path fill="#FFD03B" d="M5.8,8.7C5.5,9,5,9.2,4.6,9.2S3.7,9,3.4,8.7L0.5,5.8c-0.7-0.7-0.7-1.7,0-2.4l2.9-2.9c0.7-0.7,1.7-0.7,2.4,0
										l2.9,2.9c0.7,0.7,0.7,1.7,0,2.4L5.8,8.7z"/>
									</svg>
                                <span>Главная</span>
                                <svg version="1.1" class="ico-square" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                     viewBox="0 0 9.2 9.2" enable-background="new 0 0 9.2 9.2" xml:space="preserve">
									<path fill="#FFD03B" d="M5.8,8.7C5.5,9,5,9.2,4.6,9.2S3.7,9,3.4,8.7L0.5,5.8c-0.7-0.7-0.7-1.7,0-2.4l2.9-2.9c0.7-0.7,1.7-0.7,2.4,0
										l2.9,2.9c0.7,0.7,0.7,1.7,0,2.4L5.8,8.7z"/>
									</svg>
                            </a>
                        </li>
                        <li>
                            <a href="#section-shop">
                                <svg version="1.1" class="ico-square" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                     viewBox="0 0 9.2 9.2" enable-background="new 0 0 9.2 9.2" xml:space="preserve">
									<path fill="#FFD03B" d="M5.8,8.7C5.5,9,5,9.2,4.6,9.2S3.7,9,3.4,8.7L0.5,5.8c-0.7-0.7-0.7-1.7,0-2.4l2.9-2.9c0.7-0.7,1.7-0.7,2.4,0
										l2.9,2.9c0.7,0.7,0.7,1.7,0,2.4L5.8,8.7z"/>
									</svg>
                                <span>Каталог</span>
                                <svg version="1.1" class="ico-square" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                     viewBox="0 0 9.2 9.2" enable-background="new 0 0 9.2 9.2" xml:space="preserve">
									<path fill="#FFD03B" d="M5.8,8.7C5.5,9,5,9.2,4.6,9.2S3.7,9,3.4,8.7L0.5,5.8c-0.7-0.7-0.7-1.7,0-2.4l2.9-2.9c0.7-0.7,1.7-0.7,2.4,0
										l2.9,2.9c0.7,0.7,0.7,1.7,0,2.4L5.8,8.7z"/>
									</svg>
                            </a>
                        </li>
                        <li>
                            <a href="#section-shipping">
                                <svg version="1.1" class="ico-square" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                     viewBox="0 0 9.2 9.2" enable-background="new 0 0 9.2 9.2" xml:space="preserve">
									<path fill="#FFD03B" d="M5.8,8.7C5.5,9,5,9.2,4.6,9.2S3.7,9,3.4,8.7L0.5,5.8c-0.7-0.7-0.7-1.7,0-2.4l2.9-2.9c0.7-0.7,1.7-0.7,2.4,0
										l2.9,2.9c0.7,0.7,0.7,1.7,0,2.4L5.8,8.7z"/>
									</svg>
                                <span>Доставка</span>
                                <svg version="1.1" class="ico-square" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                     viewBox="0 0 9.2 9.2" enable-background="new 0 0 9.2 9.2" xml:space="preserve">
									<path fill="#FFD03B" d="M5.8,8.7C5.5,9,5,9.2,4.6,9.2S3.7,9,3.4,8.7L0.5,5.8c-0.7-0.7-0.7-1.7,0-2.4l2.9-2.9c0.7-0.7,1.7-0.7,2.4,0
										l2.9,2.9c0.7,0.7,0.7,1.7,0,2.4L5.8,8.7z"/>
									</svg>
                            </a>
                        </li>

                        <li>
                            <a href="#section-payment">
                                <svg version="1.1" class="ico-square" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                     viewBox="0 0 9.2 9.2" enable-background="new 0 0 9.2 9.2" xml:space="preserve">
									<path fill="#FFD03B" d="M5.8,8.7C5.5,9,5,9.2,4.6,9.2S3.7,9,3.4,8.7L0.5,5.8c-0.7-0.7-0.7-1.7,0-2.4l2.9-2.9c0.7-0.7,1.7-0.7,2.4,0
										l2.9,2.9c0.7,0.7,0.7,1.7,0,2.4L5.8,8.7z"/>
									</svg>
                                <span>Оплата</span>
                                <svg version="1.1" class="ico-square" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                     viewBox="0 0 9.2 9.2" enable-background="new 0 0 9.2 9.2" xml:space="preserve">
									<path fill="#FFD03B" d="M5.8,8.7C5.5,9,5,9.2,4.6,9.2S3.7,9,3.4,8.7L0.5,5.8c-0.7-0.7-0.7-1.7,0-2.4l2.9-2.9c0.7-0.7,1.7-0.7,2.4,0
										l2.9,2.9c0.7,0.7,0.7,1.7,0,2.4L5.8,8.7z"/>
									</svg>
                            </a>
                        </li>
                        <li>
                            <a href="#section-contacts">
                                <svg version="1.1" class="ico-square" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                     viewBox="0 0 9.2 9.2" enable-background="new 0 0 9.2 9.2" xml:space="preserve">
									<path fill="#FFD03B" d="M5.8,8.7C5.5,9,5,9.2,4.6,9.2S3.7,9,3.4,8.7L0.5,5.8c-0.7-0.7-0.7-1.7,0-2.4l2.9-2.9c0.7-0.7,1.7-0.7,2.4,0
										l2.9,2.9c0.7,0.7,0.7,1.7,0,2.4L5.8,8.7z"/>
									</svg>
                                <span>Контакты</span>
                                <svg version="1.1" class="ico-square" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                     viewBox="0 0 9.2 9.2" enable-background="new 0 0 9.2 9.2" xml:space="preserve">
									<path fill="#FFD03B" d="M5.8,8.7C5.5,9,5,9.2,4.6,9.2S3.7,9,3.4,8.7L0.5,5.8c-0.7-0.7-0.7-1.7,0-2.4l2.9-2.9c0.7-0.7,1.7-0.7,2.4,0
										l2.9,2.9c0.7,0.7,0.7,1.7,0,2.4L5.8,8.7z"/>
									</svg>
                            </a>
                        </li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div>
        </div><!-- /.container-fluid -->
    </nav>
</header>
<!-- TOP LINE END -->

<!-- BACKGROUND VIDEO -->
<div canvas class="fullscreen-bg">
    <video loop muted autoplay poster="/img/video_screenshot.jpg" class="fullscreen-bg__video">
        <source src="/videos/video_bg_720_compressed.mp4" type="video/mp4">
    </video>
    <div class="video_bg_overlay">
        <div class="container">
            <div class="row">
                <div class="col-xs-2 bg-border-col-item"></div>
                <div class="col-xs-2 bg-border-col-item"></div>
                <div class="col-xs-2 d-none bg-border-col-item"></div>
                <div class="col-xs-2 d-none bg-border-col-item"></div>
                <div class="col-xs-2 d-none bg-border-col-item"></div>
                <div class="col-xs-2 bg-border-col-item"></div>
            </div>
        </div>
    </div>
</div>
<!-- BACKGROUND VIDEO END -->

<!-- TOP BUTTON -->
<div canvas class="scroll_top">
    <i class="fa fa-chevron-up"></i>
</div>
<!-- TOP BUTTON END -->
<?= $content ?>
<!-- FOOTER -->
<footer class="footer footer--small">
    <div class="container">
        <p>Copyright &copy; <?= date('Y') ?> <?= Yii::$app->params['domain'] ?></p>
        <p>Developed with <i class="fa fa-heart-o"></i> by <a href="<?= Yii::$app->params['developerSite'] ?>" rel="external"><?= Yii::$app->params['developer'] ?></a></p>
    </div>
</footer>
<!-- FOOTER END -->
<?= $this->render('_metrika'); ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

<?php
use yii\helpers\Html;
use frontend\assets\AppAsset;
use yii\widgets\Breadcrumbs;
use common\models\Category;
use frontend\widgets\Alert;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="apple-touch-icon" sizes="120x120" href="/img/apple-touch-icon.png?1">
    <link rel="icon" type="image/png" sizes="32x32" href="/img/favicon-32x32.png?1">
    <link rel="icon" type="image/png" sizes="16x16" href="/img/favicon-16x16.png?1">
    <link rel="manifest" href="/manifest.json">
    <meta name="theme-color" content="#ffffff">
    <meta name = "format-detection" content = "telephone=no">

    <meta charset="<?= Yii::$app->charset ?>"/>
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title . ' - ' . Yii::$app->params['domain'] ) ?></title>
    <?php $this->head() ?>
</head>
    <?php $this->beginBody() ?>
    <header class="header -scroll_white">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main_navbar" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?= Yii::$app->homeUrl ?>">
                        <img src="/img/logo_white.png?2" alt="logo_white" class="logo_white">
                        <img src="/img/logo_black.png?2" alt="logo_black" class="logo_black">
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="main_navbar">
                    <?php $currentUrl = Yii::$app->request->url;?>
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="/">
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
                        <?php foreach (Category::find()->all() as $category):?>
                            <li <?php if(strripos($currentUrl, $category->slug) !== false): ?>class="active" <?php endif;?>>
                                <a href="/catalog/<?=$category->slug?>">
                                    <svg version="1.1" class="ico-square" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                         viewBox="0 0 9.2 9.2" enable-background="new 0 0 9.2 9.2" xml:space="preserve">
                                        <path fill="#FFD03B" d="M5.8,8.7C5.5,9,5,9.2,4.6,9.2S3.7,9,3.4,8.7L0.5,5.8c-0.7-0.7-0.7-1.7,0-2.4l2.9-2.9c0.7-0.7,1.7-0.7,2.4,0
                                        l2.9,2.9c0.7,0.7,0.7,1.7,0,2.4L5.8,8.7z"/>
                                    </svg>
                                    <span><?=$category->title?></span>
                                    <svg version="1.1" class="ico-square" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                         viewBox="0 0 9.2 9.2" enable-background="new 0 0 9.2 9.2" xml:space="preserve">
                                        <path fill="#FFD03B" d="M5.8,8.7C5.5,9,5,9.2,4.6,9.2S3.7,9,3.4,8.7L0.5,5.8c-0.7-0.7-0.7-1.7,0-2.4l2.9-2.9c0.7-0.7,1.7-0.7,2.4,0
                                        l2.9,2.9c0.7,0.7,0.7,1.7,0,2.4L5.8,8.7z"/>
                                    </svg>
                                </a>
                            </li>
                        <?php endforeach;?>
                        <li>
                            <?php $itemsInCart = Yii::$app->cart->getCount(); ?>
                            <a href="/cart">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                <span class="cart-products"><?= $itemsInCart ?></span>
                            </a>
                        </li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
    </header>

    <div class="wrapper-content -page_menu -min_height100">
        <section class="section section-title_top" style="background-image: linear-gradient(to top , rgba(0,0,0, 0.5) 0%, rgba(0,0,0,0.5) 100%) , url(/img/img-second_bg.jpg); ">
            <div class="container-fluid">
                <div class="menu-title_block">
                    <h2><?=$this->title?></h2>
                    <p>Лучший кофе со всего мира</p>
                </div>
            </div>
        </section>
        <div class="container">
            <?= Alert::widget() ?>
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <?= Breadcrumbs::widget([
                        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                    ]) ?>
                </div>
            </div>
            <?= $content ?>
        </div>

        <footer class="footer -sticky">
            <div class="footer-copyright text-center">
                <p>Copyright &copy; <?= date('Y') ?> <?= Yii::$app->params['domain'] ?></p>
                <p>Developed with <i class="fa fa-heart-o"></i> by <a href="<?= Yii::$app->params['developerSite'] ?>" rel="external"><?= Yii::$app->params['developer'] ?></a></p>
            </div>
        </footer>
    </div>

    <div class="scroll_top">
        <i class="fa fa-chevron-up"></i>
    </div>
    <?= $this->render('_metrika'); ?>
    <?php $this->endBody() ?>
</html>
<?php $this->endPage() ?>

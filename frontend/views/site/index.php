<?php
use common\models\Product;
use yii\helpers\Html;
use frontend\assets\IndexAsset;

IndexAsset::register($this);

$title = Yii::$app->name;
$this->title = Html::encode($title);
?>

<div class="main-wrap-content" canvas="container">
    <main class="main">
        <!-- WELCOME SECTION -->
        <section class="section-welcome section" id="section-home">
            <div class="container">
                <div class="content">
                    <div class="logo-center">
                        <img src="/img/logo_white_lg.png?1" alt="logo">
                    </div>

                </div>
            </div>

            <!-- ARROW-DOWN -->
            <a href="#section-shop" class="arrow-down-icon">
                <i class="fa fa-chevron-down" aria-hidden="true"></i>
            </a>
            <!-- ARROW-DOWN END -->

        </section>
        <!-- WELCOME SECTION END -->


        <!-- OUR SHOP SECTION -->
        <section class="our-shop-section section" id="section-shop">
            <div class="container">
                <h2 class="section-title -side-stick">Каталог</h2>
                <div class="title-description">
                    <p>Мы предлагаем лучшие сорта свежеобжаренного кофе и чая со всего мира</p>
                </div>
                <div class="row our-shop-items-wrap">
                    <?php foreach (Product::getNovelties(4) as $product):?>
                        <div class="col-xss-12 col-xs-6 col-sm-3">
                            <?php
                            $images = $product->images;
                            ?>
                            <div class="our-shop-card">
                                <a href="/catalog/<?= $product->category->slug?>/<?= $product->id?>" title="<?= $product->title?>" class="shop-img">
                                    <img src="<?=$images[0]->getUrl('medium')?>" alt="<?= $product->title?>">
                                </a>
                                <a href="/catalog/<?= $product->category->slug?>/<?= $product->id?>" class="tabMenu-content-title"><?= $product->title?></a>
                                <p><a href="/catalog/<?= $product->category->slug?>"><?= $product->category->title?></a></p>
                                <div class="our-shop-price-block">
                                    <p class="our-shop-price"><?= $product->price?><i class="fa fa-ruble"></i></p>
                                    <div class="cd-customization">
                                        <button data-id ="<?=$product->id?>" type="button" class="add-to-cart btn our-shop-buy-link">
                                            <em>В корзину <i class="fa fa-caret-right" aria-hidden="true"></i></em>
                                            <svg x="0px" y="0px" width="32px" height="32px" viewBox="0 0 32 32">
                                                <path stroke-dasharray="19.79 19.79" stroke-dashoffset="19.79" fill="none" stroke="#FFFFFF" stroke-width="2" stroke-linecap="square" stroke-miterlimit="10" d="M9,17l3.9,3.9c0.1,0.1,0.2,0.1,0.3,0L23,11"/>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach;?>
                </div>

                <div class="text-center btn-wrap">
                    <a href="/catalog/coffee" class="btn -transparent -small">В каталог</a>
                </div>
            </div>
        </section>
        <!-- OUR SHOP SECTION END -->

        <!-- OUR STORY SECTION -->
        <section class="our-story-section section" id="section-shipping">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 col-md-7">
                        <article class="article-block-text">
                            <h2 class="section-title -side-stick">Доставка</h2>
                            <h5>Забрать самостоятельно</h5>
                            <p>Самовывоз осуществляется по предварительной договоренности по адресу в г.Новосибирск.</p>
                            <h5>Доставка курьером</h5>
                            <p>Предварительно согласуем удобное время доставки.
                                Стоимость и сроки доставки курьером зависят от адреса доставки и рассчитываются при подтверждении заказа.
                                Бесплатная доставка по г.Новосибирску по субботам при заказе от 3000 рублей</p>
                            <h5>Доставка транспортными компаниями</h5>
                            <p>Доставка осуществляется ТК из г.Новосибирска.
                                Оплата за доставку до места назначения производит покупатель согласно тарифу ТК.</p>
                        </article>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <div class="img-similar-height">
                            <img src="img/our_story_img.jpg" alt="photo">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- OUR STORY SECTION END -->

        <!-- WHAT WE DO SECTION -->
        <section class="what-we-do-section section" id="section-payment">
            <div class="container">
                <div class="row what-we-do-columbs-wrap">
                    <div class="col-xs-12 col-sm-6 col-md-7 order-2">
                        <div class="row">
                            <div class="col-sm-12 col-md-5">
                                <div class="img-similar-height">
                                    <img src="img/what-we-do_img_1.jpg" alt="photo">
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-7">
                                <div class="img-similar-height">
                                    <img src="img/what-we-do_img_2.jpg" alt="photo">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6 col-md-5">
                        <article class="article-block-text">
                            <h2 class="section-title -side-stick">Оплата</h2>
                            <h5>Переводом на карту</h5>
                            <p>Отправка транспортными компаниями производится только после 100% оплаты.</p>
                            <p>Минимальная сумма заказа 500 рублей.</p>
                            <h5>Наличный расчёт</h5>
                            <p>При получении в пункте выдачи либо курьеру.</p>
                        </article>
                    </div>
                </div>
            </div>
        </section>
        <!-- WHAT WE DO SECTION END -->

        <!-- CONTACT US SECTION -->
        <section class="contact-us-section section" id="section-contacts">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-7">
                        <h2 class="section-title -side-stick">Контакты</h2>
                        <div class="row contact-us-content-wrap">
                            <div class="col-xss-12 col-xs-6 col-sm-12 col-md-7">
                                <div class="contact-us-left-side">
                                    <div class="contacts-item">
                                        <ul class="contacts-list contacts-list--address">
                                            <li>
                                                <a href="<?= Yii::$app->params['instagram'] ?>" target="_blank">
                                                    <i class="fa fa-instagram" aria-hidden="true"></i>
                                                    <span class="social-descr">Мы в Instagram</span>
                                                </a>
                                            </li>
                                        </ul>
                                        <h5 class="article-title">Адрес</h5>
                                        <ul class="contacts-list contacts-list--address">
                                            <li>
                                                <a href="tel:<?= Yii::$app->params['phone'] ?>">
                                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                                    <span class="social-descr"><?= Yii::$app->params['phone'] ?></span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="mailto:<?= Yii::$app->params['email'] ?>">
                                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                                    <span class="social-descr"><?= Yii::$app->params['email'] ?></span>
                                                </a>
                                            </li>
                                            <li>
                                                <i class="fa fa-home" aria-hidden="true"></i>
                                                <span class="social-descr"><?= Yii::$app->params['address'] ?></span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-5">
                        <div class="map-container">
                            <div class="map-wrap">
                                <div id="blackAndWhiteMap"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- CONTACT US SECTION END -->
    </main>

</div>
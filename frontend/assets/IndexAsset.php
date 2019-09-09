<?php
namespace frontend\assets;

use yii\web\AssetBundle;
use frontend\assets\AppAsset;

class IndexAsset extends AssetBundle
{
    public $jsOptions = [
        'position' => \yii\web\View::POS_END
    ];
    public $css = [
    ];
    public $js = [
        'js/masonry.pkgd.min.js',
        'js/rellax.min.js',
        'js/slick-lightbox.min.js',
        'js/slidebars.min.js',
        'http://maps.googleapis.com/maps/api/js?key=AIzaSyAEJgte17bKvMyyWXo1JcWbzsl9Qy-3-uo',

    ];
    public $depends = [
        'frontend\assets\AppAsset',
    ];
}
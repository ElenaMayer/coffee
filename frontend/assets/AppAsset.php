<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/all.css?38',
    ];
    public $js = [
        'js/jquery.min.js',
        'js/moment-with-locales.min.js',
        'js/bootstrap-select.min.js',
        'js/shuffle.min.js',
        'js/bootstrap.min.js',
        'js/bootstrap-datetimepicker.min.js',
        'js/slick.min.js',
        'js/jquery-ui.min.js',
        'js/all.js?10',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
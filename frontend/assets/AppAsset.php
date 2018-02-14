<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    //public $basePath = '@webroot';
    //public $baseUrl = '@web';
    public $sourcePath = '@bower/debut/';
    public $css = [
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css',
        'scss/main.css',
        'scss/skin.css',
    ];
    public $js = [
        'https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js',
        'http://netdna.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js',
        './script/index.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}

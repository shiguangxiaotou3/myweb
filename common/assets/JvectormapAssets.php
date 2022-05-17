<?php


namespace common\assets;


use yii\web\AssetBundle;

class JvectormapAssets extends AssetBundle
{
    public $sourcePath = '@vendor/almasaeed2010/adminlte/plugins/jvectormap';
    public $baseUrl = '@web';
    public $css = [];
    public $js = [
        //'jquery-jvectormap-cn_merc_en.js',
        //'jquery-jvectormap-1.2.2.min.js'
//        'jquery-jvectormap-world-mill-en.js',

    ];
    public $depends = ['common\assets\adminlte\components\JvectormapCss'];

}
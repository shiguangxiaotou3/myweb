<?php


namespace common\assets;


use yii\web\AssetBundle;

class Wysihtml5Assets extends AssetBundle
{
    //plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js
    public $sourcePath = '@vendor/almasaeed2010/adminlte/plugins/bootstrap-wysihtml5';
    public $baseUrl = '@web';
    public $css = [
        'bootstrap3-wysihtml5.css'
    ];
    public $js = [
        'bootstrap3-wysihtml5.all.js'
    ];
    public $depends = [
        'common\assets\jquery\JqueryAssets',
    ];
}
<?php


namespace common\assets;


use yii\web\AssetBundle;

class ICheckAssets extends AssetBundle
{
    //plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js
    public $sourcePath = '@vendor/almasaeed2010/adminlte/plugins/iCheck';
    public $baseUrl = '@web';
    public $css = [
        'flat/blue.css'
    ];
    public $js = [
        'icheck.js'
    ];
    public $depends = [
        'common\assets\AdminAssets',
    ];
}
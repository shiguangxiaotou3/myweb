<?php
namespace common\assets;


use yii\web\AssetBundle;

class AdminAssets extends AssetBundle
{
    public $sourcePath = '@vendor/almasaeed2010/adminlte/dist';
    public $css = [
        //bootstrap.min.css'
        'css/bootstrap.min.css',
        //主题
        'css/AdminLTE.min.css',
        //背景颜色
        'css/skins/_all-skins.min.css'
    ];
    public $js = [
    ];
    public $depends = [

    ];
}
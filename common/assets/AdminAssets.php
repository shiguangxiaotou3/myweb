<?php
namespace common\assets;


use yii\web\AssetBundle;

class AdminAssets extends AssetBundle
{
    public $sourcePath = '@vendor/almasaeed2010/adminlte/dist';
    public $css = [
        'css/bootstrap.min.css',
        'css/AdminLTE.min.css',
        'css/skins/_all-skins.min.css'
    ];
    public $js = [
    ];
    public $depends = [

    ];
}
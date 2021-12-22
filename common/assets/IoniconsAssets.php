<?php


namespace common\assets;


use yii\web\AssetBundle;

class IoniconsAssets extends AssetBundle
{
    public $sourcePath = '@vendor/almasaeed2010/adminlte/bower_components/Ionicons';
    public $baseUrl = '@web';
    public $css = [
        'css/ionicons.min.css'
    ];
    public $js = [

    ];
    public $depends = [
       'dmstr\web\AdminLteAsset'
    ];
}

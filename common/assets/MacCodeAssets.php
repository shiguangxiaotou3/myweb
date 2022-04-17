<?php


namespace common\assets;


use yii\web\AssetBundle;

class MacCodeAssets extends AssetBundle
{
    public $sourcePath = '@common/assets/MacCode';
    public $baseUrl = '@web';
    public $css = [
        'css/code.css'
    ];
    public $js = [
        'js/code.js'
    ];
    public $depends = ['yii\web\JqueryAsset'];
}

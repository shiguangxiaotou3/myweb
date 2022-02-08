<?php
namespace common\assets\adminlte\components;

use yii\web\AssetBundle;
use yii;
class Select2Assets extends AssetBundle
{
    public $sourcePath = '@vendor/almasaeed2010/adminlte/bower_components/select2';
    public $css = [
        'dist/css/select2.min.css'
    ];
    public $js = [
        'dist/js/select2.full.min.js'
    ];
    public $depends = [
        'dmstr\web\AdminLteAsset'
    ];


}
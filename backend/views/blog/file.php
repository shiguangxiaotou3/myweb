<?php
use yii\web\View;
use yii\helpers\Html;
use mihaildev\elfinder\InputFile;
use mihaildev\elfinder\ElFinder;
use yii\web\JsExpression;



echo ElFinder::widget([
    'language'         => 'zh_CN',
    'controller'       => 'elfinder', // 插入控制器的名称，默认为elfinder
    'path' => 'image', // 将打开一个文件夹从控制器设置添加皮肤科
    'filter'           => 'image',    //文件筛选器，可以指定筛选器数组 https://github.com/Studio-42/elFinder/wiki/Client-configuration-options#wiki-onlyMimes
    'callbackFunction' => new JsExpression('function(file, id){}') // ID小部件
]);
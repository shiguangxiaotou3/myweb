<?php
use common\models\basic\Clear;
use common\widgets\charts\Charts;

/** @var $this yii\web\View */
/** @var $content string */


    $model = new Clear();
    $arr = $model->getSizeAll();
    $data = [
        'labels' => array_keys($arr['backend']),
        'datasets' => [
            ['label' => '后台', 'data' =>array_map(function($i){return round($i/1024/1024,2);}, array_values($arr['backend'])),],
            ['label' => '前台', 'data' =>array_map(function($i){return round($i/1024/1024,2);},array_values($arr['frontend'])),],
            ['label' => '控制台', 'data' =>array_map(function($i){return round($i/1024/1024,2);},array_values($arr['console'])),],
            ['label' => 'api', 'data' =>array_map(function($i){return round($i/1024/1024,2);},array_values($arr['api'])),],
            ['label' => 'vba', 'data' =>array_map(function($i){return round($i/1024/1024,2);},array_values($arr['vba'])),],
        ]
    ];
    echo Charts::widget(['type' => 'bar', 'data' => $data,]);

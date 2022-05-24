<?php
use  yii\grid\GridView;
use yii\helpers\Html;
/* @var $this yii\web\View */
?>

<div class="content-list-wrap bg-white" style="padding: 10px 15px">
        <div class="row">
            <?php
                  echo GridView::widget([
                     'options' => ['class'=>'col col-12'],
                     'dataProvider' => $dataProvider,
                     'columns'=>[
                         ['class'=>'yii\grid\SerialColumn'],
                         'id',
                         [
                             'attribute' => 'time',
                             'value' => function($model){
                                return date("Y-m-d h:i",$model->time);
                             }
                         ],
                        'titer',
                         [
                             'class'=>'yii\grid\ActionColumn',
                             "template" => "{download} {view}",
                             "header" => "操作",
                             "buttons" => [
                                "download"=>function($url,$model,$key){
                                    $str ="/excel/".$model->city."/".$model->type."/".$model->time.".xls";
                                    return HTML::a("下载",$str);
                                },
                                 "view"=>function($url,$model,$key){
                                     return HTML::a("查看",["/site/steel-view",
                                         'city'=>$model->city,
                                         'type'=>$model->type,
                                         'time'=>$model->time,
                                     ]);
                                 }
                             ],
                         ],
                     ],
                     "pager" => [
                         'linkOptions'=>['class'=>'page-link'],
                         'activePageCssClass'=>'page-item active',
                     ],
                 ]);
            ?>

        </div>
</div>
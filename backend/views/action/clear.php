<?php

use yii\helpers\Html;
use common\widgets\charts\Charts;

/** @var $this yii\web\View */
/** @var $content string */

?>
    <div class="box box-primary ">
        <div class="box-header with-border ">
            <i class="fa fa-folder-o"></i><h3 class="box-title">临时文件</h3>
            <div class="box-tools">
                <?=Html::a("清空", ['/action/clear'], ['class' => 'btn',
                   // 'onclick'=>"$.pjax({url: '/action/clear', container: '#assets'});"
                ]);?>
                <button type="button" class="btn btn-box-tool" data-widget="collapse" ><i class="fa fa-minus"></i></button>
            </div>
        </div>
        <div class="box-body">
            <div class="chart">
                <?php
                    $component =Yii::$app->file;
                    $data = ['labels' => $component->tmpLabels, 'datasets' => $component->tmpSize,];
                    echo Charts::widget(['type' => 'bar', 'data' => $data,]);
                ?>
            </div>
        </div>
    </div>

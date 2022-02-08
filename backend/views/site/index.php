<?php

/* @var $this \yii\web\View */

use common\widgets\Card;
use common\widgets\charts\MapWidget;

$this->title =Yii::t('app', '家');
?>
<!-- 第一行 -->
<div class="row">
    <?php
        echo Card::widget(
            [
                'bg' => 'bg-aqua',
                'titer' => '<h3>asd</h3>',
                'lable' => '<p>订单</p>',
                'icon' => 'ion-bag',
                'url' => ['/user-config/index'],
            ]
        );

        //销售金额
        echo Card::widget(
            [
                'bg' => 'bg-green',
                'titer' => '<h3>'.Yii::$app->user->getId().'<sup style="font-size: 20px">元</sup></h3>',
                'lable' => '<p>销售金额</p>',
                'icon' => 'ion-stats-bars',
                'url' => ['#'],
            ]
        );

        //用户
        echo Card::widget(
            [
                'bg' => 'bg-yellow',
                'titer' => '<h3>0<sup style="font-size: 20px"></sup></h3>',
                'lable' => '<p>用户</p>',
                'icon' => 'ion-person-add',
                'url' => ['#'],
            ]
        );

        //其他
        echo Card::widget(
            [
                'bg' => 'bg-red',
                'titer' => '<h3>65</h3>',
                'lable' => '<p>未定义</p>',
                'icon' => 'ion-pie-graph',
                'url' => ['#'],
            ]
        );
    ?>
</div>
<!-- 第二行 -->
<div class="row">
    <!-- 城市定位图 -->
    <section class="col-lg-7 ">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">地图</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
                <div class="pad">
                    <!-- Map will be created here -->
                    <?= MapWidget::widget(Yii::$app->ip->visitsDataByCity()); ?>
                </div>
            </div>
        </div>
    </section>
    <!-- 热力图 -->
    <section class="col-lg-5 connectedSortable">
        <div class="box box-solid bg-light-blue-gradient">
            <div class="box-header">
                <div class="pull-right box-tools">
                    <!-- 日期范围-->
                    <!--
                    <button type="button" class="btn btn-primary btn-sm daterange pull-right" data-toggle="tooltip" title="日期范围">
                        <i class="fa fa-calendar"></i>
                    </button>
                    -->
                    <!-- 折叠按钮-->
                    <button type="button" class="btn btn-primary btn-sm pull-right" data-widget="collapse" data-toggle="tooltip" title="Collapse" style="margin-right: 5px;">
                        <i class="fa fa-minus"></i>
                    </button>
                </div>
                <i class="fa fa-map-marker"></i>
                <h3 class="box-title">
                    访问记录
                </h3>
            </div>
            <div class="box-body">
               <?=  Mapwidget::widget(Yii::$app->ip->visitsDataByCountry()); ?>
            </div>
        </div>
    </section>
</div>
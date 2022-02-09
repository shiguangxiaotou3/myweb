<?php

/* @var $this \yii\web\View */

use common\widgets\Card;
use common\widgets\charts\MapWidget;
use yii\helpers\Html;
use \yii\widgets\Pjax;
use common\widgets\charts\Charts;
use common\models\basic\Clear;

$this->title ='控制台';
$server = Yii::$app->server->config();
$apache = Yii::$app->server->Apache2();
$php = Yii::$app->server->php();
$mysql = Yii::$app->server->mysql();
$composer = Yii::$app->server->composer();
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
<div class="row" >
    <!-- 缓存面板 -->
    <div class="col-md-6">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">临时文件</h3>
                <div class="box-tools">
                    <?=Html::a("清空", '', ['class' => 'btn',
                        'onclick'=>"$.pjax({url: '/action/clear', container: '#assets'});"
                    ]);?>
                </div>
            </div>
            <div class="box-body">
                <div class="chart">
                    <?php
                    Pjax::begin(['id' => 'assets']);
                    $size = new Clear();
                    $arr = $size->getSizeAll();
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
                    Pjax::end();
                    ?>
                </div>
            </div>
        </div>
    </div>
    <!-- 配置面板 -->
    <div class="col-md-6">
        <div class="nav-tabs-custom">
            <!-- 面板分页 -->
            <ul class="nav nav-tabs">
                <li class="active"><a href="#server" data-toggle="tab" aria-expanded="true">Server</a></li>
                <li><a href="#apache2" data-toggle="tab" aria-expanded="false">Apache</a></li>
                <li><a href="#php" data-toggle="tab" aria-expanded="false">Php</a></li>
                <li><a href="#mysql" data-toggle="tab" aria-expanded="false">Mysql</a></li>
                <li><a href="#composer" data-toggle="tab" aria-expanded="false">Composer</a></li>
            </ul>
            <div class="tab-content">
                <!-- 服务器配置 -->
                <div class="tab-pane active" id="server">
                    <dl class="dl-horizontal">
                        <dt>主机名称</dt><dd><?= $server['HostName'] ?></dd>
                        <dt>操作系统</dt><dd><?= $server['Ox'] ?></dd>
                        <dt>版本</dt><dd><?= $server['VersionInformation'] ?></dd>
                        <dt>CPU</dt><dd><?= $server['MachineType'] ?></dd>
                    </dl>
                </div>
                <!-- apache配置 -->
                <div class="tab-pane" id="apache2">
                    <dl class="dl-horizontal">
                        <dt>版 本</dt><dd><?= $apache['Version'] ?></dd>
                        <dt>拓 展</dt><dd><?= implode(' ',$apache['Modules']) ?></dd>
                    </dl>
                </div>
                <!-- php配置 -->
                <div class="tab-pane" id="php">
                    <dl class="dl-horizontal">
                        <?php
                        $extensions=  get_loaded_extensions();
                        ?>
                        <dt>版 本</dt><dd><?= PHP_VERSION?></dd>
                        <dt>拓 展</dt><dd><?= implode(' ',$extensions) ?></dd>

                    </dl>
                </div>
                <!-- mysql配置 -->
                <div class="tab-pane" id="mysql">
                    <dl class="dl-horizontal">
                        <?php if($mysql){ ?>
                            <dt>类 型</dt><dd><?= $mysql['Type']?></dd>
                            <dt>版 本</dt><dd><?= $mysql['Version']?></dd>
                            <dt>主 机</dt><dd><?= $mysql['Host']?></dd>
                            <dt>数据库</dt><dd><?= $mysql['Dbname']?></dd>
                            <dt>表</dt><dd><?= implode(' ',$mysql['Tables'])?></dd>
                        <?php } ?>
                    </dl>
                </div>
                <!-- composer配置 -->
                <div class="tab-pane" id="composer">
                    <dl class="dl-horizontal">
                        <?php
                        $str ='';
                        foreach ($composer['require'] as $key =>$value){
                            $str .=Html::encode($key).' : '.Html::encode($value)."<br>";
                        }

                        ?>
                        <dt>名 称</dt><dd><?= $composer['name'] ?></dd>
                        <dt>描 述</dt><dd><?= $composer['description'] ?></dd>
                        <dt>主 页</dt><dd><?= $composer['homepage'] ?></dd>
                        <dt>依 赖</dt><dd><?= $str  ?></dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
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


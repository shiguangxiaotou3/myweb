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
    $host = explode(".",Yii::$app->request->hostInfo);
    $domain = $host[1].".".$host[2];
    echo Card::widget(
        [
            'bg' => 'bg-aqua',
            'titer' => '<h3>Frontend</h3>',
            'lable' => '<p>前台</p>',
            'icon' => 'ion-stats-bars',
            'url' => "http://frontend.".$domain,
        ]
    );

    //销售金额
    echo Card::widget(
        [
            'bg' => 'bg-green',
            'titer' => '<h3>Vba</h3>',
            'lable' => '<p>前台</p>',
            'icon' => 'ion-stats-bars',
            'url' => "http://vba.".$domain,
        ]
    );

    //用户
    echo Card::widget(
        [
            'bg' => 'bg-yellow',
            'titer' => '<h3>Api</h3>',
            'lable' => '<p>api</p>',
            'icon' => 'ion-stats-bars',
            'url' => "http://api.".$domain,
        ]
    );

    //其他
    echo Card::widget(
        [
            'bg' => 'bg-red',
            'titer' => '<h3>Backend</h3>',
            'lable' => '<p>后台</p>',
            'icon' => 'ion-pie-graph',
            'url' => "http://backend.".$domain,
        ]
    );
    ?>
</div>
<!-- 第二行 -->
<div class="row" >
    <!-- 缓存面板 -->
    <div class="col-md-6">
        <!-- 配置面板 -->
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
                        <dt>拓 展</dt><dd><?= substr(implode(' ',$apache['Modules']),1,255) ?></dd>
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
        <!-- 地图Country -->
        <div class="box box-solid bg-light-blue-gradient ">
            <div class="box-header">
                <div class="pull-right box-tools">
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
                <?php echo Mapwidget::widget(Yii::$app->ip->visitsDataByCountry()); ?>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <!-- 地图city -->
        <div class="box box-info ">
            <div class="box-header with-border">
                <i class="fa  fa-globe"></i><h3 class="box-title">地图</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
                <div class="pad">
                    <!-- Map will be created here -->
                    <?php echo MapWidget::widget(Yii::$app->ip->visitsDataByCity()); ?>
                </div>
            </div>
        </div>
        <!-- 文件 -->
        <?php Pjax::begin(['id' => 'assets','enablePushState'=>false]); ?>
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
        <?php   Pjax::end();?>
    </div>
</div>


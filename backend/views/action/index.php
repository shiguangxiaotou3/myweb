<?php

/** @var $this yii\web\View */
/** @var $content string */

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
?>

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

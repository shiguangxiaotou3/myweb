<?php

use yii\widgets\Pjax;
use  \yii\helpers\Html;

/** @var $this yii\web\View */
/** @var $content string */
$this->title ='收件箱';

/** @var $dns  common\components\Dns */
/** @var $pages  yii\data\Pagination */
$dns =Yii::$app->dns;
?>

<div class="row">
    <div class="col-md-3">
        <a href="" class="btn btn-primary btn-block margin-bottom">Dns</a>
        <div class="box box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">outlook</h3>
                <div class="box-tools">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse">
                        <i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="box-body no-padding">
                <ul class="nav nav-pills nav-stacked">
                <?php
                    $domains =[
                        'timethief.cn',
                        'shiguangxiaotou.cn',
                        'hbjsinf0.com',
                        '7574home.com',
                        'shiguangxiaotou.com'
                    ];
                    foreach ($domains as $domain){
                        $url =Yii::$app->urlManager->createUrl(['/dns/index/index','domain'=>$domain]);
                        echo "<li>".
                                Html::a('<i class="fa fa-inbox"></i>'. $domain,false,
                                    ['onclick'=>"$.pjax({url: '". $url."', container: '#dns'});"])
                            ."</li>";
                    }
                ?>
                </ul>
            </div>
        </div>
    </div>

    <div class="col-md-9">
        <?php Pjax::begin(['id' => 'dns','enablePushState'=>false]); ?>
        <?php if(isset($domainName)){ ?>
        <div class="box box-primary">
            <!--头部 -->
            <div class="box-header with-border">
                <h3 class="box-title"><?php echo  $domainName; ?></h3>
                <div class="box-tools pull-right">
                    <!-- 搜索框-->
                    <div class="has-feedback">
                        <input type="text" class="form-control input-sm" placeholder="Search Mail">
                        <span class="glyphicon glyphicon-search form-control-feedback"></span>
                    </div>
                </div>
            </div>
            <!-- 类容-->
            <div class="box-body no-padding">
                <!-- 操作按钮-->
                <div class="mailbox-controls">
                    <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i>
                    </button>
                    <div class="btn-group">
                        <button type="button" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                        <button type="button" class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
                        <button type="button" class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>
                    </div>
                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
                    <div class="pull-right">
                    </div>
                </div>
                <div class="table-responsive mailbox-messages">
                    <trbody>
                    </trbody>
                    <!-- 表格数据 -->
                    <table class="table table-hover table-striped">

                        <thead>
                            <tr>
                                <td >Id</td>
                                <td>rr</td>
                                <td >type</td>
                                <td>value</td>
                                <td >status</td>
                                <td>ttl</td>
                                <td>weight</td>
                                <td>remark</td>
                            </tr>
                        </thead>
                        <!--
                        <td><input type="checkbox"></td>
                    <td class="mailbox-star"><a href="#"><i class="fa fa-star-o text-yellow"></i></a></td>
                    <td class="mailbox-name"><a href="read-mail.html">Alexander Pierce</a></td>
                    <td class="mailbox-subject"><b>AdminLTE 2.0 Issue</b> - Trying to find a solution to this problem...
                    </td>
                    <td class="mailbox-attachment"><i class="fa fa-paperclip"></i></td>
                    <td class="mailbox-date">28 mins ago</td>
                        -->
                        <trbody>
                            <?php

                                $data = $dns->domainRecords($domainName);
                               if(!empty($data) && is_array($data) ){
                                   foreach ($data as $datum){?>
                            <tr>
                                <td><input type="checkbox" name="" value="<?=$datum['recordId'] ?>"></td>
                                <td><?= $datum['rr'] ?></td>
                                <td><?= $datum['type'] ?></td>
                                <td><?= $datum['value'] ?></td>
                                <td><?= $datum['status'] ?></td>
                                <td><?= $datum['ttl'] ?></td>

                                <td><?= $datum['weight'] ?></td>
                                <td><?= $datum['remark'] ?></td>
                            </tr>

                           <?php        }
                               }

                            ?>
                        </trbody>
                    </table>

                </div>
            </div>
            <!-- 页脚 -->
            <div class="box-footer no-padding">
            </div>
        </div>
        <?php } ?>
        <?php Pjax::end() ?>
    </div>
</div>

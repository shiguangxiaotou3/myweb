<?php
use yii\widgets\LinkPager;
use \yii\helpers\Html;
/** @var $this yii\web\View */
/** @var $server string */
/** @var $mailbox string */
/** @var $content string */
/** @var  $data  array */
/** @var  $pages array */
?>

    <div class="box box-primary">
        <!--头部 -->
        <div class="box-header with-border">
            <h3 class="box-title"><?php echo  $mailbox; ?></h3>
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
                    <?php
                    //总记录数
                    $count =$pages->totalCount;
                    $start = $pages->page *$pages->pageSize +1;
                    $end = $pages->page *$pages->pageSize +$pages->pageSize;
                    if($end >= $count){
                        $end = $count;
                    }

                    echo $start ."-".$end ."/".$pages->totalCount;
                    echo LinkPager::widget([
                        'options'=>['class'=> 'btn-group','tag'=>'div'],
                        'linkContainerOptions'=>['tag'=>'button','class'=>'btn btn-default btn-sm'],
                        'linkOptions'=>['data-pjax'=>'/email/inbox/messages'],
                        'maxButtonCount'=>0,
                        'pagination' => $pages,
                        'nextPageLabel' => "<i class='fa fa-chevron-right'></i>",
                        'prevPageLabel' => "<i class='fa fa-chevron-left'></i>",
                    ]);
                    ?>
                </div>
            </div>
            <div class="table-responsive mailbox-messages">
                <!-- 表格数据 -->
                <table class="table table-hover table-striped">
                    <trbody>
                    <?php foreach ($data as $row){ ?>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td class="mailbox-star"><a><i class="fa fa-star text-yellow"></i></a></td>
                            <td class="mailbox-name">
                                <?php
                                    echo Html::a(
                                        substr($row['from'],0,40),
                                        ['/email/inbox/view','server'=>$server,'mailbox'=>$mailbox,'number'=>$row['number']],
                                        ['data-pjax'=>'#messages']
                                    );
                                ?>
                            </td>
                            <td class="mailbox-subject"><b><?=substr($row['subject'] ,0,100)?></b></td>
                            <td class="mailbox-attachment">
                                <?php if($row['isAttachment']){ ?>
                                    <i class="fa fa-paperclip"></i>
                                <?php } ?>
                            </td>
                            <td class="mailbox-date"><?= date('Y-m-d', $row['date']) ?></td>
                        </tr>
                    <?php  } ?>
                    </trbody>
                </table>

            </div>
        </div>
        <!-- 页脚 -->
        <div class="box-footer no-padding">
            <!-- 操作按钮-->
            <!--
            <div class="mailbox-controls">
                <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i>
                </button>

                <div class="btn-group">
                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>
                </div>

                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>

            </div>
            -->
        </div>
    </div>


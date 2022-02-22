<?php
use yii\helpers\Html;
use yii\widgets\Pjax;
use \yii\widgets\LinkPager;
use \common\modules\email\widgets\MailboxListWidget;
/** @var $this yii\web\View */
/** @var $content string */
$this->title ='收件箱';

/** @var $imap  common\modules\email\components\Imap*/
/** @var $pages  yii\data\Pagination */



?>

<div class="row">
    <div class="col-md-3">
        <a href="compose.html" class="btn btn-primary btn-block margin-bottom">Compose</a>
        <?php

            $imap->open('qqMailer');
          dump( $imap->saveServer());
            // $imap->mailbox=/*'Drafts';// */'Sent Messages';
           // $imap->saveMailbox();
//        dump($imap->getViewMailboxList('outlook'));
//            echo MailboxListWidget::widget([
//                'label'=>'outlook',
//                'action' =>'/email/inbox/messages',
//                'data' => $imap->getViewMailboxList('outlook'),
//            ]) ;
//            echo MailboxListWidget::widget([
//                'label'=>'qqMailer',
//                'data' => $imap->getViewMailboxList('qqMailer'),
//            ]) ;
        ?>
    </div>

    <div class="col-md-9">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"><?php // Yii::t('app',$imap->name) ?></h3>
                <div class="box-tools pull-right">
                    <!-- 搜索框-->
                    <div class="has-feedback">
                        <input type="text" class="form-control input-sm" placeholder="Search Mail">
                        <span class="glyphicon glyphicon-search form-control-feedback"></span>
                    </div>
                </div>
            </div>
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
                        1-50/200
                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                            <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                        </div>
                    </div>
                </div>
                <div class="table-responsive mailbox-messages">
                    <!-- 表格数据 -->
                    <?php  Pjax::begin(['id' => 'messages','enablePushState'=>false]) ?>
                    <table class="table table-hover table-striped">
                        <trbody>

                        </trbody>
                    </table>
                    <?php Pjax::end() ?>


                </div>
            </div>

            <div class="box-footer no-padding">
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
//                        $index = $pages->page +1;
//                        echo $index."-".$index*$pages->pageSize."/".$pages->totalCount;
//                        echo LinkPager::widget([
//                            'options'=>['class'=> 'btn-group','tag'=>'div'],
//                            'linkContainerOptions'=>['tag'=>'button','class'=>'btn btn-default btn-sm'],
//                            'linkOptions'=>['data-pjax'=>'/email/inbox/index'],
//                            'maxButtonCount'=>0,
//                            'pagination' => $pages,
//                            'nextPageLabel' => "<i class='fa fa-chevron-right'></i>",
//                            'prevPageLabel' => "<i class='fa fa-chevron-left'></i>",
//                        ]);
                    ?>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

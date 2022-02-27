<?php
/** @var $this yii\web\View */
/** @var array $data */
/** @var string $server */
/** @var string $mailbox */
/** @var integer $number */
?>


    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">阅读邮件</h3>
            <div class="box-tools pull-right">
                <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="Previous"><i class="fa fa-chevron-left"></i></a>
                <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="Next"><i class="fa fa-chevron-right"></i></a>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body no-padding">
            <div class="mailbox-read-info">
                <h3 class="text-success">
                    <?php  echo isset($data['subject']) ?  $data['subject'] :"";  ?>
                </h3>
                <h5 class="text-muted">
                    <?php  echo isset($data['from'])  ?  '发件人: '.substr( $data['from'],0,50):""; ?>

                </h5>
                <h5 class="text-muted">
                    <?php  echo isset($data['to'])  ?  '收件人: '.substr($data['to'],0,50):""; ?>
                    <span class="mailbox-read-time pull-right">
                        <?php echo isset($data['date']) ?  date('Y-m-d',$data['date']): ''; ?>
                    </span>
                </h5>
            </div>
            <!-- /.mailbox-read-info -->
            <div class="mailbox-controls with-border text-center">
                <div class="btn-group">
                    <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Delete">
                        <i class="fa fa-trash-o"></i></button>
                    <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Reply">
                        <i class="fa fa-reply"></i></button>
                    <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Forward">
                        <i class="fa fa-share"></i></button>
                </div>
                <!-- /.btn-group -->
                <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" title="Print">
                    <i class="fa fa-print"></i></button>
            </div>
            <!-- /.mailbox-controls  mailbox-read-message-->
            <div class="mailbox-read-message">
                <?php $src = "/email/inbox/html?server=".$server."&mailbox=".$mailbox."&number=".$number ?>
                <iframe src="<?= $src ?>" frameborder="0" width="100%" height="100%"
                        onload="this.height=this.contentWindow.document.body.scrollHeight"scrolling="no"></iframe>
            </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <!--
            <ul class="mailbox-attachments clearfix">
                <li>
                    <span class="mailbox-attachment-icon"><i class="fa fa-file-pdf-o"></i></span>

                    <div class="mailbox-attachment-info">
                        <a href="#" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i> Sep2014-report.pdf</a>
                        <span class="mailbox-attachment-size">
                          1,245 KB
                          <a href="#" class="btn btn-default btn-xs pull-right"><i class="fa fa-cloud-download"></i></a>
                        </span>
                    </div>
                </li>
                <li>
                    <span class="mailbox-attachment-icon"><i class="fa fa-file-word-o"></i></span>

                    <div class="mailbox-attachment-info">
                        <a href="#" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i> App Description.docx</a>
                        <span class="mailbox-attachment-size">
                          1,245 KB
                          <a href="#" class="btn btn-default btn-xs pull-right"><i class="fa fa-cloud-download"></i></a>
                        </span>
                    </div>
                </li>
                <li>
                    <span class="mailbox-attachment-icon has-img"><img src="../../dist/img/photo1.png" alt="Attachment"></span>

                    <div class="mailbox-attachment-info">
                        <a href="#" class="mailbox-attachment-name"><i class="fa fa-camera"></i> photo1.png</a>
                        <span class="mailbox-attachment-size">
                          2.67 MB
                          <a href="#" class="btn btn-default btn-xs pull-right"><i class="fa fa-cloud-download"></i></a>
                        </span>
                    </div>
                </li>
                <li>
                    <span class="mailbox-attachment-icon has-img"><img src="../../dist/img/photo2.png" alt="Attachment"></span>

                    <div class="mailbox-attachment-info">
                        <a href="#" class="mailbox-attachment-name"><i class="fa fa-camera"></i> photo2.png</a>
                        <span class="mailbox-attachment-size">
                          1.9 MB
                          <a href="#" class="btn btn-default btn-xs pull-right"><i class="fa fa-cloud-download"></i></a>
                        </span>
                    </div>
                </li>
            </ul>
            -->
        </div>
        <!-- /.box-footer -->
        <div class="box-footer">
            <div class="pull-right">
                <button type="button" class="btn btn-default"><i class="fa fa-reply"></i> 回复</button>
                <button type="button" class="btn btn-default"><i class="fa fa-share"></i> Forward</button>
            </div>
            <button type="button" class="btn btn-default"><i class="fa fa-trash-o"></i> 删除</button>
            <button type="button" class="btn btn-default"><i class="fa fa-print"></i> 打印</button>
        </div>
        <!-- /.box-footer -->
    </div>






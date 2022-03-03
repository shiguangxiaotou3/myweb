<?php
use  \yii\helpers\Html;
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
                    <?php echo isset($data['date']) ?  date('Y-m-d H:m:s',$data['date']): ''; ?>
                </span>
            </h5>
        </div>
        <!-- /.mailbox-read-info -->
        <!-- /.mailbox-controls  mailbox-read-message-->
        <?php
            if(isset($data['text'])){
                echo '<div class=\'mailbox-read-message sort-highlight\' >';
                echo $data['text'];
                echo '</div>';
            }else{
                echo '<div class=\'mailbox-read-message no-padding mailbox-read-info\'>';
                echo Html::beginTag('iframe',[
                    'src'=>"/email/inbox/html?server=".$data['server']."&mailbox=".$data['mailbox']."&number=".$data['number'],
                    'width'=>"100%",
                    'height'=>"100%",
                    'style'=>['border'=>0,'mragin'=>'-10px'],
                    'onload'=>"
                        this.height= this.contentWindow.document.body.scrollHeight+20",
                    'scrolling'=>"no"
                ]);
                echo Html::endTag('iframe');
                echo '</div>';
            }
        ?>
    </div>
    <script>
        console.log();
    </script>
    <!-- /.box-body -->

    <!-- /.box-footer -->
    <div class="box-footer">
        <div class="pull-right">
            <?php
                echo Html::a('<i class=\'fa fa-reply\'></i> 回复',
                ['/email/inbox/reply' ,'to'=>$data['from']],
                ['type'=>'button','class'=>'btn btn-default','data-pjax'=>'#messages']);
            ?>
            <!--
            <button type="button" class="btn btn-default"><i class="fa fa-reply"></i> 回复</button>
            -->
        </div>
        <button type="button" class="btn btn-default"><i class="fa fa-trash-o"></i> 删除</button>
    </div>
    <!-- /.box-footer -->
</div>






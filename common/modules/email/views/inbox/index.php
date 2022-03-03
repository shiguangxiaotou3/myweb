<?php
use \yii\bootstrap\Modal;
use yii\widgets\Pjax;
use \common\modules\email\widgets\MailboxListWidget;
/** @var $this yii\web\View */
/** @var $content string */
$this->title ='收件箱';

/** @var $imap  common\components\imap\Imap*/
/** @var $pages  yii\data\Pagination */
?>
<div class="row">
    <div class="col-md-3">
        <a href="" class="btn btn-primary btn-block margin-bottom">Compose</a>
        <?php
            echo MailboxListWidget::widget([
                'server'=>'outlook',
                'action' =>'/email/inbox/messages',
                'data' => $imap->getViewMailboxList('outlook'),
            ]) ;
            echo MailboxListWidget::widget([
                'server'=>'qqMailer',
                'action' =>'/email/inbox/messages',
                'data' => $imap->getViewMailboxList('qqMailer'),
            ]) ;
        ?>
    </div>
    <div class="col-md-9">
        <?php  Pjax::begin(['id' => 'messages','enablePushState'=>false]) ?>
        <?php Pjax::end() ?>
    </div>
</div>
<?php Modal::begin([
    "id"=>"message",
    "footer"=>"",// always need it for jquery plugin
]);
Modal::end();

?>
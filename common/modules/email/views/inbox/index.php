<?php

use yii\widgets\Pjax;
use \common\modules\email\widgets\MailboxListWidget;
use kartik\icons\FontAwesomeAsset;

/** @var $this yii\web\View */
/** @var $content string */

/** @var $imap  common\components\Imap*/
/** @var $pages  yii\data\Pagination */

?>

<!--
<p>这是四个用fa-spin类实现的旋转流畅的加载图标</p>
<i class="fa fa-spinner fa-spin"></i>
<hr>
<i class="fa fa-circle-o-notch fa-spin"></i>
<hr>
<i class="fa fa-refresh fa-spin"></i>
<hr>
<i class="fa fa-cog fa-spin"></i>
<p>这是四个用fa-pulse类实现的旋转不太流畅的加载图标</p>
<i class="fa fa-spinner fa-pulse"></i>
<hr>
<i class="fa fa-circle-o-notch fa-pulse"></i>
<hr>
<i class="fa fa-refresh fa-pulse"></i>
<hr>
<i class="fa fa-cog fa-pulse"></i>
<br>
<br>
-->
<div class="row">
    <div class="col-sm-4 col-md-3 col-lg-2 ">
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
    <div class="col-sm-8 col-md-9 col-lg-10">
        <?php  Pjax::begin([
            'id' => 'messages',
            'enablePushState'=>false,
            'enableReplaceState'=>true,
            'options' =>['pushRedirect'=>true] ]) ?>
        <?php Pjax::end() ?>
    </div>
</div>
<?php
$js =<<<JS


 //改变加载状态
    window.iconLoading=function iconLoading(dom){
        var icon = $("#"+dom).children('i');
        console.log(dom);
        icon.toggleClass("fa-pulse");
    }
    //更新imap数据
    window.imapUpData=function imapUpData(dom,url,server){
        $.ajax({
            type:'POST',
            beforeSend: iconLoading(dom),
            data:{server:server},
            url:url,
            success:function(result){
                iconLoading(dom);
                location.reload(true);
                console.log(result);
            }
        })
    }

    //清空缓存
    window.imapClear =function imapClear(dom ,url,server){
        $.ajax({
            type:'POST',
            beforeSend: iconLoading(dom),
            data:{server:server},
            url:url,
            success:function(result){
                iconLoading(dom);
                location.reload(true);
                console.log(result);
            }
        })
    }

JS;
$this->registerJs($js);
?>
<script>

</script>

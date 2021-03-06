<?php

use yii\bootstrap\ActiveForm;
//use common\assets\adminlte\components\Select2Assets;
use common\assets\adminlte\components\CKeditorAssets;
//use common\assets\adminlte\plugins\BootstrapWysihtml5Assets;

/** @var $this yii\web\View */
/** @var $content string */
/** @var common\modules\email\models\EmailSendForm $model string */

$this->title ='写邮件';
CKeditorAssets::register($this);
//BootstrapWysihtml5Assets::register($this);
//Select2Assets::register($this);
?>
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">写邮件</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
        <?php
            $from = ActiveForm::begin([
                'id' =>'reply' ,
                'action' => ['/email/inbox/reply'],
                'method' => 'post',
//                'options' => ['data-pjax'=>'123'],
            ]);

            //收件人
            echo $from->field($model, 'to', ['options' => ['class' => 'form-group',],])
                ->textInput(['placeholder' => '收件人:'])
                ->label(false)
                ->hint(false)
                ->error(false);

            //主题
            echo $from->field($model, 'subject')
                ->textInput(['placeholder' => '主题:', 'class' => 'form-control'])
                ->label(false)
                ->hint(false)
                ->error(false);

            //内容
            echo $from->field($model, 'content', [
                'options' => [
                    'class' => 'form-group'],])
                ->textarea(['placeholder' => '邮件内容:', 'class' => 'form-control', 'row' => 100])
                ->label(false)
                ->hint(false)
                ->error(false);
        ?>
        </div>
        <div class="box-footer">
            <div class="pull-right">
                <button type="button" class="btn btn-default"><i class="fa fa-pencil"></i> 草稿</button>
                <button type="submit" class="btn btn-primary" data-pjax="#messages">
                    <i class="fa fa-envelope-o"></i> 发送
                </button>
            </div>
            <button type="reset" class="btn btn-default"><i class="fa fa-times"></i> 删除</button>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
<?php

$js =<<<JS
        CKEDITOR.replace('emailsendform-content',{'extraPlugins' : "codesnippet",'height':'600px'});
        //内联编辑
       // CKEDITOR.disableAutoInline = true;
        //CKEDITOR.inline( 'emailsendform-content',{'extraPlugins' : "codesnippet"} );
        // $("#emailsendform-content").wysihtml5();
        // $('.select2').select2();
         $(document).on('submit', 'from[data-pjax]', function(event) {
             $.pjax.submit(event, '#messages')
         })
      
JS;
$this->registerJs($js);

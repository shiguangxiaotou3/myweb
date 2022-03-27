<?php

use yii\bootstrap\ActiveForm;
use common\assets\adminlte\plugins\BootstrapWysihtml5Assets;
use common\assets\adminlte\components\Select2Assets;
/** @var $this yii\web\View */
/** @var $content string */
/** @var  $model frontend\models\Article*/

$this->title ='博客';
BootstrapWysihtml5Assets::register($this);
Select2Assets::register($this);
$this->blocks['content-header'] ='Blog';
$this->title ='写文字';
?>
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">写文章</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <?php
            $from = ActiveForm::begin(['method' => '/email/inbox/reply']);
            //$model->content
            //主题
            echo $from->field($model, 'title')
                ->textInput(['placeholder' => '标题', 'class' => 'form-control'])
                ->label(false);

            //内容
            echo $from->field($model, 'content', [
                'options' => [
                    'class' => 'form-group'],])
                ->textarea(['placeholder' => '邮件内容:', 'class' => 'form-control', 'row' => 100])
                ->label(false);

            ?>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <div class="pull-right">
                <button type="button" class="btn btn-default"><i class="fa fa-pencil"></i> 草稿</button>
                <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> 发送</button>
            </div>
            <button type="reset" class="btn btn-default"><i class="fa fa-times"></i> 删除</button>
        </div>
        <?php ActiveForm::end(); ?>

    </div>
<?php

$js =<<<JS
        $("#article-content").wysihtml5();
      // $('.select2').select2();
JS;
$this->registerJs($js);

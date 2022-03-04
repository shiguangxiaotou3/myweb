<?php

use yii\bootstrap\ActiveForm;
use common\assets\adminlte\plugins\BootstrapWysihtml5Assets;
use common\assets\adminlte\components\Select2Assets;
/** @var $this yii\web\View */
/** @var $content string */
/** @var common\modules\email\models\EmailSendForm $model */

$this->title ='写邮件';
BootstrapWysihtml5Assets::register($this);
Select2Assets::register($this);
?>
    <style>
        select {
            -webkit-appearance: none;
            border-radius: 0;
        }
    </style>

<div class="row">
    <?php // $this->render('../layouts/left.php') ?>
    <!-- /.col -->
    <div class="col-md-9">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">写邮件</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <?php
                $arr=array(
                        '757402123@qq.com'=>'时光小偷',
                        '757402124@qq.com'=>'时光小偷2',
                        'wanlong757402@outlook.com'=>'时光小偷',
                    );
                    $from =  ActiveForm::begin();

//                        echo "<!-- 收件人-->";
//                        //收件人
//                        echo $from->field($model,'to',[
//                                'options'=>[
//                                    'class'=>'form-group',
//                                    ],
//                        ])->textInput(['placeholder'=>'收件人:'])
//                            ->label(false)
//                            ->hint(false)
//                            ->error(false);


                        echo "<!-- 收件人2-->";
                        echo $from->field($model,'to',[
                            'options'=>['class'=>'form-group'],
                            'labelOptions'=>['class'=>''],])
                            ->dropDownList($arr,[
                                'class'=>'form-control select2',
                                'multiple'=>"multiple",
                                'style'=>"width: 100%;",
                                'data-placeholder'=>"收件人"])
                            ->label(false)
                            ->hint(false)
                            ->error(false);


                            echo "<!-- 主题-->";
                        //主题
                        echo $from->field($model,'subject',[
                                'options'=>[
                                    'class'=>'form-group',
                                    'inputOptions'=>'form-control'],])
                            ->textInput(['placeholder'=>'主题:','class'=>'form-control'])
                            ->label(false)
                            ->hint(false)
                            ->error(false);
                            echo "<!-- 内容-->";
                        //内容
                        echo $from->field($model,'content',[
                            'options'=>[
                                'class'=>'form-group'],])
                            ->textarea(['placeholder'=>'邮件内容:','class'=>'form-control','row'=>100])
                            ->label(false)
                            ->hint(false)
                            ->error(false);
                        //附件
                        echo $from->field($model,'file',[
                                'options'=>['class'=>'form-group'],
                                'template' =>"<div class='btn btn-default btn-file'>
                                <i class='fa fa-paperclip'></i> 附件\n{input}\n</div> <p class='help-block'>Max. 32MB</p>"])
                            ->fileInput()
                            ->label(false)
                            ->hint(false)
                            ->error(false);

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
            <?php  ActiveForm::end();  ?>
            <!-- /.box-footer -->
        </div>
        <!-- /. box -->
    </div>
    <!-- /.col -->
</div>

<?php

$js =<<<JS
     $("#emailsendform-content").wysihtml5();
        $('.select2').select2();
JS;
$this->registerJs($js);
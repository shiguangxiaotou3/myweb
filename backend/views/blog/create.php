<?php
use \yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use mludvik\tagsinput\TagsInputWidget;
use common\assets\adminlte\plugins\BootstrapWysihtml5Assets;

/** @var $this yii\web\View */
/** @var $content string */
/** @var  $model frontend\models\Article*/

$this->title ='博客';
BootstrapWysihtml5Assets::register($this);

$this->blocks['content-header'] ='Blog';
$this->title ='写文字';
$session =Yii::$app->session;
?>
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">写文章</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <?php

            $from = ActiveForm::begin(['id'=>'Article']);
            if(isset($model->id)){
                echo $from->field($model,'id')->hiddenInput()->label(false);
            }
            echo $from->field($model, 'title')
                ->textInput(['placeholder' => '标题' ,'class' => 'form-control'])->label(false);


            echo  $from->field($model, 'label')
                ->widget(TagsInputWidget::className(),['options' => ['class'=>'form-control']]);

            //内容
            echo $from->field($model, 'content', [
                'options' => [
                    'class' => 'form-group'],])
                ->textarea(['placeholder' => '请输入。。。。', 'class' => 'form-control','style'=>'height: 300px' ])
                ->label(false);
            ?>
        </div>
        <div class="box-footer">
            <div class="pull-right">
                <?php
                  echo  Html::a('<i class="fa fa-pencil"></i> 发布',
                        ['blog/create'],[
                            'data'=>[
                                'method' => 'post',
                                'params' => [
                                    'action' => 'save',
                                ],
                            ],
                            'class'=>'btn btn-default'
                        ]);
                ?>
                <button type="submit" class="btn btn-primary" ><i class="fa fa-envelope-o"></i> 保存</button>
            </div>
            <button type="reset" class="btn btn-default"><i class="fa fa-times"></i> 删除</button>
        </div>
        <?php ActiveForm::end(); ?>
    </div>

<?php
$js =<<<JS
    $("#article-content").wysihtml5();
JS;
$this->registerJs($js);

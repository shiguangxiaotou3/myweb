<?php

use yii\web\View;
use yii\helpers\Html;
use frontend\models\Tag;
use yii\bootstrap\ActiveForm;
use common\assets\HighlightAssets;
use mludvik\tagsinput\TagsInputWidget;
use common\assets\adminlte\components\CKeditorAssets;

/** @var $this yii\web\View */
/** @var $content string */
/** @var  $model frontend\models\Article*/

CKeditorAssets::register($this);
HighlightAssets::register($this,View::POS_HEAD);

$this->registerJs('hljs.initHighlightingOnLoad();',View::POS_HEAD);
$this->blocks['content-header'] ='Blog';
$this->title ='写文字';
$this->title ='博客';
$session =Yii::$app->session;
?>
<div class="box box-primary">
    <!--BOX 头部 -->
    <div class="box-header with-border">
        <h3 class="box-title">写文章</h3>
    </div>
    <!--BOX 中部 -->
    <div class="box-body">
        <?php
        $from = ActiveForm::begin(['id'=>'Article']);
        //文章id
        if(isset($model->id)){
            echo $from->field($model,'id')->hiddenInput()->label(false);
        }

        //标题
        echo $from->field($model, 'title')
            ->textInput(['placeholder' => '标题' ,'class' => 'form-control'])->label(false);

        //标签
        echo  $from->field($model, 'label')
            ->widget(TagsInputWidget::className(),['options' => ['class'=>'form-control']])->label(false);

        //标签快速按钮
       echo Html::tag('div',Tag::TagsWidget(),['class'=>'form-group']);

        //内容
        echo $from->field($model,'content')->textarea(['placeholder' => '标题','id'=>'editor1'])->label(false);

        ?>
    </div>
    <!--BOX 脚部 -->
    <div class="box-footer">
        <div class="pull-right">
            <!--发布 -->
            <?= Html::a('<i class="fa fa-pencil"></i> 发布',
                    ['blog/create'],[
                        'data'=>['method' => 'post', 'params' => ['action' => 'save',],],
                        'class'=>'btn btn-default'
                    ]); ?>
            <!--保存 -->
            <button type="submit" class="btn btn-primary" ><i class="fa fa-envelope-o"></i> 保存</button>
        </div>
        <!--删除 -->
        <button type="reset" class="btn btn-default"><i class="fa fa-times"></i> 删除</button>
    </div>
    <?php ActiveForm::end(); ?>
</div>
<?php
$js =<<<JS
    CKEDITOR.replace('editor1',{'extraPlugins' : "codesnippet"});
    window.addTag = function addTag(obj){
        var tag= $(obj);
        var input = $('.tags-input input');
        //设置值
        $(input).val(tag.text());
        //获得焦点
        $(input).focus();
        //失去焦点
        $(input).blur();
    }
JS;
$this->registerJs($js);

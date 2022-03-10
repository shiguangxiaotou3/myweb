<?php
use yii\bootstrap\ActiveForm;
use \eluhr\aceeditor\widgets\AceEditor;
/* @var $this yii\web\View */
/* @var $model common\modules\ace\models\Ace */

?>
<div class="row">
    <div class="col col-md-12 col-lg-12">
        <div class="box box-default color-palette-box">
            <?php $form = ActiveForm::begin(); ?>
            <div class="box-header with-border ">
                <!--左 -->
                <h4 class="box-title"><i class="fa fa-edit"></i> 编辑</h4>
                <!--中 -->
                <div class="box-title">
                    <small>
                        &nbsp;&nbsp;&nbsp;<?= $model->aliases ?>
                    </small>
                </div>
                <div class="box-title">
                    <small>
                        &nbsp;&nbsp;&nbsp;权限:<?= $model->permissionsStr." ". $model->permissions ?>
                    </small>
                </div>
                <!--右 -->
                <div class="box-tools pull-right">
                    <div class="btn-group no-padding no-margin">
                        <button type="button" class="btn btn-default btn-flat"><i class="fa fa-file-o"> 新建</i></button>
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                            语言
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <?php
                            foreach ($model->getModes() as $value){
                                echo "<li><a>$value </a></li>";
                            }
                            ?>
                        </ul>
                    </div>
                    <div class="btn-group no-padding no-margin">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                            主题
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <?php
                            foreach ($model->getThemes() as $value){
                                echo "<li><a>$value </a></li>";
                            }
                            ?>
                        </ul>
                        <button type="submit" class="btn btn-default btn-flat"><i class="fa fa-save"></i> 保存</button>
                    </div>
                </div>
            </div>
            <div class="box-body no-padding">
            <?php
                echo AceEditor::widget([
                    'attribute' => 'str',
                    'mode' => $model->mode,
                    'theme'=>$model->theme,
                    'model' => $model,
                    'container_options'=>['style'=>'width:100%; min-height: 550px',],
                    'plugin_options'=>[
                        'readOnly'=> false,
                        "autoScrollEditorIntoView"=> true,
                    ]
                ]);
            ?>
            </div>
            <?php   ActiveForm::end(); ?>
        </div>
    </div>
</div>

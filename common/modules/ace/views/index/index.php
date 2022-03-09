<?php
use yii\bootstrap\ActiveForm;
use \yii\helpers\Html;
use \eluhr\aceeditor\widgets\AceEditor;
use \common\components\File;
/* @var $this yii\web\View */
/* @var $model common\modules\ace\models\Ace */

$path =  Yii::getAlias(  '@vendor/bower-asset/ace-builds/src-noconflict');
$data = File::searchFile($path,['theme'=>'/theme-[\w]*.js/', 'mode'=>'/mode-[\w]*.js/',]);
$theme =$data['theme'];
$mode =$data['mode'];
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
                            foreach ($mode as $value){
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
                            foreach ($theme as $value){
                                echo "<li><a>$value </a></li>";
                            }
                            ?>
                        </ul>
                        <button type="submit" class="btn btn-default btn-flat"><i class="fa fa-save"></i> 保存</button>
                    </div>
                </div>
                <?php
                    //echo  Html::submitButton('提交',['class'=>'btn btn-default']);
                ?>
            </div>
            <div class="box-body no-padding">
            <?php

                $theme =$data['theme'];
                $mode =$data['mode'];
                $i = rand(0,count($theme)-1);
                $x = rand(0,count($mode)-1);

                $themeName = str_replace('theme-','',$theme[$i]);
                $themeName = str_replace('.js','',$themeName);

                $modeName = str_replace('mode-','',$mode[$x]);
                $modeName = str_replace('.js','',$modeName);
                echo AceEditor::widget([
                    'attribute' => 'str',
                    'theme'=>$themeName,//$themeName,//crimson_editor,
                    'mode' => $modeName,//$model->extensionName,
                    'model' => $model,
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

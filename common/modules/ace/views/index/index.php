<?php
use yii\bootstrap\ActiveForm;
use \yii\helpers\Html;
use \eluhr\aceeditor\widgets\AceEditor;
/* @var $this yii\web\View */
/* @var $model common\modules\ace\models\Ace */
?>

<div class="row">
    <?php $form = ActiveForm::begin(); ?>
    <!--
    <div class="col clo-md-4 col-lg-3">
       <?= $form->field($model,'aliases')->textInput()?>
    </div>
    -->
    <div class="col col-md-12 col-lg-12">
        <?php
        echo AceEditor::widget([
            'attribute' => 'str',
            'theme'=>$model::THEME_TOMORROW_NIGHT_EIGHTIES,
            'mode' => $model->extensionName,
            'model' => $model,
            'plugin_options'=>[
                'readOnly'=> true
            ]
        ]);
        echo  Html::submitButton('提交',['class'=>'btn ']);
        ?>
    </div>
    <?php   ActiveForm::end(); ?>
</div>
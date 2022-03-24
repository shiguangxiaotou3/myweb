<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
/* @var $this yii\web\View */
/* @var $model frontend\models\Article */
?>
<div class="Blog-index">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id') ?>
    <?= $form->field($model, 'label') ?>
    <?= $form->field($model, 'created_at') ?>
    <?= $form->field($model, 'updated_at') ?>
    <?= $form->field($model, 'status') ?>
    <?= $form->field($model, 'content') ?>
    <?= $form->field($model, 'title') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Submit'), ['class' => 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>
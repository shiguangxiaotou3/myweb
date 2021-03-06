<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model frontend\models\ContactForm */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;
use yii\captcha\Captcha;

$this->title = Yii::t('app','Contact');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-md-6 col-lg-8 offset-md-3 offset-lg-2">
        <h1><?= Html::encode($this->title) ?></h1>
        <p>
            <?= Yii::t('app', 'If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.') ?>
        </p>
        <div class="row">
            <div class="col bg bg-white">
                <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'subject') ?>

                <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

                <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                    'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                ]) ?>

                <div class="form-group">
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>

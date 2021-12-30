<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \frontend\models\PasswordResetRequestForm */

use \yii\helpers\Url;
use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;
$dir = Url::to('img/');
$this->title = Yii::t('app','Request password reset');
$this->params['breadcrumbs'][] = $this->title;
?>
<!--
<div class="site-request-password-reset">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out your email. A link to reset password will be sent there.</p>

    <div class="row">
        <div class="col-lg-5">
            <?php //$form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>

                <?php //$form->field($model, 'email')->textInput(['autofocus' => true]) ?>

                <div class="form-group">
                    <?php // Html::submitButton('Send', ['class' => 'btn btn-primary']) ?>
                </div>

            <?php //ActiveForm::end(); ?>
        </div>
    </div>
</div>
-->

<section class="bg-primary slide current">
    <span class="background dark" style="background-image:url('https://source.unsplash.com/RkBTPqPEGDo/')"></span>
    <!--.wrap = container (width: 90%) -->
    <div class="wrap size-30">
        <p><a href="#" title="微软"><img class="whitelogo aligncenter" src="<?= $dir.'author.jpg' ?>" alt="微软"></a></p>
        <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>
            <fieldset>
                <legend><?= Html::encode($this->title) ?></legend>
                <p><label>电子邮件</label>
                    <input type="text" tabindex="1" name="PasswordResetRequestForm[email]" placeholder="your@email.com" required="">
                </p>
                <p>
                    <button type="submit" tabindex="2" title="登录">登录 &gt;</button>
                </p>
            </fieldset>
        <?php ActiveForm::end(); ?>
    </div>
</section>
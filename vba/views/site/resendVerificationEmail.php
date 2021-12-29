<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \frontend\models\ResetPasswordForm */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'Resend verification email';
$this->params['breadcrumbs'][] = $this->title;
?>
<!--
<div class="site-resend-verification-email">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out your email. A verification email will be sent there.</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'resend-verification-email-form']); ?>

            <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>

            <div class="form-group">
                <?= Html::submitButton('Send', ['class' => 'btn btn-primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>-->
<section class="bg-green">
    <!--.wrap = container (width: 90%) -->
    <div class="wrap">
        <div class="grid vertical-align">
            <div class="column">
                <?php $form = ActiveForm::begin(['id' => 'resend-verification-email-form']); ?>
                <fieldset>
                    <legend>登 陆</legend>
                    <p><input type="text" tabindex="1" name="PasswordResetRequestForm[email]" placeholder="用户名" ></p>

                    <p><input type="password" tabindex="2" name="LoginForm[password]" placeholder="密码" required></p>
                    <p><?= Html::submitButton('登陆  &rsaquo;', ['title'=>"登陆"]) ?></p>
                </fieldset>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</section>
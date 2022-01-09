<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \common\models\LoginForm */


use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

$this->title =Yii::t('app', 'Login');
$this->params['breadcrumbs'][] = $this->title;
?>




<div class="login-box">
    <div class="login-logo">
        <a href="#"><b>时光小偷</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg"><?= Yii::t('app', 'Sign in to start your session') ?></p>

        <?php $form = ActiveForm::begin(['id' => 'login-form', 'enableClientValidation' => false]); ?>

        <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

        <?= $form->field($model, 'password')->passwordInput() ?>


        <div class="row">
            <div class="col-xs-8">
                <?= $form->field($model, 'rememberMe')->checkbox() ?>
            </div>
            <!-- /.col -->
            <div class="col-xs-4">
                <?php // Html::submitButton('Sign in', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button']) ?>
                <?= Html::submitButton(Yii::t('app','Login'), ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button']) ?>
            </div>
            <!-- /.col -->
        </div>
        <div style="color:#999;margin:1em 0">
            <?= Yii::t('app','If you forgot your password you can') ?> <?= Html::a(Yii::t('app','reset it'), ['site/request-password-reset']) ?>.
            <br>
            <?= Yii::t('app','Need new verification email?') ?> <?= Html::a(Yii::t('app','Resend'), ['site/resend-verification-email']) ?>
        </div>

        <div class="form-group">
            <?php // Html::submitButton(Yii::t('app','Login'), ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
        </div>

        <?php ActiveForm::end(); ?>


    </div>

</div>





























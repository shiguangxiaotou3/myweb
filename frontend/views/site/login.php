<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \common\models\LoginForm */

use \yii\helpers\Url;
use yii\bootstrap\Html;
use yii\bootstrap\ActiveForm;

$dir = Url::to('img/');
$this->title = '登陆';
$this->params['breadcrumbs'][] = $this->title;
?>

<!--
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to login:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php //$form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?php //$form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?php //$form->field($model, 'password')->passwordInput() ?>

                <?php // $form->field($model, 'rememberMe')->checkbox() ?>

                <div style="color:#999;margin:1em 0">
                    If you forgot your password you can <?= Html::a('reset it', ['site/request-password-reset']) ?>.
                    <br>
                    Need new verification email? <?= Html::a('Resend', ['site/resend-verification-email']) ?>
                </div>

                <div class="form-group">
                    <?php // Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
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
        <p><a href="#" title="vbacloud"><img class="whitelogo aligncenter" src="<?= './../img/logo.svg' ?>" alt="vbacloud"></a></p>
        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
            <fieldset>
                <legend>欢迎回来</legend>
                <p>
                <?php
                    echo $form->field($model, 'username')
                        ->textInput(['autofocus' => true])
                        ->hint(false)
                    ->label('用户名');
                ?>
                </p>
                <p>
                <?php
                    $lable ="密码<span class='alignright'>".
                        Html::a('忘记密码？', ['site/request-password-reset'],['tiele'=>'重置']).
                        "</span>";
                    echo $form->field($model, 'password')
                        ->passwordInput()
                        ->label($lable)
                ?>
                <?= $form->field($model, 'rememberMe')->checkbox() ?>
                </p>
                <p>
                    <button type="submit" tabindex="3" title="登录">登录 &gt;</button>
                </p>
            </fieldset>
        <?php ActiveForm::end(); ?>
        <p class="aligncenter">没有账户？<a href="<?= Url::to(['/site/signup']) ?>" title="登记">注册！</a></p>
    </div>
</section>
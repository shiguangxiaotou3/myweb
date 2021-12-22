<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

$this->title = '登陆';
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="bg-green">
    <!--.wrap = container (width: 90%) -->
    <div class="wrap">
        <div class="grid vertical-align">
            <div class="column">
                <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                    <fieldset>
                        <legend>登 陆</legend>
                        <p><input type="text" tabindex="1" name="LoginForm[username]" placeholder="用户名" ></p>

                        <p><input type="password" tabindex="2" name="LoginForm[password]" placeholder="密码" required></p>
                        <p><?= Html::submitButton('登陆  &rsaquo;', ['title'=>"登陆"]) ?></p>
                    </fieldset>
                <?php ActiveForm::end(); ?>
            </div>
            <!-- .end .column -->
            <div class="column">
                <ul class="flexblock specs">
                    <li>
                        <div>
                            <svg class="fa-heart-o">
                                <use xlink:href="#fa-heart-o"></use>
                            </svg>
                            <h2>Good karma </h2>
                            Just essential features.
                        </div>
                    </li>
                    <li>
                        <div>
                            <svg class="fa-bolt">
                                <use xlink:href="#fa-bolt"></use>
                            </svg>
                            <h2>Fast &amp; Versatile</h2>
                            No need to know code. 120+ slides.
                        </div>
                    </li>
                    <li>
                        <div>
                            <svg class="fa-lock">
                                <use xlink:href="#fa-lock"></use>
                            </svg>
                            <h2>Private Network</h2>
                            Simple and secure file sharing.
                        </div>
                    </li>
                </ul>
            </div>
            <!-- .end .column -->
        </div>
        <!-- .end .grid -->
    </div>
    <!-- .end .wrap -->
</section>
<!--

<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to login:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <?= $form->field($model, 'rememberMe')->checkbox() ?>

                <div style="color:#999;margin:1em 0">
                    If you forgot your password you can <?= Html::a('reset it', ['site/request-password-reset']) ?>.
                    <br>
                    Need new verification email? <?= Html::a('Resend', ['site/resend-verification-email']) ?>
                </div>

                <div class="form-group">
                    <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>

</div>
-->
<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

$this->title = '注册';
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="">
    <!--.wrap = container (width: 90%) -->
    <div class="wrap">
        <div class="grid vertical-align">
            <div class="column">
                <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                <fieldset>
                    <legend>创建一个免费账户</legend>
                    <!-- <p><input type="text" tabindex="1" name="SignupForm[username]" placeholder="用户名" required></p>-->
                    <p><?= $form->field($model, 'username')->textInput(['autofocus' => true])->label(false) ?></p>
                    <p><?= $form->field($model, 'email')->textInput(['placeholder'=>"邮箱"])->label(false) ?></p>
                    <p><input type="password" tabindex="2" name="SignupForm[password]" placeholder="密码" required></p>
                    <p><?= Html::submitButton('注册  &rsaquo;', ['title'=>"注册"]) ?></p>
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
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to signup:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
-->
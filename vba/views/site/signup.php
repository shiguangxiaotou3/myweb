<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

$this->title = '注册';
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="bg-primary slide current">
    <span class="background dark" style="background-image:url('https://source.unsplash.com/RkBTPqPEGDo/')"></span>
    <!--.wrap = container (width: 90%) -->
    <div class="wrap size-30">
        <p><a href="#" title="vbacloud"><img class="whitelogo aligncenter" src="<?= './../img/logo.svg' ?>" alt="vbacloud"></a></p>
        <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
        <fieldset>
            <legend>欢迎回来</legend>
            <p>
                <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label('用户名') ?>
            </p>
            <p>
                <?= $form->field($model, 'email')->label('邮箱') ?>
            </p>
            <p>
                <?= $form->field($model, 'password')->passwordInput()->label('密码') ?>
            </p>
            <p>
                <button type="submit" tabindex="3" title="注册">注册 &gt;</button>
            </p>
        </fieldset>
        <?php ActiveForm::end(); ?>
    </div>
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
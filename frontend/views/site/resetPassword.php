<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \frontend\models\ResetPasswordForm */

use \yii\helpers\Url;
use yii\bootstrap\Html;
use yii\bootstrap\ActiveForm;

$dir = Url::to('img/');
$this->title = Yii::t('app','Reset password');
$this->params['breadcrumbs'][] = $this->title;
?>
<!--
<div class="site-reset-password">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please choose your new password:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'reset-password-form']); ?>

                <?= $form->field($model, 'password')->passwordInput(['autofocus' => true]) ?>

                <div class="form-group">
                    <?= Html::submitButton('Save', ['class' => 'btn btn-primary']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
-->
<section class="bg-primary slide current">
    <span class="background dark" style="background-image:url('https://source.unsplash.com/RkBTPqPEGDo/')"></span>
    <!--.wrap = container (width: 90%) -->
    <div class="wrap size-30">
        <p><a href="#" title="vbacloud"><img class="whitelogo aligncenter" src="<?= $dir.'author.jpg' ?>" alt="微软"></a></p>
        <?php $form = ActiveForm::begin(['id' => 'reset-password-form']); ?>
        <fieldset>
            <legend><?= Yii::t('app','Please choose your new password:') ?></legend>
            <p><label>密码</label>
                <input type="password" tabindex="1" name="ResetPasswordForm[password]" placeholder="新密码" required="">
            </p>
            <p>
                <button type="submit" tabindex="2" title="保存">登录 &gt;</button>
            </p>
        </fieldset>
        <?php ActiveForm::end(); ?>
    </div>
</section>
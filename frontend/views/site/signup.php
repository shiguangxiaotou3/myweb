<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

$this->title = Yii::t('app','Signup');
$this->params['breadcrumbs'][] = Yii::t('app',$this->title);
?>
<div class="site-signup " >
    <h1><?= Html::encode($this->title) ?></h1>

    <p> <?= Yii::t('app', 'Please fill out the following fields to signup:')?></p>

    <div class="row">
        <div class="col col-sm-12  col-md-6 col-lg-4 bg bg-white">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <div class="form-group">
                    <?= Html::submitButton(Yii::t('app','Signup'), ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>

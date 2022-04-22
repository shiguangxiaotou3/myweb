<?php
use  \yii\widgets\ActiveForm;
/** @var frontend\models\Comment $model */
?>


        <?php
            $from = ActiveForm::begin([
                'action' => '/site/reply',
                'method' => 'post',
                'enableAjaxValidation' => true,
                //'validationUrl' => 'validate-reply',
            ]);
            echo $from->field($model,'message_id')->hiddenInput()->label(false);
            echo $from->field($model,'article_id')->hiddenInput()->label(false);
            echo $from->field($model,'message')->textarea(['placeholder' => '说点什么。。。'])->label(false);
            echo "<button type='submit' class='btn btn-primary' style='border-Radius:0' >回复</button>";
            ActiveForm::end();
        ?>

<?php

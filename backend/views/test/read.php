<?php
use yii\bootstrap\ActiveForm;
use \yii\helpers\Html;
use common\modules\ace\models\Ace;
use \eluhr\aceeditor\widgets\AceEditor;
/* @var $this yii\web\View */


    $model = new Ace();
    $model->aliases ='@basic/a.txt';
    $model->str = file_get_contents(Yii::getAlias($model->aliases));
?>
<div class="row">

    <div class="col col-md-12 col-lg-12">
        <?php
        echo AceEditor::widget([
            'attribute' => 'str',
            'theme'=>$model::THEME_TOMORROW_NIGHT_EIGHTIES,
            'mode' => $model->extensionName,
            'model' => $model,
            'plugin_options'=>[
                'readOnly'=> false,
            ]
        ]);
        ?>
    </div>
</div>
<?php
use \yii\helpers\Html;
/** @var $this yii\web\View */
/** @var $label string */
/** @var $data string */
/** @var $actionUpdate */
/** @var $actionClaer */

?>

<div class="box box-solid">
    <div class="box-header with-border">
        <h3 class="box-title"><?= Yii::t('app',$label) ?></h3>
        <div class="box-tools">
            <?php
               echo Html::button('<i class="fa fa-refresh"></i>',[
                   'class'=>'btn btn-box-tool',
                    'title'=>'更新',
                   'onclick'=>"$.ajax({url:'".$actionUpdate."?server=".$label."'})"
               ]);
            ?>
            <?php
            echo Html::button('<i class="fa fa-times"></i>',[
                'class'=>'btn btn-box-tool',
                'title'=>'清空',
                'onclick'=>"$.ajax({url:'".$actionClaer."?server=".$label."'})"
            ]);
            ?>
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
    <div class="box-body no-padding">
        <ul class="nav nav-pills nav-stacked">
            <?= $data ?>
        </ul>
    </div>
</div>
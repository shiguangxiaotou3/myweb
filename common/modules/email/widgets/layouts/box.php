<?php
use \yii\helpers\Html;
/** @var $this yii\web\View */
/** @var $server string */
/** @var $data string */
/** @var $actionUpdate */
/** @var $actionClear */

?>


<div class="box box-solid">
    <div class="box-header with-border">
        <h3 class="box-title"><?= Yii::t('app',$server) ?></h3>
        <div class="box-tools">
            <?php
                echo Html::button('<i class="fa fa-refresh"></i>',[
                    'class'=>'btn btn-box-tool',
                    'title'=>'更新',
                    'id'=>'update'.rand(1,100),
                    'onclick'=>"imapUpData(this.id,'{$actionUpdate}','{$server}')"
               ]);


                echo Html::button('<i class="fa fa-times"></i>',[
                    'class'=>'btn btn-box-tool',
                    'title'=>'清空',
                    'id'=>'clear'.rand(1,100),
                    'onclick'=>"imapUpData(this.id,'{$actionClear}','{$server}')"
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
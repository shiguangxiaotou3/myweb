<?php
/** @var $this yii\web\View */
/** @var $content string */
/** @var $label string */
/** @var $data string */

?>

<div class="box box-solid">
    <div class="box-header with-border">
        <h3 class="box-title"><?= Yii::t('app',$label) ?></h3>
        <div class="box-tools">
            <button type="button" class="btn btn-box-tool "><i class="fa fa-refresh"></i></button>

            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>

        </div>
    </div>
    <div class="box-body no-padding">
        <ul class="nav nav-pills nav-stacked">
            <?= $data ?>
        </ul>
    </div>
</div>
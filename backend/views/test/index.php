<?php
use himiklab\handsontable\HandsontableWidget;
/** @var $this yii\web\View */
/** @var $content string */
/** @var $data string|array|bool */



?>

<div class="row">
    <div class="col col-lg-12">
        <?php
            //显示excel数据
            echo HandsontableWidget::widget([
                'settings' => [
                    'licenseKey' => 'non-commercial-and-evaluation',
                    'data'=>[['asd','asda'],['asd','asdasd']],
                    'contextMenu'=> ['row_above', 'row_below', 'remove_row'],
                    'colHeaders' => true,
                    'rowHeaders' => true,
                ]
            ]);


        ?>
    </div>
    <div class="col col-lg-12"><? ?></div>
</div>


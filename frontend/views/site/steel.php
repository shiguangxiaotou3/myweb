<?php
use  \yii\grid\GridView;
/* @var $this yii\web\View */
?>

<div class="content-list-wrap bg-white" style="padding: 10px 15px">
        <div class="row">
            <?php
                 echo GridView::widget([
                     'dataProvider' => $dataProvider,
                    ]);
            ?>
        </div>
</div>
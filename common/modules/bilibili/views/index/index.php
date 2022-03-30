<?php

use common\modules\bilibili\models\Bilibili;
use  common\widgets\charts\Charts;
/* @var $this yii\web\View */
?>
<div class="row">
    <div class="col col-sm-12 col-md-6 col-lg-4">
        <div class="box box-primary ">
            <div class="box-header with-border ">
                <i class="fa fa-folder-o"></i><h3 class="box-title">临时文件</h3>

            </div>
            <div class="box-body">
                <div class="chart">
                    <?php
                    //labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                    $line =  Bilibili::bulletChatNumber(23439073);
                    $data=[];
                    foreach ($line as $key =>$value){
                        $data['labels'][] =date('d',$key)."日";
                        $data['datasets'][0]['data'][] =$value;
                    }
                    echo Charts::widget(['type' => 'line', 'data' => $data,]);

                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

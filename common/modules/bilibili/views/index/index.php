<?php

use common\modules\bilibili\models\Bilibili;
use  common\widgets\charts\Charts;
use \yii\helpers\Html;
/* @var $this yii\web\View */
/* @var $model Bilibili */
?>
<div class="row">
    <div class="col col-sm-9 col-md-8 col-lg-7">
        <div class="box box-primary ">
            <div class="box-header with-border ">
                <i class="fa fa-line-chart"></i><h3 class="box-title">近<?= $model->day ?>天统计</h3>
                <div class="box-tools">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="box-body">
                <div class="chart">
                    <?php
                    $line =  $model->bulletChatNumber();
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

    <div class="col col-sm-3 col-md-4 col-lg-5">
        <div class="box box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Top10</h3>

                <div class="box-tools">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="box-body no-padding">
                <ul class="nav nav-pills nav-stacked">
                    <?php
                        $data = $model->usernameTop10();

                        if(isset($model) && !empty($data)){
                            $i=1;
                            foreach ($data as $key=>$datum){
                                if($i<= 10){
                                    if($i ==1){
                                        $color = ' text-red';
                                    }elseif ($i ==2){
                                        $color = 'text-yellow';
                                    }elseif ($i ==3){
                                        $color = 'text-light-blue';
                                    }else{
                                        $color = '';
                                    }
                                    echo "<li>".
                                        Html::a('<i class="fa fa-circle-o '.$color.'"></i>'.$key.
                                            "<span class=\"label label-primary pull-right\">$datum</span>",['#'])
                                        ."</li>";
                                }else{
                                    break;
                                }
                                $i++;
                            }
                        }
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div>


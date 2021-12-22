<?php


namespace common\widgets;


use common\assets\IoniconsAssets;

use yii\helpers\Html;

/**
 * echo \common\widgets\Card::widget([
 *  'bg'=>'bg-aqua',
 *  'titer'=>'<h3>150</h3>',
 *  'lable'=>'<p>新订单</p>',
 *  'icon'=>'ion-bag',
 *  'url'=>['#'],
 * ]);
 *
 * echo \common\widgets\Card::widget([
 *  'bg'=>'bg-green',
 *  'titer'=>'<h3>53<sup style="font-size: 20px">%</sup></h3>',
 *  'lable'=>'<p>Bounce Rate</p>',
 *  'icon'=>'ion-stats-bars',
 *  'url'=>['#'],
 * ]);
 *
 * echo \common\widgets\Card::widget([
 *  'bg'=>'bg-yellow',
 *  'titer'=>'<h3>53<sup style="font-size: 20px">%</sup></h3>',
 *  'lable'=>'<p>Bounce Rate</p>',
 *  'icon'=>'ion-person-add',
 *  'url'=>['#'],
 * ]);
 *
 * echo \common\widgets\Card::widget([
 *  'bg'=>'bg-red',
 *  'titer'=>'<h3>65</h3>',
 *  'lable'=>'<p>Unique Visitors</p>',
 *  'icon'=>'ion-pie-graph',
 *  'url'=>['#'],
 * ]);
 *
 */

class Card  extends  \yii\bootstrap\Widget
{

    public $options=[];
    public $bg='bg-aqua';
    public $titer ='标题';
    public $lable ='100';
    public $icon=" ion-bag";
    public $url ='#';



    public function run()
    {

        $view = $this->getView();
        IoniconsAssets::register($view );
        $options= $this->options;
        $bg = $this->bg;
        $titer =$this->titer;
        $lable = $this->lable;
        $icon =$this->icon;
        $url =Html::a('更多信息 <i class="fa fa-arrow-circle-right"></i>',$this->url,['class'=>'small-box-footer']);

        return $this->CardOne($bg,$titer,$lable,$icon, $url);
    }


    /**
     * @param string $bg
     * @param string $titer
     * @param string $lable
     * @param string $icon
     * @param string $url
     * @return string
     */
    public function CardOne($bg,$titer,$lable,$icon, $url){

        return "<div class='col-lg-3 col-xs-6'>
                    <div class='small-box {$bg}'>
                    <div class='inner'>
                        <h3>$titer</h3>
                        <p>$lable</p>
                    </div>
                    <div class='icon'>
                        <i class='ion {$icon}'></i>
                    </div>
                    $url
                    </div>
            </div>";
    }
}

?>

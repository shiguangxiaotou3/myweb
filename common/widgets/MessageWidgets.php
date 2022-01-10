<?php
/**
 * @author wanlong757402@outlook.com
 * @version
 */

namespace common\widgets;

use \yii\bootstrap\Widget;
use yii\helpers\Html;

class MessageWidgets extends Widget{


    public $img;
    public $url;
    public $messages;
    public $directoryAsset;

    public function run(){
        $i=1;
        $data = $this->messages;
        $str = '';
        foreach ($data as $datum){
            if($i ==6){
                break;
            }
            $str .= Html::beginTag('li');
                $str .= Html::beginTag('a');
                    $str .= Html::beginTag('div',['class'=>"pull-left"]);
                        $str .= "<img src='".$this->directoryAsset/*$this->url.$datum['send_user_img']*/."/img/user2-160x160.jpg' class='img-circle' alt='头像' />";
                    $str .= Html::endTag('div');
                    $str .= Html::beginTag('h4');
                        $str.= $datum['send_user_name'];
                        $str .="<small><i class='fa fa-clock-o'></i>".
                            MaxDifferTime($datum['time'],time()).
                            "</small>";
                    $str .= Html::endTag('h4');
                    $str .="<p>".$datum['message']."</p>";
                $str .= Html::endTag('a');
            $str .= Html::endTag('li');
            $i++;
        }
        return $str;
    }
}


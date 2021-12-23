<?php


namespace common\widgets\webslides;


use yii\base\Widget;
use yii\helpers\Html;

class Steps extends Widget
{
    /** @var $Options array */
    public $titer="流程";
    public $data=[
        ['icon'=>'fa-cog','lable'=>"asd",'content'=>'When you\'re really passionate about your job, you can change the world.'],
        ['icon'=>'fa-balance-scale','lable'=>"asd",'content'=>'When you\'re really passionate about your job, you can change the world.'],
        ['icon'=>'fa-bar-chart','lable'=>"ad",'content'=>'When you\'re really passionate about your job, you can change the world.'],
        ['icon'=>'fa-users','lable'=>"ad",'content'=>'When you\'re really passionate about your job, you can change the world.'],
    ];
    public $Options=[
        'class'=>'wrap-80',
    ];
    public $stpes=[];
    public $_i =1;

    public $stepOptions=['class'=>'flexblock steps'];

    public function run()
    {
        return
            Html::beginTag('div',$this->Options).
                "<h3>".$this->titer."</h3>".

                    $this->addSteps().

            Html::endTag('div');
    }


    public function addSteps(){
        $data= $this->data;
        $res = '';
        if(is_array($data)){
            foreach ($data as $row){
                if($this->_i % 4 ==1){
                    $res .=Html::beginTag('ul',['class'=>$this->stepOptions]);
                }
                //<div class="process step-4"></div> 箭头
                $res .="<li><div class='process step-".$this->_i."'></div>";
                if(array_key_exists("icon",$row)){
                  $res .= Html::beginTag('span').addFa($row['icon']).Html::endTag('span');
                }
                $res .="<h2>".$this->_i.". ".$row['lable']." </h2>".$row['content'];
                $res .="</li>";
                if($this->_i % 4 == 0){
                    $res .= Html::endTag('ul');
                }
                    $this->_i ++;
            }
            return $res;
        }
    }
}
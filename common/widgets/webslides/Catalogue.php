<?php


namespace common\widgets\webslides;


use yii\base\Widget;
use yii\helpers\Html;

/**
 * 构造目录页面
 * @package common\widgets\webslides
 */
class Catalogue extends Widget
{

    /** @var $data array  */
    /** @var $Options array */

    public $data=[
        ['lable'=>'概论','number'=>"1",'url'=>'#slide=1','items'],
    ];
    public $titer="目录";
    public $Options=[
        'class'=>'wrap size-50',
    ];
    public $lableOptions=[];
    public $numberOptions =[];
    public $lableClass='chapter';
    public $numbarClass='toc-page';

    /**
     * 构造行
     * @param $row
     * @return string
     */
    public function addli($row){
        $lableOptions= $this->lableOptions;
        $numberOptions =$this->numberOptions;
        if(empty($this->numberOptions)){
            $numberOptions= ['class'=>$this->numbarClass];
        }
        if(empty($lableoptions)){
            $lableOptions = ['class'=>$this->lableClass];
        }
        if(empty( $row['url'])){
            //不存在链接
            return Html::beginTag('span',$lableOptions).$row['lable'].Html::endTag('span');
            Html::beginTag('span',$numberOptions).$row['number'].Html::endTag('span');
        }else{
            return Html::a(
                Html::beginTag('span',$lableOptions).$row['lable'].Html::endTag('span').
            Html::beginTag('span',$numberOptions).$row['number'].Html::endTag('span'),
            $row['url']
            );
        }

    }

    public function run(){
       return Html::beginTag('div',$this->Options).
           "<h3>".$this->titer."</h3>".
           "<hr>".
           Html::beginTag('div',['class'=>'toc']).
           "<ol>".$this->recursion($this->data)."</ol>".
           Html::endTag('div').
        Html::endTag('div');
    }

    public function recursion($data){
        $res ="";
        if(is_array($data)){
            foreach ($data as $row){
                if(array_key_exists('items', $row) && is_array($row['items'])){
                    $res .= "<li>".$this->addli($row)."<ol>".$this->recursion($row['items'])."</ol></li>";
                }else{
                    $res .= "<li>".$this->addli($row)."</li>";
                }
            }
        }
        return $res;
    }
}
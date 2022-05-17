<?php


namespace common\widgets\webslides;


use yii\base\Widget;
use yii\helpers\Html;

class FlexBlock extends Widget{

    //幻灯片css
    public $options = ['class'=>'bg-white'];
    //内容css
    public $contentOptions = ['class'=>'wrap slideInLeft'];
    //列表css
    public $itemsOptions = ['class'=>'flexblock gallery'];

    public $template ="";

    public $items =[];


    /**
     * @param $item
     * @return string
     */
    public function renderItem($item){
        return Html::a(
            Html::beginTag('figure').
                Html::img($item['img'],['alt'=>$item['title']]).
                Html::beginTag('figcaption').
                    Html::beginTag('h2').$item['title']. Html::endTag('h2').
                    Html::beginTag('time',['datetime'=>$item['time']]).$item['time']. Html::endTag('time').
                Html::endTag('figcaption').
            Html::endTag('figure'),
            $item['url'],[]);
    }

    /**
     * @return string|void
     */
    public function run(){
        $str ='';
        foreach ($this->items as $page){
            $str .= Html::beginTag('section',$this->options);
            $str .= Html::beginTag('div',$this->contentOptions);
            $str .= Html::beginTag('ul',$this->itemsOptions);
                foreach ($page as $item){
                    $str .="<li>".$this->renderItem( $item) ."</li>";
                }
            $str .= Html::endTag('ul');
            $str .= Html::endTag('div');
            $str .= Html::endTag('section');
        }
        return $str;
    }
}
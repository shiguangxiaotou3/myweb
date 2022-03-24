<?php
namespace common\widgets\tag;



use yii\bootstrap\Widget;

class TagWidget extends Widget
{

    public function run(){
        $model = TagFront::getLabel();
        return $this->render('index',['model'=>$model]);
    }
}
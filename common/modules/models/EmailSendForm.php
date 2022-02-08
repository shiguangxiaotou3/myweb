<?php


namespace common\modules\models;


use yii\base\Model;

class EmailSendForm extends  Model
{

    public $to;
    public $subject;
    public $content;
    public $file;

    public function rules(){
        return [
            [['to','subject','content'],'required'],
            ['to','email'],
            ['file','file','minFiles' => 'jpe,png,gif']
        ];
    }

}
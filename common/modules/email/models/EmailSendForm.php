<?php


namespace common\modules\email\models;

use Yii;
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
            //['file','file','minFiles' => 'jpe,png,gif']
        ];
    }


    public function sendEmail(){
        /** @var yii\swiftmailer\Mailer $mail */
        $mail = Yii::$app->mailer;
        $mail->htmlLayout ='layouts/main';
        $mail->compose(['html' => 'send'],['model'=>$this])
        ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'])
        ->setTo($this->to)
        ->setSubject($this->subject)
        ->send();

    }
}
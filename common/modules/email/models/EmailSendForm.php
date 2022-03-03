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

    /**
     * Sends confirmation email to user
     * @param User $user user model to with email should be send
     * @return bool whether the email was sent
     */
    public function sendEmail(){
        return Yii::$app->mailer
            ->compose(['html' => 'index'],['data'=>$this->content])
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'])
            ->setTo($this->to)
            ->setSubject($this->subject)
            ->send();

    }
}
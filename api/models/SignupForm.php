<?php

namespace api\models;

use Yii;
use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    private $_user;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required','message' => '用户命不能为空'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => '此用户名已被占用.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required','message' => '邮箱不能为空'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => '此电子邮件地址已被占用.'],

            ['password', 'required','message' => '密码不能为空'],
            ['password', 'string', 'min' => Yii::$app->params['user.passwordMinLength']],
        ];
    }

    /**
     * Signs user up.
     *
     * @return bool whether the creating new account was successful and email was sent
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->token =
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();
        if($user->save()){
            $this->_user =$user;
            if($this->sendEmail()){
                return true;
            }
        }
        return false;
    }

    /**
     * Sends confirmation email to user
     * @param \api\models\User $user user model to with email should be send
     * @return bool whether the email was sent
     */
    protected function sendEmail()
    {
        $user =$this->_user;
        return Yii::$app
            ->mailer
            ->compose(
                ['html' => 'emailVerify-html', 'text' => 'emailVerify-text'],
                ['user' => $user]
            )
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'])
            ->setTo($this->email)
            ->setSubject(Yii::t('app','Account registration at ') . Yii::$app->name)
            ->send();
    }

    public function verificationToken(){
        $verifyLink = Yii::$app->urlManager
            ->createAbsoluteUrl(['site/verify-email', 'token' => $this->_user->verification_token]);
        return $verifyLink;
    }
}

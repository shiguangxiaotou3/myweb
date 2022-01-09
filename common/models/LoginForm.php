<?php

namespace common\models;

use common\models\ar\Ip;
use common\models\ar\Login_record;
use Yii;
use yii\base\Model;

/**
 * Login form
 */
class LoginForm extends Model
{
    public $username;
    public $password;
    public $rememberMe;
    private $_user;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, Yii::t('app','Incorrect username or password.'));
            }
        }
    }

    /**
     * @return array
     */
    public function attributeLabels()
    {
        return [
            'rememberMe'=>Yii::t('app','rememberMe'),
            'username'=>Yii::t('app','username'),
            'password'=>Yii::t('app','password'),
        ];

    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return bool whether the user is logged in successfully
     */
    public function login(){
        if ($this->validate()) {
            $res = Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
            $this->addIp();
            return $res;
        }
        return false;
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    protected function getUser()
    {
        if ($this->_user === null) {
            $this->_user = User::findByUsername($this->username);
        }

        return $this->_user;
    }

    /**
     * 记录客户端ip,用来统计访问量
     */
    public function addIp(){
        $user_ip = Yii::$app->request->getUserIP();
        $molde = new Login_record();
        $molde->user_id = Yii::$app->user->getId();
        $molde->ip = $user_ip;
        if($molde->validate() && $molde->save()){
            //将ip添加到IP地址库中
            $count = Ip::find()
                ->where(['ip'=>$user_ip])->count();
            //如果ip库中不存在，则添加
            if($count == 0){
                $ip = new Ip();
                $ip->ip= $user_ip;
                $ip->visits =1;
                if($ip->validate() && $ip->save()){
                    //获取ip的地质信息

                }
            }else{
                //存在，则访问量加一
                $ip = Ip::find()->where(['ip'=>$user_ip])->one();
                $ip->visits =$ip->visits +1;
                $ip->save();
            }
        }
    }

}

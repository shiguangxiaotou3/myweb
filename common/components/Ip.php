<?php


namespace common\components;


use Yii;
use Exception;
use yii\base\Component;
use ipinfo\ipinfo\IPinfo;
use common\models\ar\Ip  as ipModel;
use yii\base\Event;


/**
 * Class Ip
 * @package common\components
 */
class Ip extends  Component{

    //const EVENT_BEFORE_LOGOUT = 'beforeLogout';

    public $token = "7265d1b29d49c2";
    public $allowedIPs = ['127.0.0.1', '::1'];
    public $ip ='';


    /**
     * 自动记录用户的登陆ip
     * @param  $event Event
     */
    public function autoAnalysis($event){
        $data = $event->data;
        $ip = $data['ip'];
        $path = Yii::getAlias('@basic/log.txt');
        $str = date("Y-m-d h:m:s",time())."    ";
        if(!in_array($ip,$this->allowedIPs)){
            //判断ip是否已经解析
            if(ipModel::is_empty($ip)){
                ipModel::sum_count($ip);
                file_put_contents($path,$str."ip:".$ip."访问量加1"."\r\n",FILE_APPEND);
            }else{
                $data = $this-> analysis($ip);
                $model = new ipModel();
                $model->attributes =$data;
                if($model->validate() && $model->save()){
                    file_put_contents($path,$str."ip:".$ip."解析成功"."\r\n",FILE_APPEND);
                }else{
                    file_put_contents($path,$str."ip:".$ip."解析失败"."\r\n",FILE_APPEND);
                }
            }

        }
    }

    /**
     * @param $ip
     * @return array|false
     */
    public function analysis($ip){
        $client = new IPinfo($this->token);
        try{
            return $client->getRequestDetails($ip);
        }catch (Exception $exception){
            return false;
        }
    }

    /**
     * 获取所有地区的访问量
     * @return array|false
     */
    public function visitsDataByCountry(){
       $model = new ipModel();
       return $model->visitsDataByCountry();
    }

    /**
     * 获取所有登陆的城市
     * @return array|false
     */
    public function visitsDataByCity(){
        $model = new ipModel();
        return $model->visitsDataByCity();
    }

    public function test(){
        logObject('登陆成功');
    }
}
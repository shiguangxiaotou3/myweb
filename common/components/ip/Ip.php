<?php


namespace common\components\ip;



use Exception;
use yii\base\Component;

use ipinfo\ipinfo\IPinfo as http;
use common\models\ar\Ip  as ipModel;


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
     * @param IpEvent $event
     */
    public function autoAnalysis($event){
        $ip = $event->ip;
        if(!in_array($ip,$this->allowedIPs)){
            //判断ip是否已经解析
            if(ipModel::is_empty($ip)){
                ipModel::sum_count($ip);
            }else{
                $data = $this-> analysis($ip);
                $model = new ipModel();
                $model->attributes =$data;
                if($model->validate() && $model->save()){

                }else{

                }
            }

        }
    }

    /**
     * @param $ip
     * @return array|false
     */
    public function analysis($ip){
        $client = new http($this->token);
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
}
<?php


namespace common\models;

use yii\base\Model;

class Ip extends Model
{

    public $ip;


    public function getAddress(){
        $url ="http://ip.taobao.com/service/getIpInfo.php?ip=".$this->ip;
        return json_decode(file_get_contents($url));

    }



}
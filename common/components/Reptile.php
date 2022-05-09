<?php


namespace common\components;


use DiDom\Document;
use yii\base\Component;

/**
 * Class Reptile
 * @property $snoopy
 * @package common\components
 */
class Reptile extends Component
{

    //登录cookie
    public $cookieStr='';
    protected $_snoopy;
    public $url ='';
    public $charset='GBK';
    public $options=[
        'scheme'=>'https',
        'host'=>'https://wuhan.mysteel.com/',
        'user'=>'jh88919070',
        'pass'=>'jhr123456'
    ];
    public $pageMax =20;
    public $data=[];
    public $alias='@backend/runtime/data';
    public $links=[];
    public $sleep=5;


    // +----------------------------------------------------------------------
    // | Snoopy 配置
    // +----------------------------------------------------------------------
    /**
     * 创建snoopy对象
     */
    public function init(){
        $this->_snoopy = new Snoopy();
    }

    /**
     * 返回sonnpy对象
     * @return mixed
     */
    public function getSnoopy(){
        return $this->_snoopy;
    }

    /**
     * 设置snoopy的参数
     * @param $options
     */
    public function setOptions($options){
        $snoopy =$this->snoopy;
        if(is_array($options) and !empty($options)){
            foreach ($options as $key =>$value){
                $snoopy->{$key} =$value;
            }
        }
    }

    /**
     * 设置coo
     * @param $cookieStr
     */
    public function setCookies($cookieStr){
        if(is_array($cookieStr)){
            $this->snoopy->cookies =$cookieStr;
        }elseif (strpos($cookieStr,":") or strpos($cookieStr,";")){
            $this->snoopy->cookies =self::analysisCookiesStr($cookieStr);
        }
    }

    // +----------------------------------------------------------------------
    // | 获取url的html link from
    // +----------------------------------------------------------------------

    /**
     * 获取所有结果
     * @return mixed
     */
    public function getResults(){
        $this->snoopy->fetch($this->url);
        if($this->snoopy->status ==200){
            return $this->to_utf8( $this->snoopy->results);
        }else{
            return false;
        }

    }

    /**
     * 获取的结果的内容(去掉html的部分)
     * @return mixed
     */
    public function getText(){
        $this->snoopy->fetchtext($this->url);
        if($this->snoopy->status ==200){
            return $this->to_utf8( $this->snoopy->results);
        }else{
            return false;
        }
    }

    /**
     * 获取所有连接
     * @return mixed
     */
    public function getLinks(){
        $this->snoopy->fetchlinks($this->url);
        if($this->snoopy->status ==200){
            return $this->to_utf8( $this->snoopy->results);
        }else{
            return false;
        }
    }

    /**
     * 获取表单
     * @return mixed
     */
    public function getForm(){
        $this->snoopy->fetchform($this->url);
        if($this->snoopy->status ==200){
            return $this->to_utf8( $this->snoopy->results);
        }else{
            return false;
        }
    }


    // +----------------------------------------------------------------------
    // | 自定义功能
    // +----------------------------------------------------------------------
    /**
     * 自动改变编码格式
     * @param $html
     * @return bool|false|string
     */
    public  function to_utf8($html){
        if(isset($this->charset) and !empty($this->charset) and $this->charset !='utf-8' ){
            return  iconv($this->charset,'UTF-8',$html);
        }else{
            return $html;
        }

    }

    /**
     * 将Cookies字符串解析为数组
     * @param $str
     * @return array
     */
    public  function analysisCookiesStr($str){
        $data = explode(';',$str);
        $res =[];
        foreach ($data as $key =>$datum){
            $row =explode('=',$datum);
            $res[$row[0]]=$row[1];
        }
        return $res;
    }

    /**
     * 替换字符串中的 空格 换行
     * @param $str
     * @return string|string[]
     */
    public  function str_value($str){
        $str= trim($str);
        $str= str_replace("（", "(",$str);
        $str= str_replace("）", ")",$str);
        $str= str_replace("\r", "",$str);
        $str= str_replace("\n", "",$str);
        $str= str_replace("\r\n", "",$str);
        return $str;
    }

    /**
     * @param $time
     * @return string|string[]
     */
    public  function createFile($time){
        $str= trim($time);
        $str= str_replace("-", "_",$str);
        $str= str_replace(":", "_",$str);
        $str= str_replace("：", "_",$str);
        return str_replace(" ", "T",$str);
    }


}
<?php


namespace common\models\tool;



use \DiDom\Document;
use Exception;
use yii\base\Model;
use common\components\Snoopy;


/**
 * Class MySteel
 * @property-read   $snoopy
 * @property        $cookieStr
 * @property-read   $results
 * @property-read   $text
 * @property-read   $links
 * @property-read   $form
 * @property-write  $options
 * @property-write  $cookies
 *
 * @package common\models\tool
 */
class MySteel extends Model
{
    //登录cookie
    public $cookieStr='href=https://www.mysteel.com/; accessId=5d36a9e0-919c-11e9-903c-ab24dbab411b; Hm_lvt_1c4432afacfa2301369a5625795031b8=1651651145; _last_loginuname=jh88919070;'.
    ' _login_psd=5b029af0216c174dbd9ab8a395834f500; _rememberStatus=true;'. ' _login_token=132df255a2667a9e1fd00eeec6db5535; _login_uid=6008832; _login_mid=6658376;'.
    ' _login_ip=27.19.78.218; 132df255a2667a9e1fd00eeec6db5535=1=10; '. 'qimo_seosource_5d36a9e0-919c-11e9-903c-ab24dbab411b=其他网站; qimo_seokeywords_5d36a9e0-919c-11e9-903c-ab24dbab411b=未知; '.
    'qimo_xstKeywords_5d36a9e0-919c-11e9-903c-ab24dbab411b=;'. ' pageViewNum=2; Hm_lpvt_1c4432afacfa2301369a5625795031b8=1651655408; _last_ch_r_t=1651655406071';
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


    /**
     * 获取钢铁网导览栏信息
     */
    public function getHeads(){
        $this->sookies =$this->cookieStr;
        $this->url ='https://www.mysteel.com/';
        $data =$this->results;
        if($data){
            $document = new Document($data);
            $menus = $document->find('.menuBox a');
            $res =[];
            foreach ($menus as $menu){
                $text = $menu->text();
                $url =$menu->getAttribute ('href');;
                $res[$text] =$url;
            }
            return $res;
        }


    }

    // +----------------------------------------------------------------------
    // | html字符串解析
    // +----------------------------------------------------------------------

    /**
     * 获取某个材料历史记录的url
     * @param $url
     * @return array
     * @throws \DiDom\Exceptions\InvalidSelectorException
     */
    public function getList($url){
        $res=[];
        $this->cookies =$this->cookieStr;
        for ($i=1; $i<=$this->pageMax;$i++){
            $this->url =str_replace("1.html", $i.".html",$url);
            $data =$this->results;
            if($data){
                $document = new Document($data);
                $lis = $document->find('ul.nlist li');
                foreach ($lis as $item){
                    $a =$item->find('a');
                    $span =$item->find('span');
                    if( count($a)>0 and count($span)>0){
                        $res[] =[
                            'time'=> self::str_value($span[0]->text()),
                            'url'=>$a[0]->getAttribute('href'),
                            'titer'=>self::str_value($a[0]->text()),
                        ];
                    }
                }
            }else{
                logObject('第'.$i .'页面打开失败');
                continue;
            }
            unset( $document);
        }
        return $res;
    }

    /**
     * 获取标题
     * @param $tds
     * @return array
     * @throws \DiDom\Exceptions\InvalidSelectorException
     */
    public function field($tds){
        $arr=[];
        foreach ($tds as $td){
           $arr[] =self::str_value( $td->find('strong')[0]->text());
        }
        return $arr;
    }

    /**
     * @param $url
     * @param bool $options true:关联数组?索引数组
     * @return array|bool
     * @throws \DiDom\Exceptions\InvalidSelectorException
     */
    public function getOne($url,$options=true){
        $this->cookies =$this->cookieStr;
        $this->url =$url;
        $data =$this->results;
        $res =[];
        if($data){
            $document = new Document($data);
            //收缩第一行标题
            $field_tr = $document->find('#articleContent tr');
            $field_tds = $field_tr[0]->find('td');
            $column =count( $field_tds);
            $field=$this->field($field_tds);
            //搜索数据
            $trs = $document->find('tr[id^=ctr]');
            if(count($trs)>0){
                foreach ($trs as $tr){
                    $td= $tr->find('td');
                    $arr=[];
                    $i=0;
                    if($options) {
                        //关联数组
                        foreach ($field as $item){
                            $arr[$item] = self::str_value($td[$i]->text());
                            $i++;
                        }
                    } else {
                        //索引数组
                        foreach ($td as $item){
                            if($i>$column){
                                break;
                            }
                            $arr[] =  self::str_value($item->text());
                            $i++;
                        }
                    }
                    $res[] =$arr;
                    unset($arr);
                }
            }
            unset($document);
        }else{
            return false;
        }
        return $res;
    }

    /**
     * 获取某个材料的所有数据，并保存到文件中
     * @param $url
     * @param $path
     */

    /**
     * 获取某个材料的所有数据，并保存到文件中
     * @param $url
     * @param $path
     * @throws \DiDom\Exceptions\InvalidSelectorException
     */
    public function getAll($url,$path){
        set_time_limit(500000);
        $urls =$this->getList($url);
        foreach ($urls as $url){
            try{
                $fileName = $path.'/'.self::createFile( $url['time']).'.txt';
                $arr = $this->getOne($url['url']);
                file_put_contents($fileName,serialize($arr));
            }catch (Exception $exception){
                logObject($url['url']."打开失败");
                continue;
            }
            //等待5秒
            sleep(5);
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
    public static function analysisCookiesStr($str){
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
    public static function str_value($str){
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
    public static function createFile($time){
        $str= trim($time);
        $str= str_replace("-", "_",$str);
        $str= str_replace(":", "_",$str);
        $str= str_replace("：", "_",$str);
        return str_replace(" ", "T",$str);
    }

}
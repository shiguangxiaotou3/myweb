<?php


namespace common\models\tool;

use common\components\File;
use Yii;
use Exception;
use \DiDom\Document;
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
    public $cookieStr='accessId=5d36a9e0-919c-11e9-903c-ab24dbab411b; _last_loginuname=jh88919070; _login_psd=5b029af0216c174dbd9ab8a395834f500; _rememberStatus=true; '.
    'qimo_xstKeywords_5d36a9e0-919c-11e9-903c-ab24dbab411b=; href=https://www.mysteel.com/; Hm_lvt_1c4432afacfa2301369a5625795031b8=1651651145,1651719445,1651764255,1651767167;'.
    ' _login_token=e273b01776a9d1a121f2bfbbe3de145a; _login_uid=6008832; _login_mid=6658376; _login_ip=27.19.78.218; e273b01776a9d1a121f2bfbbe3de145a=1=10; _last_ch_r_t=1651767170256; '.
    'qimo_seosource_5d36a9e0-919c-11e9-903c-ab24dbab411b=其他网站;'. ' qimo_seokeywords_5d36a9e0-919c-11e9-903c-ab24dbab411b=未知; pageViewNum=31; Hm_lpvt_1c4432afacfa2301369a5625795031b8=1651767173';
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
    public $data=[
        'wuhan'=>[
            ['name'=>'建筑钢材','url'=>'https://jiancai.mysteel.com/market/pa228a15346aa0aaaaa1.html'],
//            ['name'=>'冷轧带肋钢筋','url'=>'https://jiancai.mysteel.com/market/pa2158aa01010104aaaaaa1.html'],
//            ['name'=>'热轧板卷','url'=>'https://list1.mysteel.com/market/p-231-----01010301-0-01030204-------1.html'],
//            ['name'=>'热轧开平板','url'=>'https://list1.mysteel.com/market/p-231-----01010306-0-01030204-------1.html'],
//            ['name'=>'耐候钢','url'=>'https://list1.mysteel.com/market/p-231-----01010307-0-01030204-------1.html'],
//            ['name'=>'中厚板','url'=>'https://list1.mysteel.com/market/p-219-----01010204-0-01030204-------1.html'],
//            ['name'=>'中厚板','url'=>'https://list1.mysteel.com/market/p-219-----01010204-0-01030204-------1.html'],
//            ['name'=>'低合金高强板','url'=>'https://list1.mysteel.com/market/p-219-----01010211-0-01030204-------1.html'],
//            ['name'=>'造船板','url'=>'https://list1.mysteel.com/market/p-219-----01010201-0-01030204-------1.html'],
//            ['name'=>'锅炉容器板','url'=>'https://list1.mysteel.com/market/p-219-----01010202-0-01030204-------1.html'],
//            ['name'=>'碳结板','url'=>'https://list1.mysteel.com/market/p-219-----01010206-0-01030204-------1.html'],
//            ['name'=>'耐磨钢','url'=>'https://list1.mysteel.com/market/p-219-----01010205-0-01030204-------1.html'],
//
//            ['name'=>'工角钢','url'=>'https://list1.mysteel.com/market/p-223-----01010701-0-01030204-------1.html'],
//            ['name'=>'H型钢','url'=>'https://list1.mysteel.com/market/p-223-----01010705-0-01030204-------1.html'],
//            ['name'=>'涂镀','url'=>'https://list1.mysteel.com/market/p-435-----010105-0-01030204-------1.html'],
//            ['name'=>'管材','url'=>'https://list1.mysteel.com/market/p-236-----010109-0-01030204-------1.html'],
//            ['name'=>'带钢','url'=>'https://list1.mysteel.com/market/p-231-----010108-0-01030204-------1.html'],
        ],
    ];
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
     * 获取某个材料历史记录的的某一页的所有url
     * @param $url
     * @return array
     * @throws \DiDom\Exceptions\InvalidSelectorException
     */
    public function getListOne($url){
        $this->cookies =$this->cookieStr;
        $this->url =$url;
        $data =$this->results;
        if($data){
            $document = new Document($data);
            $lis = $document->find('ul.nlist li');
            foreach ($lis as $item){
                $a =$item->find('a');
                $span =$item->find('span');
                if( count($a)>0 and count($span)>0){
                    array_push($this->links,[
                        'time'=> self::str_value($span[0]->text()),
                        'url'=>$a[0]->getAttribute('href'),
                        'titer'=>self::str_value($a[0]->text()),
                    ]);
                }
            }
            unset( $document);
        }else{
            logObject($url.'页面打开失败');
            return false;
        }
    }

    /**
     * 获取某个材料历史记录的所有分页的全部url
     * @param $url
     * @return array
     * @throws \DiDom\Exceptions\InvalidSelectorException
     */
    public function getListAll($url){
        $this->links =[];
        for ($i=1; $i<=$this->pageMax;$i++){
            $url_tmp = str_replace("1.html", $i.".html",$url);
            $data = $this->getListOne($url_tmp);
            if($data){
            }else{
                logObject($url_tmp."列表第".$i."页打开失败");
            }
            //等待5秒
            sleep($this->sleep);
        }
        return $this->links;
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
        //获取所有url
        $urls =$this->getListAll($url);
        $str = '共搜索到'.count($urls)."和文件";
        $i=1;
        foreach ($urls as $url){
            try{
                $fileName = $path.'/'.self::createFile($url['time']).'.txt';
                if(!file_exists($fileName)){
                    $arr = $this->getOne($url['url']);
                    if($arr and !empty($arr)){
                        $i++;
                        if(! file_put_contents($fileName,serialize($arr))){
                            logObject($fileName."写入失败");
                            continue;
                        }
                    }
                }
            }catch (Exception $exception){
                logObject($url['url']."打开失败");
                continue;
            }
            //等待5秒
            sleep($this->sleep);
        }
        logObject($str.",其中解析".$i."个");
    }


    public function aa(){
        $data = $this->data;
        set_time_limit(50000000000);
        $path =Yii::getAlias($this->alias);
        foreach ($data as $key =>$datum){
            foreach ($datum as $item){
               File::mk_dir($path."/".$key."/".$item['name'],0777);
                $this->getAll($item['url'],$path."/".$key."/".$item['name']);
           }
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
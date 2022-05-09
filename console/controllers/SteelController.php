<?php


namespace console\controllers;

use Yii;
use common\components\File;
use DiDom\Document;
use yii\console\Controller;
use common\components\Reptile;
use yii\helpers\Console;

/**
 *
 *
 * @property-read  $snoopy
 * @package console\controllers
 */
class SteelController extends Controller
{

    public $snoopy;
    public $cookieStr='_last_loginuname=jh88919070; _login_psd=5b029af0216c174dbd9ab8a395834f500; _rememberStatus=true; Hm_lvt_1c4432afacfa2301369a5625795031b8=1651719445,1651764255,1651767167,1651929747; UM_distinctid=1809eb18b58b4-0c21534ac930fa-60306731-c7764-1809eb18b595c0; _last_ch_r_t=1651929877089; href=https://wuhan.mysteel.com/; accessId=5d36a9e0-919c-11e9-903c-ab24dbab411b; pageViewNum=1; Hm_lpvt_1c4432afacfa2301369a5625795031b8=1651934355';
    public $url='https://jiancai.mysteel.com/market/pa228a15346aa0aaaaa1.html';
    public $pageMax=25;
    public $i=1;
    public $status= true;

    public function init(){
        $this->snoopy = new Reptile();
    }

    /**
     * 显示消息
     * @param $message
     */
    public function message($message ){
        if($this->status){
            echo " ".$this->i.":".$message."\n";
            $this->i ++;
        }
    }

    /**
     * 获取某个材料历史记录的的某一页的所有url
     * @param $url
     * @return array
     * @throws \DiDom\Exceptions\InvalidSelectorException
     */
    public function getListOne($url){
        $this->snoopy-> cookies =$this->cookieStr;
        $this->snoopy->url =$url;
        $data =$this->snoopy->results;
        $arr =[];
        if($data){
            /** @var  $document Document */
            $document = new Document($data);
            $lis = $document->find('ul.nlist li');
            foreach ($lis as $item){
                $a =$item->find('a');
                $span =$item->find('span');
                if( count($a)>0 and count($span)>0){
                    $this->message($a[0]->getAttribute('href'));
                    array_push( $arr,[
                        'time'=> $span[0]->text(),
                        'url'=>$a[0]->getAttribute('href'),
                        'titer'=>$a[0]->text(),
                    ]);
                }
            }
            unset( $document);
            return  $arr;
        }else{
            echo $url.":获取列表失败".'\n\n';
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
        $arr =[];
        for ($i=1; $i<=$this->pageMax;$i++){
            $url_tmp = str_replace("1.html", $i.".html",$url);
            $data = $this->getListOne($url_tmp);
            if($data){
                foreach ($data as $datum){
                    array_push($arr,$datum);
                }
            }else{
                $this->message("列表". $url_tmp." 第".$i."页打开失败");
            }
        }
        return $arr;
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
            $arr[] = $this->snoopy->str_value( $td->find('strong')[0]->text());
        }
        return $arr;
    }

    /**
     * @param $url
     * @param bool $options true:关联数组?索引数组
     * @return array|bool
     * @throws \DiDom\Exceptions\InvalidSelectorException
     */
    public function getDataOne($url,$options=true){
        $this->snoopy-> cookies =$this->cookieStr;
        $this->snoopy->url =$url;
        $data =$this->snoopy->results;
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
                            $arr[$item] = $this->snoopy->str_value($td[$i]->text());
                            $i++;
                        }
                    } else {
                        //索引数组
                        foreach ($td as $item){
                            if($i>$column){
                                break;
                            }
                            $arr[] =   $this->snoopy->str_value($item->text());
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
     * @throws \DiDom\Exceptions\InvalidSelectorException
     */
    public function getDataAll($url,$path=''){
        //获取所有url
        $this->status =false;
        $urls =$this->getListAll($url);
        $this->status =true;
        $i=1;
        Console::startProgress(0, count($urls));
            foreach ($urls as $url){
                $arr = $this->getDataOne($url['url']);
//                $fileName = $path.'/'.self::createFile($url['time']).'.txt';
//                if(!file_exists($fileName)){
//                    $arr = $this->getOne($url['url']);
//                    if($arr and !empty($arr)){
//                        $i++;
//                        if(! file_put_contents($fileName,serialize($arr))){
//                            logObject($fileName."写入失败");
//                            continue;
//                        }
//                    }
//                }

            usleep(1000);
            Console::updateProgress($i, count($urls));
            $i++;
        }
        Console::endProgress();
    }


    /**
     * 获取一个地区多种材料的所有数据
     * @param $config
     * @param $alias
     * @throws \DiDom\Exceptions\InvalidSelectorException
     */
    public function aa($config,$alias){
        $data = $config;
        set_time_limit(50000000000);
        $path =Yii::getAlias($alias);
        foreach ($data as $key =>$datum){
            foreach ($datum as $item){
                File::mk_dir($path."/".$key."/".$item['name'],0777);
                $this->getAll($item['url'],$path."/".$key."/".$item['name']);
            }
        }
    }

    /**
     * 检查cookie和url
     */
    public function before(){
        if(!isset($this->cookieStr) or empty($this->cookieStr)){
            echo "\n  请设置cookie:";
            $this->cookieStr = trim(fgets(STDIN));
        }
        if(!isset($this->url) or empty($this->url)){
            echo "\n  请设置url:";
            $this->url = trim(fgets(STDIN));
        }
    }

    /**
     * 获取材料的列表的一页的所有url
     * @throws \DiDom\Exceptions\InvalidSelectorException
     */
    public function actionListOne(){
        $data = $this->getListOne($this->url);
        if($data){
            $this->message( " 用搜索到".count($data).'条记录');
        }
    }

    /**
     * 获取材料的列表的所有历是记录的url
     * @throws \DiDom\Exceptions\InvalidSelectorException
     */
    public function actionListAll(){
        $data = $this->getListAll($this->url);
        if($data){
            $this->message( " 用搜索到".count($data).'条记录');
        }
        Console::startProgress(0, 1000);
        for ($n = 1; $n <= 1000; $n++) {
            usleep(1000);
            Console::updateProgress($n, 1000);

        }
        Console::endProgress();
    }

    /**
     * 解析材料某一天的数据
     * @throws \DiDom\Exceptions\InvalidSelectorException
     */
    public function actionDataOne(){
        $this->getDataOne($this->url);
    }

    /**
     * 解析材料所有的历史数据
     * @throws \DiDom\Exceptions\InvalidSelectorException
     */
    public function actionDataAll(){
        $this->getDataAll($this->url);
    }

}
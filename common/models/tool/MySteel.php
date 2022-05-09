<?php


namespace common\models\tool;

use common\components\File;
use common\components\Reptile;
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
class MySteel extends Reptile
{


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
        $arr =[];
        if($data){
            $document = new Document($data);
            $lis = $document->find('ul.nlist li');
            foreach ($lis as $item){
                $a =$item->find('a');
                $span =$item->find('span');
                if( count($a)>0 and count($span)>0){
                    array_push( $arr,[
                        'time'=> self::str_value($span[0]->text()),
                        'url'=>$a[0]->getAttribute('href'),
                        'titer'=>self::str_value($a[0]->text()),
                    ]);
                }
            }
            unset( $document);
            return  $arr;
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
       $arr =[];
        for ($i=1; $i<=$this->pageMax;$i++){
            $url_tmp = str_replace("1.html", $i.".html",$url);
            $data = $this->getListOne($url_tmp);
            if($data){
                foreach ($data as $datum){
                    array_push($arr,$datum);
                }
            }else{
                logObject($url_tmp."列表第".$i."页打开失败");
            }
            //等待5秒
           // sleep($this->sleep);
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

    public function actionGetList(){
        echo "搜索有一中材料历是记录的url";
        echo "\n  请设置Cookie ";
        $answer = trim(fgets(STDIN));
        if(isset($answer) and !empty($answer)){
            $this->cookies =$this->cookieStr;
            $this->url =$url;
        }
    }

}
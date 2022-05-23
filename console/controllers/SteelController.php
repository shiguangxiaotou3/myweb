<?php


namespace console\controllers;



use common\models\Excel;
use frontend\models\Steel;
use Yii;
use common\components\File;
use DiDom\Document;
use yii\console\Controller;
use common\components\Reptile;
use yii\db\Exception;
use yii\helpers\Console;
use console\models\PrintTable;
/**
 *
 *
 * @property-read  $snoopy
 *  @property $alisa
 * @package console\controllers
 */
class SteelController extends Controller
{

    public $snoopy;
    public $cookieStr='fingerprint=0d8272a40be1d2cee44f3683c4393d19; Hm_lvt_1c4432afacfa2301369a5625795031b8=1653046770,1653135188,1653230311,1653313715; _last_loginuname=jh88919070; _login_psd=5b029af0216c174dbd9ab8a395834f500; _rememberStatus=true; _login_token=89dee12226aa669b3f8c4ffef2f48c36; _login_uid=6008832; _login_mid=6658376; _login_ip=27.19.76.206; 89dee12226aa669b3f8c4ffef2f48c36=1=10; _last_ch_r_t=1653313720243; Hm_lpvt_1c4432afacfa2301369a5625795031b8=1653313720';
    public $url='https://jiancai.mysteel.com/market/pa228a15346aa0aaaaa1.html';
    public $alisa ="@frontend/web/excel";
    public $pageMax=25;
    public $_path ="";
    public $i=1;
    public $status= true;

    public $config=[
        '武汉'=>[
            ['name'=>'建筑钢材价格','url'=>'https://jiancai.mysteel.com/market/pa228a15346aa0aaaaa1.html'],
            ['name'=>'冷轧带肋钢筋价格','url'=>'https://jiancai.mysteel.com/market/pa2158aa01010104a0a010302aaaa1.html'],
            ['name'=>'热轧板卷价格','url'=>'https://list1.mysteel.com/market/p-231-----01010301-0-01030204-------1.html'],
            ['name'=>'热轧开平板','url'=>'https://list1.mysteel.com/market/p-231-----01010306-0-01030204-------1.html'],
            ['name'=>'耐候钢','url'=>'https://list1.mysteel.com/market/p-231-----01010307-0-01030204-------1.html'],
            ['name'=>'中厚板','url'=>'https://list1.mysteel.com/market/p-219-----01010204-0-01030204-------1.html'],
            ['name'=>'低合金高强板','url'=>'https://list1.mysteel.com/market/p-219-----01010211-0-01030204-------1.html'],
            ['name'=>'造船板','url'=>'https://list1.mysteel.com/market/p-219-----01010201-0-01030204-------1.html'],
            ['name'=>'锅炉容器板','url'=>'https://list1.mysteel.com/market/p-219-----01010202-0-01030204-------1.html'],
            ['name'=>'碳结板','url'=>'https://list1.mysteel.com/market/p-219-----01010206-0-01030204-------1.html'],
            ['name'=>'耐磨钢','url'=>'https://list1.mysteel.com/market/p-219-----01010205-0-01030204-------1.html'],
            ['name'=>'工角钢','url'=>'https://list1.mysteel.com/market/p-223-----01010701-0-01030204-------1.html'],
            ['name'=>'H型钢','url'=>'https://list1.mysteel.com/market/p-223-----01010705-0-01030204-------1.html'],
            ['name'=>'涂镀价格','url'=>'https://list1.mysteel.com/market/p-435-----010105-0-01030204-------1.html'],
            ['name'=>'管材价格','url'=>'https://list1.mysteel.com/market/p-236-----010109-0-01030204-------1.html'],
            ['name'=>'带钢价格','url'=>'https://list1.mysteel.com/market/p-231-----010108-0-01030204-------1.html'],
        ],
        '全国'=>[['name'=>'建筑钢材价格','url'=>'https://jiancai.mysteel.com/market/pa228a15346aa0aaaaa1.html'],],
    ];
    // +----------------------------------------------------------------------
    // | 功能实现
    // +----------------------------------------------------------------------
    public function init(){
        $this->_path = Yii::getAlias($this->alisa);
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

    // +----------------------------------------------------------------------
    // | 控制台交互
    // +----------------------------------------------------------------------
    /**
     * 获取材料的列表的一页的所有url
     * @throws \DiDom\Exceptions\InvalidSelectorException
     */
    public function actionListOne($url){
        $data = $this->getListOne($url);
        if($data){
            echo PrintTable::Print_table( $data) ;
        }
    }

    /**
     * 获取材料的列表的所有历是记录的url
     * @param $url
     * @throws \DiDom\Exceptions\InvalidSelectorException
     */
    public function actionListAll($url){
        $data = $this->getListAll($url);
        if($data){
            echo PrintTable::Print_table( $data) ;
        }
    }

    /**
     *  解析材料某一天的数据
     * @param $url
     * @throws \DiDom\Exceptions\InvalidSelectorException
     */
    public function actionDataOne($url){
        $data =  $this->getDataOne($url);
        if($data){
            echo PrintTable::Print_table( $data) ;
        }
    }

    /**
     * 解析材料所有的历史数据
     * @throws \DiDom\Exceptions\InvalidSelectorException
     */
    public function actionDataAll(){
        $this->getDataAll($this->url);
    }

    /**
     * 自动更新数据，并记录在缓存文件中
     * @throws \DiDom\Exceptions\InvalidSelectorException
     */
    public function actionAuto(){
        $cache = Yii::$app->cache;
        $config = $this->config;
        foreach ($config as $city =>$item){
            echo "--".$city."\n";
            foreach ($item as $row){
                echo "----".$row["name"]."\n";
                //判断是否获取全部列表
                if(  is_dir($this->_path."/".$city."/".$row["name"])){
                    $list = $this->getListOne($row['url']);
                }else{
                    $list = $this->getListAll($row['url']);
                }
                //遍历列表加载数据
                $i=0;
                $n =count($list);
                Console::startProgress(0,$n);
                foreach ($list as $item){
                    $time = strtotime($item['time']);
                    //缓存不存在
                    if(!$cache->exists($city.".".$row["name"].".".$time)){
                        $data = $this->getDataOne($item['url']);
                        if($data and !empty($data)){
                            $path =$this->_path."/".$city."/".$row["name"];
                            if(!is_dir($path)){
                                File::mk_dir($path);
                            }
                            $excelFileName =$path."/".$time.".xls";
                            if(!file_exists($excelFileName)){
                                Steel::addData([
                                    'city'=>$city,
                                    'type'=>$row['name'],
                                    'time'=>$time,
                                    'titer'=>$item['titer']
                                ]);
                                Excel::create($excelFileName,$item['titer'],$data);
                                $cache->set($city.".".$row["name"].".".$time, $item);
                            }
                            unset($data);
                        }
                        // usleep(1000);
                    }
                    Console::updateProgress($i,$n);
                    $i++;
                }
                Console::endProgress();
                unset($list);
            }
            unset($item);
            echo "--".$city."\n";
        }
    }

    /**
     * 更新某城市的某一种材料
     */
    public function actionAutoOne(){
        ini_set('max_execution_time' ,0);
        echo "  请选择城市:"."\n";
        $config =$this->config;
        $keys =array_keys($config);
        foreach ($keys as $key=>$value){
            echo "      ".$key.":".$value."\n";
       }
        $key =  Console::select("  请选择", $keys );
        $city =$keys[$key];
        $r = Console::ansiFormat($city,[Console::FG_YELLOW]);
        Console::output("  你选择的城市：{$r}");

        $data = $config[$city];
        $names = array_column($data,"name");
        $urls = array_column($data,"url");
        echo "  请选择材料类型:"."\n";
        foreach ($names as $key =>$value){
            echo "      ".$key.":".$value."\n";
        }
        $name_key =  Console::select("  请种类", $names );
        $name = $names[$name_key];
        $url = $urls[$name_key];
        $r = Console::ansiFormat($names[$name_key],[Console::FG_YELLOW]);
        Console::output("  你材料类型：{$r}");
        if(Console::confirm("  你确定吗？")){
            $cache = Yii::$app->cache;
            $list = $this->getListAll($url);
            $i=0;
            $n =count($list);
            Console::startProgress(0,$n);
            foreach ($list as $item){
                $time = strtotime($item['time']);
                //缓存不存在
                if(!$cache->exists($city.".".$name.".".$time)){
                    $data = $this->getDataOne($item['url']);
                    if($data and !empty($data)){
                        $path =$this->_path."/".$city."/".$name;
                        if(!is_dir($path)){
                            File::mk_dir($path);
                        }
                        $excelFileName =$path."/".$time.".xls";
                        if(!file_exists($excelFileName)){
                            Steel::addData([
                                'city'=>$city,
                                'type'=>$name,
                                'time'=>$time,
                                'titer'=>$item['titer']
                            ]);
                            Excel::create($excelFileName,$item['titer'],$data);
                            $cache->add($city.".".$name.".".$time, $item);
                        }
                        unset($data);
                    }
                }
                Console::updateProgress($i,$n);
                $i++;
            }
            Console::endProgress();
            unset($list);
        }else{
            die();
        }

    }

    /**
     * 清空数据，
     */
    public function actionClear(){
        ini_set('max_execution_time' ,0);
        if(Console::confirm("  你确定吗？")){
            $cache = Yii::$app->cache;
            $cache ->flush();
            File::clearDir($this->_path);
            Steel::deleteAll();
        }

    }

}
<?php
namespace common\models\basicData;

use Yii;
use yii\base\Model;

class WriteConfigArray extends Model{

    /** @var $appname string*/
    public $appname;


    public function rules(){

    }

    /**
     * @param string $app 应用名称
     * @param string $file 相对路径
     * @param array $array 要写入的数组
     */
    public function saveConfig($app,$file,$array){
        $dir = Yii::getAlias($app);
        $data = require($dir.$file);
        $arr = array_merge($data,$array);
        $str = "<?php\r\nreturn [\r\n";  // 拼接数组字符串-开头
        $str .= self::arraytostr($str, $arr,1);  // 拼接数组字符串-中间
        $str .= "];";  //
        file_put_contents($dir.$file, $str);
    }

    /**
     * 构造写入数据
     * @param $str
     * @param $array
     * @param int $space
     */
    public static function arrayToStr(&$str, $array, $space=0){
        $spaces = '';
        for($i=0; $i<$space*4;$i++){
            $spaces .= " ";
        }
        foreach($array as $k=>$item){
            if(is_array($item)){
                $str .= "$spaces'$k' => [\r\n";
                $str .= self::arrayToStr($str, $item, $space+1);
                $str .= "$spaces],\r\n";
            }else{
                $str .= "$spaces'$k' => '$item',\r\n";
            }
        }
    }


    public static function addI18n($category,$arr,$options =false){
        $dir = Yii::getAlias("@common").'/messages/zh_CN/';
        $file = $dir.$category.'.php';
        $data = self::autoData($file);
        //如果为false，则覆盖已经被定义的
        if($options == false){
            $res = array_merge($data,$arr);
        }else{
            $res = self::merge($data,$arr);
        }
        
        $str = "<?php\r\nreturn [\r\n";  // 拼接数组字符串-开头
        $str .= self::arraytostr($str, $res,1);  // 拼接数组字符串-中间
        $str .= "];";  //
        file_put_contents($file, $str);

    }

    /**
     * 自动创建目录，返回文件的数据
     * @param $path
     * @return mixed
     */
    public static function autoData($path){
        //如果文件存在直接返回,配置数据
       if(file_exists($path)){
           return self::loadData($path);
       }else{
           //如果目录不存在，则创建目录
           $dir = dirname($path);
           if(!is_dir($dir)){
               //创建目录，并创建文件
               if(self::createDir($dir)){
                   self::createFile($path);
                   return self::loadData($path);
               }else{
                   return false;
               }
           }else{  //创建文件
            self::createFile($path);
            return self::loadData($path);
           }
       }





    }

    /**
     * @param $dir
     */
    public static function createDir($dir){
        try {
            $data = explode("/",$dir);
            $dir ='/';
            foreach ($data as $i){
                if($i !== ""){
                    if(! is_dir($dir."/".$i)){
                        mkdir($dir."/".$i,0777,true);
                    }
                    $dir .="/".$i;
                }
            }
            return true;
        }catch (\Exception $e){
            logObject($e->getMessage());
            return  false;
        }
    }

    /**
     * @param string $file
     * @return mixed
     */
    public static function createFile($file){
        $str ="<?php \r\nreturn [];";
        if(!file_exists($file)){
            file_put_contents($file,$str,FILE_APPEND);
            return true;
        }
        return false;
    }


    public static function loadData($file){
        return require($file);
    }

    /**
     *
     */
    public static function merge($data,$add_array){
        $keys = array_keys($data);
        foreach($add_array as $key=>$value){
            if(!in_array($key,$keys)){
                    $data[$key] = $value;
            }
        }

        return $data;
    }




}
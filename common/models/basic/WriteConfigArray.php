<?php
namespace common\models\basic;

use Yii;
use yii\base\Model;

/**
 * 将配置信息写入php配置文件
 * @package common\models\basic
 */
class WriteConfigArray extends File {

    /**
     * @param string $app 应用名称
     * @param string $file 相对路径
     * @param array $array 要写入的数组
     */
    public function saveConfig($app,$file,$array){
        $dir = Yii::getAlias($app);
        $file =$dir.$file;
        $data = self::autoData($file);
        $arr = array_merge($data,$array);
        $str = "<?php\r\nreturn [\r\n";  // 拼接数组字符串-开头
        $str .= self::arraytostr($str, $arr,1);  // 拼接数组字符串-中间
        $str .= "];";  //
        file_put_contents($dir.$file, $str);
    }

    /**
     * 添加翻译,如果键重复，默认是不会添加
     * @param array $arr
     * @param string $category
     * @param false $options
     * @return false|int
     */
    public static function addI18n($arr,$category = 'app',$options =false){
        $dir = Yii::getAlias("@common").'/messages/zh-CN/';
        $file = $dir.$category.'.php';
        self::autoCreatePath($file);
        $data = self::loadData($file);
        //如果为false，则覆盖已经被定义的
        if($options == false){
            $res = array_merge($data,$arr);
        }else{
            $res = self::merge($data,$arr);
        }
        return self::writeArray($file,$res);
    }

    //=================================================
    /**
     * 构造写入数据
     * @param $str
     * @param $array
     * @param int $space
     */
    public static function ConfigToStr(&$str, $array, $space = 0){
        $spaces = '';
        for($i=0; $i<$space*4;$i++){
            $spaces .= " ";
        }
        foreach($array as $k=>$item){
            if(is_array($item)){
                $str .= "$spaces'$k' => [\r\n";
                $str .= self::ConfigToStr($str, $item, $space+1);
                $str .= "$spaces],\r\n";
            }else{
                $str .= "$spaces'$k' => '$item',\r\n";
            }
        }
    }

    /**
     * 递归创建文件或目录,成功返回true，否则返回false
     * @param $path
     * @return mixed
     */
    public static function autoCreatePath($path){
        //如果文件存在直接返回,配置数据
       if(file_exists($path)){
          return true;
       }else{
           //如果目录不存在，则创建目录
           $dir = dirname($path);
           if(!is_dir($dir)){
               //创建目录，并创建文件
               if(self::createDir($dir)){
                   self::createFile($path);
                  return true;
               }else{
                   return false;
               }
           }else{
               self::createFile($path);
                return true;
           }
       }
    }

    /**
     * 递归创建目录
     * @param $dir
     * @return bool
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
     * 创建文件
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

    /**
     * 获取配置数据
     * @param $file
     * @return mixed
     */
    public static function loadData($file){
        return require($file);
    }

    /**
     * 将根据键名称合并数组
     * @param $data
     * @param $add_array
     * @return mixed
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

    /**
     * 构造写入字符串,并写入文件中
     * @param $file
     * @param $arr
     * @return false|int
     */
    public static function writeArray($file,$arr){
        if(file_exists($file)){
            $str = "<?php\r\nreturn [\r\n";  // 拼接数组字符串-开头
            $str .= self::arraytostr($str, $arr,1);  // 拼接数组字符串-中间
            $str .= "];";  //
            return file_put_contents($file, $str);
        }
        return false;
    }
}
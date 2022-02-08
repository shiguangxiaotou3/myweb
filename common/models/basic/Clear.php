<?php
namespace common\models\basic;

use Yii;
use yii\base\Model;
use yii\helpers\ArrayHelper;

/**
 * 清理app应用 缓存文件 日志文件 临时文件 已发布资源包
 * @package common\models\basic
 */
class Clear extends Model{

    /**
     * 临时文件目录
     * @return string[][]
     */
    public static function config(){
        return [
            'backend'=>[
                'cache'=>'@backend/runtime/cache',
                'debug'=>'@backend/runtime/debug',
                'HTML'=>'@backend/runtime/HTML',
                'logs'=>'@backend/runtime/logs',
                'URI'=>'@backend/runtime/URI',
                'assets'=>'@backend/web/assets',

            ],
            'api'=>[
                'cache'=>'@api/runtime/cache',
                'debug'=>'@api/runtime/debug',
                'HTML'=>'@api/runtime/HTML',
                'logs'=>'@api/runtime/logs',
                'URI'=>'@api/runtime/URI',
                'assets'=>'@api/web/assets',

            ],
            'frontend'=>[
                'cache'=>'@frontend/runtime/cache',
                'debug'=>'@frontend/runtime/debug',
                'HTML'=>'@frontend/runtime/HTML',
                'logs'=>'@frontend/runtime/logs',
                'URI'=>'@frontend/runtime/URI',
                'assets'=>'@frontend/web/assets',

            ],
            'vba'=>[
                'cache'=>'@vba/runtime/cache',
                'debug'=>'@vba/runtime/debug',
                'HTML'=>'@vba/runtime/HTML',
                'logs'=>'@vba/runtime/logs',
                'URI'=>'@vba/runtime/URI',
                'assets'=>'@vba/web/assets',

            ],
            'console'=>[
                'cache'=>'@console/runtime/cache',
                //'debug'=>'@console/runtime/debug',
                //'HTML'=>'@console/runtime/HTML',
                'logs'=>'@console/runtime/logs',
                //'URI'=>'@console/runtime/URI',
                'assets'=>'@console/web/assets',
            ],
        ];
    }

    /**
     * 获取绝对路径
     * @param $key
     * @return false|string
     * @throws \Exception
     */
    public static function getDir($key){
      return Yii::getAlias( ArrayHelper::getValue(self::config(),$key));
    }

    /**
     * 删除文件和目录
     * @param $path
     * @return bool
     */
    public static function del($path){
        if(is_dir($path)){
            //获取原来的目录权限
            //$Permissions = self::getDirPermissions($path);
            //删除所有文件
            deldir($path);
            //获取子目录
            $dirs= self::getChildrensByDir($path);
            //删除子目录
            if(!empty($dirs)){
                foreach ($dirs as $dir){
                    self::delDir($dir);
                }
            }
            return true;
        }
        return false;
    }

    /**
     * 清空所有临时文件目录
     * @return bool
     */
    public static function delAll(){
        try {
            $path = self::config();
            unset($path['backend']['cache']);
            unset($path['api']['cache']);
            unset($path['frontend']['cache']);
            unset($path['vba']['cache']);
            unset($path['console']['cache']);
            foreach ($path as $key ){
                foreach ($key as $value){
                    $path = Yii::getAlias($value);
                    self::del($path);
                }
            }
            return true;
        }catch (\Exception $exception){
            return false;
        }

    }

    /**
     * 获取目录大小
     * @param $dir
     * @return false|int
     */
    public  static function countDirSize($dir){
        if(is_dir($dir)){
            $handle = opendir($dir);
            $sizeResult=0;
            while (false!==($FolderOrFile = readdir($handle))) {
                if($FolderOrFile != "." && $FolderOrFile != "..") {
                    if(is_dir("$dir/$FolderOrFile")) {
                        $sizeResult +=self::countDirSize("$dir/$FolderOrFile");
                    } else {
                        $sizeResult += filesize("$dir/$FolderOrFile");
                    }
                }
            }
            closedir($handle);
            return $sizeResult;
        }else{
            return  false;
        }

    }

    /**
     * 获取所有临时目录大小
     * @return array
     * @throws \Exception
     */
    public function getSizeAll(){
        $data = self::config();
        $res = array();
        foreach ($data as $key1=>$datum){
            foreach ($datum as $key2=>$item){
                $res[$key1][$key2] = $this->countDirSize(self::getDir($key1.'.'.$key2));
            }
        }
        return $res;
    }

    /**
     * 递归删除目录
     * @param $dir
     */
    public static function delDir($dir){
        if(is_dir($dir)){
            $p = scandir($dir);
            foreach($p as $val){
                if($val != '.' and $val != '..'){
                    $isNull = array_diff(scandir($dir.'/'.$val),array('..','.'));
                    if(empty($isNull)){
                        rmdir($dir.'/'.$val);
                    }else{
                        self::delDir($dir.'/'.$val);
                    }
                }
            }
            rmdir($dir);
        }
    }

    /**
     * 获取目录的权限 十进制
     * @param $dir
     * @return false|string
     */
    public static function getDirPermissions($dir){
        return substr(base_convert(fileperms($dir),10,8),-4);
    }

    /**
     * 递归创建目录
     * @param $dir
     * @param int $permissions
     * @return bool
     */
    public static function  CreateDir($dir,$permissions = 0777){
        $data = explode("/",$dir);
        $path ='/';
        foreach ($data as $i){
            if($i !== ""){
                if(! is_dir($path."/".$i)){
                    mkdir($path."/".$i,$permissions,true);
                }
                $path .="/".$i;
            }
        }
        return  true;
    }

    /**
     * 获取父目录的子目录
     * @param $dir
     * @return array|bool
     */
    public static function getChildrensByDir($dir){
        if(is_dir($dir)){
            $handle = opendir($dir);
            $res =array();
            while (false!==($FolderOrFile = readdir($handle))) {
                if($FolderOrFile != "." && $FolderOrFile != "..") {
                    if(is_dir("$dir/$FolderOrFile")) {
                        $res[] = "$dir/$FolderOrFile";
                    }
                }
            }
            closedir($handle);
            return $res;
        }
        return false;
    }
}
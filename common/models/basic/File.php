<?php


namespace common\models\basic;


use yii\base\Exception;


/**
 * Class File
 * @package common\models\basic
 */
class File
{
    //file_put_contents($file,$str,FILE_APPEND);
    //file_get_contents($path);

    /**
     * 获取目录大小
     * @param $path
     * @return false|int
     */
    public static function getDirSize($path){
        if(is_dir($path)){
            $handle = opendir($path);
            $sizeResult =0;
            while (false!==($FolderOrFile = readdir($handle))) {
                if($FolderOrFile != "." && $FolderOrFile != "..") {
                    if(is_dir("$path/$FolderOrFile")) {
                        $sizeResult += self::getDirSize($path."/".$FolderOrFile);
                    } else {
                        $sizeResult += filesize($path."/".$FolderOrFile);
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
     * 清空目录
     * @param $path
     * @return int[]|bool
     */
    public static function delAll($path){
        if(is_dir($path)){
            $dirNumber = 0;
            $fileNumber = 0;
            //如果是目录则继续
            if(is_dir($path)){
                //扫描一个文件夹内的所有文件夹和文件并返回数组
                $p = scandir($path);
                foreach($p as $val){
                    //排除目录中的.和..
                    if($val !="." && $val !=".."){
                        //如果是目录则递归子目录，继续操作
                        if(is_dir($path.$val)){
                            //子目录中操作删除文件夹和文件
                            deldir($path.$val.'/');
                            //目录清空后删除空文件夹
                            @rmdir($path.$val.'/');
                            $dirNumber ++;
                        }else{
                            //如果是文件直接删除
                            unlink($path.$val);
                            $fileNumber ++;
                        }
                    }
                }
            }
            return array('dirNumber'=>$dirNumber,'fileName'=>$fileNumber);
        }else{
            return  false;
        }

    }

    /**
     * 获取目录下的所文件和名称
     * @param $path
     * @return array[]|false
     */
    public static function getDirChildren($path){
        if(is_dir($path)){
            $arr = scandir($path);
            $res = array(
                'file'=>array(),
                'dir'=>array(),
                );
            foreach ($arr as $value){
                if($value !="." and $value != '..'){
                    if(is_dir($path."/".$value)){
                        array_push($res['dir'],$value);
                    }
                    if(is_file($path."/".$value)){
                        array_push($res['file'],$value);
                    }
                }
            }
            foreach ($res as $key =>$value){
                if(empty($res[$key])){
                    unset($res[$key]);
                }
            }
            return  $res;
        }else{
            return false;
        }
    }

    /**
     * 获取目录下的所隐藏文件和名称
     * @param $path
     * @return array[]|false
     */
    public static function getDirHideChildren($path){
        if(is_dir($path)){
            $arr = scandir($path);
            $res = array(
                'file'=>array(),
                'dir'=>array(),
            );
            foreach ($arr as $value){
                if($value !="." and $value != '..'){
                    if(is_dir($path."/".$value ) && substr($value,0,1)=='.'){
                            array_push($res['dir'],$value);
                    }
                    if(is_file($path."/".$value ) && substr($value,0,1)=='.'){
                        array_push($res['file'],$value);
                    }
                }
            }
            return  $res;
        }else{
            return false;
        }
    }

    /**
     * 读取文件类容
     * @param $path
     * @return bool
     */
    public static function readFile($path){
        if(file_exists($path)){
            return file_get_contents($path);
        }else{
            return  false;
        }
    }

}
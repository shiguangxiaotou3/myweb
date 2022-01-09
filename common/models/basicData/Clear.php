<?php
namespace common\models\basicData;

use Yii;
use yii\base\Model;
use yii\helpers\ArrayHelper;

class Clear extends Model{


    /**
     * 临时文件目录
     * @return \string[][]
     */
    public static function config(){
        return [
            'backend'=>[
                'cache'=>'@backend/runtime/cache/',
                'debug'=>'@backend/runtime/debug/',
                'HTML'=>'@backend/runtime/HTML/',
                'logs'=>'@backend/runtime/logs/',
                'URI'=>'@backend/runtime/URI/',
                'assets'=>'@backend/web/assets/',

            ],
            'api'=>[
                'cache'=>'@api/runtime/cache/',
                'debug'=>'@api/runtime/debug/',
                'HTML'=>'@api/runtime/HTML/',
                'logs'=>'@api/runtime/logs/',
                'URI'=>'@api/runtime/URI/',
                'assets'=>'@api/web/assets/',

            ],
            'frontend'=>[
                'cache'=>'@frontend/runtime/cache/',
                'debug'=>'@frontend/runtime/debug/',
                'HTML'=>'@frontend/runtime/HTML/',
                'logs'=>'@frontend/runtime/logs/',
                'URI'=>'@frontend/runtime/URI/',
                'assets'=>'@frontend/web/assets/',

            ],
            'vba'=>[
                'cache'=>'@vba/runtime/cache/',
                'debug'=>'@vba/runtime/debug/',
                'HTML'=>'@vba/runtime/HTML/',
                'logs'=>'@vba/runtime/logs/',
                'URI'=>'@vba/runtime/URI/',
                'assets'=>'@vba/web/assets/',

            ],
            'console'=>[
                'cache'=>'@console/runtime/cache/',
                //'debug'=>'@console/runtime/debug/',
                //'HTML'=>'@console/runtime/HTML/',
                'logs'=>'@console/runtime/logs/',
                //'URI'=>'@console/runtime/URI/',
                //'assets'=>'@console/web/assets/',
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
     * @return int[]
     */
    public function del($path){
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
            return array($dirNumber,$fileNumber);
        }else{
            return  false;
        }

    }

    /**
     * 获取目录大小
     * @param $dir
     * @return false|int
     */
    public function countDirSize($dir){
        if(is_dir($dir)){
            $handle = opendir($dir);
            $sizeResult =0;
            while (false!==($FolderOrFile = readdir($handle))) {
                if($FolderOrFile != "." && $FolderOrFile != "..") {
                    if(is_dir("$dir/$FolderOrFile")) {
                        $sizeResult +=$this->countDirSize("$dir/$FolderOrFile");
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
    public function tmpSize(){
        $data = self::config();
        $res = array();
        foreach ($data as $key1=>$datum){
            foreach ($datum as $key2=>$item){
                $res[$key1][$key2] = $this->countDirSize(self::getDir($key1.'.'.$key2));
            }
        }
        return $res;
    }



}
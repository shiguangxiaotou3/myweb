<?php


namespace console\controllers;;

use console\models\PrintTable;
use Yii;
use yii\base\Widget;
use yii\console\Controller;
use yii\helpers\FileHelper;

/**
 * apache2
 * @package console\controllers
 */
class Apache2Controller extends Controller{

    public $path = [
        'Ubuntu'=>'/etc/apche2',
        'Windows'=>'E:/AppServ/Apache24/conf/extra/httpd-vhosts.conf',
    ];
    public $uname='';
    public $file ='';


    public string $template =<<<HTML
<VirtualHost *:80>
    ServerAdmin 757402123@qq.com
    DocumentRoot "{DocumentRoot}"
    ServerName {ServerName}
    ServerAlias {ServerAlias}
    ErrorLog "logs/dummy-host2.example.com-error.log"
    CustomLog "logs/dummy-host2.example.com-access.log" common
</VirtualHost>
HTML;

    /**
     * 初始化设置配置文件
     */
    public function init(){
       if(self::isLinux()){
           $this->uname = 'Ubuntu';
           $this->file = FileHelper::findFiles($this->path['Ubuntu']."/sites-available",['only'=>['*.conf']]);
       }else{
           $this->uname = 'Windows';
           $this->file =$this->path['Windows'];
       }
    }

    /**
     *
     */
    public function actionAdd(){
        echo "请输入路径:";
        $DocumentRoot = trim(fgets(STDIN));
        echo "请输入顶级域名:";
        $ServerName = trim(fgets(STDIN));
        echo "请输入二级域名:";
        $ServerAlias = trim(fgets(STDIN));
        if(empty($DocumentRoot) or empty($ServerName)  or empty($ServerAlias)){
            die();
        }
        $config =[
            'DocumentRoot'=>$DocumentRoot, 'ServerName'=>$ServerName, 'ServerAlias'=>$ServerAlias,
            ];
        echo PrintTable::Print_table([$config]);
        $str = $this->template;
        foreach ($config as $key =>$item){
            $str =str_replace("{".$key."}",$item,$str);
        }
        $config_file = $this->isConfig($DocumentRoot);
        if ($config_file == false or empty($config_file)){
            $this->writeConfig($str,$ServerAlias);
        }
    }

    public function actionUpdate(){}

    public function actionDelete(){

    }


    /**
     * 获取当前操作系统是不是linux
     * @return bool
     */
    public static function isLinux(){
        $OsName = php_uname();
        if(strstr($OsName,'Windows')){
            return false;
        }elseif (strstr($OsName,'Linux') or strstr($OsName,'Ubuntu')) {
            return true;
        }
    }

    /**
     * 判断一个重定向的路径是否已经配置，已配置:返回文件名，否则返回fasle
     * @param $dir
     * @return array|bool|string
     */
    public  function isConfig($dir){
        $file = $this->file;
        //linux
        if(is_array($file)){
            $conf=[];
            foreach ($file as $item){
                $str = file_get_contents($item);
                if(strpos($str,"DocumentRoot \"".$dir."\"")){
                    $conf[]= $item;
                }
            }
            return  $conf;
        }else{
            //windows
            $str = file_get_contents($file);
            if(strpos($str,"DocumentRoot \"".$dir."\"")){
                return $file;
            }
        }
        return false;
    }

    /**
     * 将配置写入文件
     * @param $config_file
     * @param $str
     * @param $ServerAlias
     */
    public function writeConfig($str,$ServerAlias){
        if($this->uname =='Windows'){
            //追加配置
            file_put_contents($this->file,"\n\n".$str,FILE_APPEND);
            //追加机配置
            file_put_contents('C:/Windows/System32/drivers/etc/hosts',"\n"."127.0.0.1   ".$ServerAlias,FILE_APPEND);
        }elseif ($this->uname =='Ubuntu'){
            $file = $this->path['Ubuntu']."/sites-available/".$ServerAlias.".conf";
            if(file_exists($file)){
                //覆盖
                file_put_contents($file,"\n".$str);
            }else{
                //创建
                touch($file);
                //写入配置
                file_put_contents($file,"\n\n".$str,FILE_APPEND);
            }
        }
    }
}
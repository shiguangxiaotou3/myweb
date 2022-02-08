<?php


namespace common\components;

use Yii;
use yii\base\Component;
use abhimanyu\systemInfo\SystemInfo;

/**
 * Class ServerConfig
 * @package common\components
 */
class ServerConfig extends Component
{


    /**
     * @return array
     */
    public function config(){
        return array(
                //操作系统
                'Ox'=>php_uname('s'),
                //主机名称
                'HostName'=>php_uname('n'),
                //操作系统版本号
                'Version'=>php_uname('r'),
                //操作系统版本
                'VersionInformation'=>php_uname('v'),
                //cpu类型
                'MachineType'=>php_uname('m'),
        );
    }

    /**
     * @return abhimanyu\systemInfo\interfaces\InfoInterface|string|null
     */
    public  function Linux(){
            return SystemInfo::getInfo();
    }

    /**
     * 获取apache配置信息
     * @return array
     */
    public function Apache2(){
        return array(
            //版本
            'Version'=> apache_get_version(),
            //已安装的拓展
            'Modules'=>apache_get_modules(),
            //'env'=>apache_getenv(),
        );
    }

    /**
     * 获取框架依赖库
     * @return mixed
     */
    public function composer(){
        //读取composer配置文件
        $path =dirname(dirname(__DIR__))."/composer.json" ;
        //转化为数组
        return  json_decode(file_get_contents($path),true);
    }

    /**
     * 获取php配置信息
     * @return array
     */
    public function php(){
        return [
            //版本
            'Version'=> PHP_VERSION,
            //已安装的拓展
            'Extensions'=>get_loaded_extensions(),
            //'env'=>apache_getenv(),
        ];
    }

    /**
     * 获取mysql配置信息
     * @return array|false
     */
    public function mysql(){
        try {
            $com = Yii::$app->db;
            $dsn =$com->getSlave()->dsn;
            preg_match_all('#host=\S*?;#',$dsn,$host);
            $host=explode("=",$host[0][0])[1];
            preg_match_all('#dbname=\S*?$#',$dsn,$dbname);
            $dbname =explode("=",$dbname[0][0])[1];
            $res =$com->createCommand('show tables')->queryAll();
            return [
                'Host'=>$host,
                'Dbname'=>$dbname,
                'Type'=>$com->driverName,
                'Version'=>$com->getServerVersion(),
                'Tables'=>array_column($res,'Tables_in_'.$dbname),
            ];
        }catch (\Exception $exception){
            logObject($exception->getMessage());
            return false;
        }

    }

}
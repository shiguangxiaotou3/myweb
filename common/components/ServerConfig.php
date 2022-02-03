<?php


namespace common\components;


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
                'Ox'=>php_uname('s'),
                'HostName'=>php_uname('n'),
                'Version'=>php_uname('r'),
                'VersionInformation'=>php_uname('v'),
                'MachineType'=>php_uname('m'),
        );
    }

    public  function Linux(){
            return SystemInfo::getInfo();
    }

    public function Windows(){

    }

    public function Apache2(){
        return array(
            'Version'=> apache_get_version(),
            'Modules'=>apache_get_modules(),
            //'env'=>apache_getenv(),
        );
    }

    public function composer(){
        $path =dirname(dirname(__DIR__))."/composer.json" ;

        return  json_decode(file_get_contents($path),true);
    }

}
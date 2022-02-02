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

}
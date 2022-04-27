<?php


namespace common\components;

use AlibabaCloud\Client\AlibabaCloud;
use AlibabaCloud\Client\Exception\ClientException;
use AlibabaCloud\Client\Exception\ServerException;
use AlibabaCloud\Dysmsapi\Dysmsapi;
use yii\base\Component;

/**
 * Class Dysms
 * @property-read $client 连接对象
 * @package common\components
 */
class Dysms extends Component
{
    public  $accessKeyId  ='';
    public  $accessKeySecret  ='';
    //短信签名名称
    public $SignName ="元亨娱乐";
    //短信模板CODE
    public  $TemplateCode="SMS_174991330";
    public $TemplateParam="{code:{\$code}}";
    private $_Client;

    /**
     * 线程池
     * @throws ClientException
     */
    public  function createClient(){
        AlibabaCloud::accessKeyClient($this->accessKeyId, $this->accessKeySecret)
            ->regionId('cn-beijing')
            ->asDefaultClient();
    }

    /**
     * 发送短信
     * @param $phone
     * @param $code
     * @return array
     * @throws ClientException
     * @throws ServerException
     */
    public  function main($phone,$code){
        $client = $this->createClient();
        $request = Dysmsapi::v20170525()->sendSms();
        $result = $request
            ->withPhoneNumbers($phone)
            ->withSignName($this->SignName)
            ->withTemplateCode($this->TemplateCode)
            ->withTemplateParam("{code:".$code."}")
            ->debug(true) // Enable the debug will output detailed information
            ->connectTimeout(10) // Throw an exception when Connection timeout
            ->host("dysmsapi.aliyuncs.com")
            ->accept("application/json")
            ->timeout(10)
            ->request();
       return  $result->toArray();
    }

}

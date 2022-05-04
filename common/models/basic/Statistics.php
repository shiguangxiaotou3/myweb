<?php
namespace common\models\basic;

use AlibabaCloud\Client\AlibabaCloud;
use AlibabaCloud\Client\Exception\ClientException;
use AlibabaCloud\Client\Exception\ServerException;
use AlibabaCloud\Dysmsapi\Dysmsapi;

class Statistics
{

    public  $accessKeyId  ='LTAI4FfSwZDjYp7Psn1w2jbz';
    public  $accessKeySecret  ='pDO7yeJ1DaoMEJjWXxJB9lGYdzUCrw';
    //短信签名名称
    public $SignName ="元亨娱乐";
    //短信模板CODE
    public  $TemplateCode="SMS_174991330";
    public $TemplateParam="{code:{\$code}}";
    private $_Client;

    /**
     * @throws ClientException
     */
    public  function createClient(){
        AlibabaCloud::accessKeyClient($this->accessKeyId, $this->accessKeySecret )
            ->regionId('cn-hangzhou')
            ->asDefaultClient();
    }

    /**
     * 发送邮件
     * @param $phoneNumbers
     * @param $code
     * @return mixed|null
     * @throws ClientException
     * @throws ServerException
     */
    public  function send($phoneNumbers,$code){
        try {
            $this->createClient();
            $request = Dysmsapi::v20170525()->sendSms();
            $result = $request
                ->withPhoneNumbers($phoneNumbers)
                ->withSignName($this->SignName)
                ->withTemplateCode($this->TemplateCode)
                ->withTemplateParam("{code:".$code."}}")
                ->debug(true)               // Enable the debug will output detailed information
                ->connectTimeout(10)    // Throw an exception when Connection timeout
                ->timeout(10)
                ->host("dysmsapi.aliyuncs.com")
                ->accept("application/json")
                ->request();
            return($result->toArray());
        }catch (ClientException $exception) {
            echo $exception->getMessage() . PHP_EOL;
        } catch (ServerException $exception) {
            echo $exception->getMessage() . PHP_EOL;
            echo $exception->getErrorCode() . PHP_EOL;
            echo $exception->getRequestId() . PHP_EOL;
            echo $exception->getErrorMessage() . PHP_EOL;
        }

    }
}
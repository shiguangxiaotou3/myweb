<?php


namespace backend\models;

use AlibabaCloud\SDK\Dysmsapi\V20170525\Dysmsapi;
use Darabonba\OpenApi\Models\Config;
use AlibabaCloud\SDK\Dysmsapi\V20170525\Models\SendSmsRequest;
class Sample {
    const  accessKeyId ='LTAI4FfSwZDjYp7Psn1w2jbz';
    const  accessKeySecret ='pDO7yeJ1DaoMEJjWXxJB9lGYdzUCrw';

    /**
     * 使用AK&SK初始化账号Client
     * @param string $accessKeyId
     * @param string $accessKeySecret
     * @return Dysmsapi Client
     */
    public static function createClient(){
        $config = new Config([
            // 您的AccessKey ID
            "accessKeyId" => self::accessKeyId ,
            // 您的AccessKey Secret
            "accessKeySecret" => self::accessKeySecret,
        ]);
        // 访问的域名
        $config->endpoint = "dysmsapi.aliyuncs.com";
        return new Dysmsapi($config);
    }

    /**
     * @param $phoneNumbers
     * @param $code
     * @return \AlibabaCloud\SDK\Dysmsapi\V20170525\Models\SendSmsResponse
     */
    public static function main($phoneNumbers,$code){
        $client = self::createClient();
        $sendSmsRequest = new SendSmsRequest([
            "phoneNumbers" => $phoneNumbers,
            "signName" => "元亨娱乐",
            "templateCode" => "SMS_174991330",
            "templateParam" => "{code:".$code."}"
        ]);
        // 复制代码运行请自行打印 API 的返回值
        return $client->sendSms($sendSmsRequest);
    }

}
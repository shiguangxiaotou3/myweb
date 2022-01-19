<?php
namespace common\models\curl;
use yii\base\Model;
class Curl extends Model
{


    public function test($url,$cookie){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        //curl_setopt($ch, CURLOPT_HTTPHEADER, $this->header);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.71 Safari/537.36');
        curl_setopt ($ch, CURLOPT_HEADER, 1);
        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt ($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt ($ch, CURLOPT_TIMEOUT, 120);
       // curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie); // Cookie management.
        $content = curl_exec($ch);
        return $content;
    }


    /**
     * 下载网络中的资源文件
     * @param $url
     * @return false|string
     */
    public static function Download($url){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, TRUE);  //需要response header
        curl_setopt($ch, CURLOPT_NOBODY, FALSE);  //需要response body
        $response = curl_exec($ch);
        //分离header与body
        $header = '';
        $body = '';
        if (curl_getinfo($ch, CURLINFO_HTTP_CODE) == '200') {
            $headerSize = curl_getinfo($ch, CURLINFO_HEADER_SIZE); //头信息size
            $header = substr($response, 0, $headerSize);
            $body = substr($response, $headerSize);
            curl_close($ch);
            return $body;
        }else{

             return false;
        }

    }


    /**
     * 获取url中的参数
     * @param $url
     * @return array
     */
    public static function getUrl($url){
        //转小写
        $url = strtolower($url);
        //去掉请求参数
        $route = explode("?",$url)[0];
        $host = parse_url($url);
        $file = basename($host['path']);
        $dir = dirname($host['path']);
        return  array_merge($host,['file'=>$file,'dir'=>$dir]);
    }

}
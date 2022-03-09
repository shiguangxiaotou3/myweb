<?php
namespace common\components;

use yii\base\Component;

class Translate  extends Component
{
    const CURL_TIMEOUT = 2000;
    public $url = "https://openapi.youdao.com/api";
    public $app_key = '27bb082802437b82';                   //"您的应用ID"
    public $sec_key = '9gPGRT9Rfa7Yrtdpd6YJOjI3T8G0hwxD';   //"您的应用密钥"

    /**
     * @param string $q
     * @param string $from 源语言
     * @param string $to 目标语言
     * @return bool|mixed|string
     */
    public function do_request($q ,$from = 'en',$to ='zh-CHS')
    {
        $salt = $this->create_guid();
        $args = array(
            'q' => $q,
            'appKey' => $this->app_key,//$APP_KEY,
            'salt' => $salt,
        );
        $args['from'] = $from;
        $args['to'] = $to;
        $args['signType'] = 'v3';
        $curTime = strtotime("now");
        $args['curtime'] = $curTime;
        $signStr = $this->app_key . $this->truncate($q) . $salt . $curTime . $this-> sec_key;
        $args['sign'] = hash("sha256", $signStr);
        //$args['vocabId'] = '您的用户词表ID';
        return $this->call($this->url, $args);
    }

    /**
     * 发起网络请求
     * @param $url
     * @param null $args
     * @param string $method
     * @param int $timeout
     * @param array $headers
     * @return bool|mixed|string
     */
    public function call($url, $args = null, $method = "post",
         $timeout = self::CURL_TIMEOUT, $headers = array())
    {
        $ret = false;
        $i = 0;
        while ($ret === false) {
            if ($i > 1)
                break;
            if ($i > 0) {
                sleep(1);
            }
            $ret = $this->callOnce($url, $args, $method, false, $timeout, $headers);
            $i++;
        }
        return $ret;
    }

    /**
     * @param string $url
     * @param null $args
     * @param string $method
     * @param false $withCookie
     * @param int $timeout
     * @param array $headers
     * @return bool|string
     */
    public function callOnce($url, $args = null,
     $method = "post", $withCookie = false,
     $timeout = self::CURL_TIMEOUT, $headers = array())
    {
        $ch = curl_init();
        if ($method == "post") {
            $data = $this->convert($args);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_POST, 1);
        } else {
            $data = $this->convert($args);
            if ($data) {
                if (stripos($url, "?") > 0) {
                    $url .= "&$data";
                } else {
                    $url .= "?$data";
                }
            }
        }
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        if (!empty($headers)) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        }
        if ($withCookie) {
            curl_setopt($ch, CURLOPT_COOKIEJAR, $_COOKIE);
        }
        $r = curl_exec($ch);
        curl_close($ch);
        return $r;
    }

    /**
     * @param $args
     * @return string
     */
    public function convert(&$args)
    {
        $data = '';
        if (is_array($args)) {
            foreach ($args as $key => $val) {
                if (is_array($val)) {
                    foreach ($val as $k => $v) {
                        $data .= $key . '[' . $k . ']=' . rawurlencode($v) . '&';
                    }
                } else {
                    $data .= "$key=" . rawurlencode($val) . "&";
                }
            }
            return trim($data, "&");
        }
        return $args;
    }

    /**
     * uuid generator
     * @return string
     */
    public function create_guid()
    {
        $microTime = microtime();
        list($a_dec, $a_sec) = explode(" ", $microTime);
        $dec_hex = dechex($a_dec * 1000000);
        $sec_hex = dechex($a_sec);
        $this->ensure_length($dec_hex, 5);
        $this->ensure_length($sec_hex, 6);
        $guid = "";
        $guid .= $dec_hex;
        $guid .= $this->create_guid_section(3);
        $guid .= '-';
        $guid .= $this->create_guid_section(4);
        $guid .= '-';
        $guid .= $this->create_guid_section(4);
        $guid .= '-';
        $guid .= $this->create_guid_section(4);
        $guid .= '-';
        $guid .= $sec_hex;
        $guid .= $this->create_guid_section(6);
        return $guid;
    }

    /**
     * @param $characters
     * @return string
     */
    public function create_guid_section($characters)
    {
        $return = "";
        for ($i = 0; $i < $characters; $i++) {
            $return .= dechex(mt_rand(0, 15));
        }
        return $return;
    }

    /**
     * @param $q
     * @return string
     */
    public function truncate($q)
    {
        $len = $this->abslength($q);
        return $len <= 20 ? $q : (mb_substr($q, 0, 10) . $len . mb_substr($q, $len - 10, $len));
    }

    /**
     * @param $str
     * @return false|int
     */
    public function abslength($str)
    {
        if (empty($str)) {
            return 0;
        }
        if (function_exists('mb_strlen')) {
            return mb_strlen($str, 'utf-8');
        } else {
            preg_match_all("/./u", $str, $ar);
            return count($ar[0]);
        }
    }

    /**
     * @param $string
     * @param $length
     */
    public function ensure_length(&$string, $length){
        $str_len = strlen($string);
        if ($str_len < $length) {
            $string = str_pad($string, $length, "0");
        } else if ($str_len > $length) {
            $string = substr($string, 0, $length);
        }
    }

}



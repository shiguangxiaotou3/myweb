<?php



namespace common\models\tool;

use common\models\basicData\File;
use common\models\curl\Curl;
use Yii;
use yii\base\Model;
use yii\db\Exception;

/**
 * 自动下载网络资源包
 * @package common\models\tool
 */
class DownloadAssets extends Model
{


    public $savealias ='@runtime/download';

    /**
     * 下载某个网站的前端资源文件
     * @param string $host  域名
     * @param string $path  资源文件保存位置 注意:通过yii2:getAlias别名返回的绝对路径
     * @param string $array 要下载的资源文件数组
     * @return bool
     */
    public static function  DownloadAssets($host, $path,$array){
        if(is_array($array) and !empty($array)){
            $res = array();
            foreach ($array as $item) {
                //读取数据
                $data_srt = Curl::Download($host . $item);
                if($data_srt){
                    //获取路径信息
                    $data_path = Curl::getUrl($host . $item);
                    try {
                        //创建目录
                        File::CreateDir($path . $data_path['dir']);
                        //写入文件
                        File::CreateFile($path . $data_path['path'], $data_srt);
                        $res[$item]="下载成功";
                }catch ( Exception $exception){
                        $res[$item]= $exception->getMessage();
                        continue;
                    }
                }
            }
            return $res;
        }
    }


    /**
     * 打开一个网页，通过html获取其中的js css和图片
     * 并保存到本地
     * @param $url
     * @param $alias
     * @return bool
     */
    public function openDomainDownloadAssets($url){
        ignore_user_abort(); // 后台运行
        set_time_limit(0);
        $cong =parse_url(strtolower($url));
        $host = $cong['scheme']."://".$cong['host'];
        //读取网页类容
        $body = Curl::Download($url);
        if($body){
            $assetsUrls = self::getHtmlAssets($body);
            if($assetsUrls){
                $files =array();
                foreach ($assetsUrls as $assetsUrl){
                    $files=  array_merge($files,$assetsUrl);
                }
                logObject( self::DownloadAssets($host,Yii::getAlias($this->savealias),$files));
          }
        }
        return false;
    }


    /**
     * 获取html字符串中的资源路径
     * @param $htmlStr
     * @return array|false
     */
    public static function getHtmlAssets($htmlStr){
        $res = array();
        //获取js路径
        $j= preg_match_all('#<script[^>]*?src=\"([^ht{2}p][^>]*?\.js)\"[^>]*?>#', $htmlStr, $js);
        if($j >0){
            $res['js']=$js[1];
        }
        //获取js路径
        $c= preg_match_all('#<link[^>]*?href=\"([^ht{2}p][^>]*?\.css)\"[^>]*?>#', $htmlStr, $css);
        if($c >0){
            $res['css']= $css[1];
        }
        //获取图片路径
        $i=  preg_match_all('#<[img|IMG].*?[src|SRC]=[\'|\"](.*?(?:[\.gif|\.png|\.jpg|\.bmp|\.jpeg]))[\'|\"].*?[\/]?>#',$htmlStr,$img);
        if($i >0 ){
            $res['img']= $img[1];
        }
        if(empty($res)){
            return false;
        }else{
            return $res;
        }
    }

}
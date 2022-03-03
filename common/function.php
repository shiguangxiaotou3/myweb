<?php

/**
 * 全局可调用的自动定义函数
 */

/**
 * @param array $conf 被调用位置
 */
function dumpInfo($conf){
    $file =dirname(__DIR__)."/a.txt";
    $path =$conf[0]['file'];
    $line =$conf[0]['line'];
    unset($conf);
    $str ='/*=========================================start=========================================*\\'."\r\n";
    $str .='//调用文件:'.$path."\r\n";
    $str .='//调用行数:'." 第".$line."行被调用\r\n";
    $str .='//调用时间:'.date('Y-m-d h:m:s',time())."\r\n";
    $str .='/*=========================================data=========================================*\\'."\r\n";
    file_put_contents($file,"\r\n".$str,FILE_APPEND);
}

/**
 * 将字符串记录到日志中
 * @param $str
 */
function logStr($str){
    $file = dirname(__DIR__)."/a.txt";
    $s= '\*=========================================end data=========================================*/'."\r\n";
    $conf = debug_backtrace();
    dumpInfo($conf);
    file_put_contents($file,"\r\n".$str.$s,FILE_APPEND);
}

/**
 * 将对象记录到日志文件中
 * @param $obj
 */
function logObject($obj){
    $file = dirname(__DIR__)."/a.txt";
    $s='/*=========================================end data=========================================*\\'."\r\n";
    $conf = debug_backtrace();
    dumpInfo($conf);
    file_put_contents( $file, print_r($obj, true)."\r\n".$s,FILE_APPEND);
}

/**
 * 格式化输出数组
 * @param $res
 */
function dump($res){
    //$s= debug_backtrace();
    //echo $s."\n";
    echo "<pre>";
    print_r($res);
    echo "</pre>";
}

/**
 * 判断真假
 * @param $a
 */
function isTF($a){
    if($a){
        echo "真";
    }else{
        echo "假";
    }
    die();
}

/**
 * 获取二维数组的两个列，合并为新数组
 * @param string $classname 完整类名
 * @param string $key 作为键的字段
 * @param string|number $value 作为值的字段
 * @return array|false
 * @throws yii\base\InvalidConfigException
 */
function Array_key_value($classname,$key,$value){
    $ActiveRecord = Yii::createObject([
        'class'=>$classname,
    ]);
    $res = $ActiveRecord->find()->asarray()->all();
    $kesx = array_column($res,$key);
    $valuesx = array_column($res,$value);
    return  array_combine($kesx,$valuesx);
}

/**
 * 获取公网ip
 * @return mixed
 */
function getServerIp(){
    $externalContent = file_get_contents('http://checkip.dyndns.com/');
    preg_match('/Current IP Address: \[?([:.0-9a-fA-F]+)\]?/', $externalContent, $m);
    return $m[1];
}

/**
 * @param integer $number 第一年的初始值
 * @param float $growth_rate 年增长率
 * @param integer $year_number 第几年
 * @return float|int
 */
function getMoney($number,$growth_rate,$year_number){
    if($year_number <=0){
        return  0;
    }elseif ($year_number ==1){
        return $number;
    }elseif ($year_number== 2){
        return  $number * (1+$growth_rate);
    }else{
        return getMoney($number,$growth_rate,$year_number-1)*(1+$growth_rate);
    }

}

function deldir($dir) {
    //先删除目录下的文件：
    $dh = opendir($dir);
    while ($file = readdir($dh)) {
        if($file!="." && $file!="..") {
            if($file != '.gitignore'){
                $fullpath = $dir."/".$file;
                if(!is_dir($fullpath)) {
                    unlink($fullpath);
                } else {
                    deldir($fullpath);
                }
            }
        }
    }

}

/**
 * 向文件指定行插入数据
 * @param $file
 * @param $str
 * @param $number
 */
function addStrFile($file,$str,$number=0){
    $f= fopen($file,'r+');
    fseek($f,filesize($file)-$number);
    fwrite($f,$str."\r\n");
    fclose($f);
}


/**
 * 获取当前毫秒
 * @return string
 */
function getTime(){
    $s =time();
    $arr = explode(' ',microtime());
    return $s."-".intval($arr[0]*1000);

}

/**
 * 生成图表
 * @param $name
 * @return string
 */
function addFa($name){
    if(!empty($name)){
        return "<svg class='".$name."'><use xlink:href='#".$name."'></use></svg>";
    }
}


/**
 * 计算两个时间相隔，返回
 * [
 *      'year'=>2,      年
 *      'month'=>2,     月
 *      'day'=>2,       天
 *      'hour'=>2,      小时
 *      'minute'=>2,    分
 *      'second'=>2,    秒
 * ]
 * @param string|integer $startTime uinx
 * @param string|integer $endTime   uinx
 * @return array|bool
 * @throws Exception
 */
function sendTimeDiffer($startTime, $endTime){
    if(gettype($startTime) == 'integer'){
        $startTime = date('y-m-d h:i:s',$startTime);
    }
    if(gettype($endTime) == 'integer'){
        $endTime = date('y-m-d h:i:s',$endTime);
    }
    $start = new DateTime($startTime);
    $end = new DateTime($endTime);
    $res=[];
    $diff= $start->diff($end);
    $res['year']=$diff->format('%y');
    $res['month']=$diff->format('%m');
    $res['day']=$diff->format('%d');
    $res['hour']=$diff->format('%h');
    $res['minute']=$diff->format('%i');
    $res['second']=$diff->format('%s');
    return $res;
}

/**
 * 计算两个时间的最大间隔单位
 * @param $startTime
 * @param $endTime
 * @return false|string
 * @throws Exception
 */
function MaxDifferTime($startTime, $endTime){
    $data = SendTimeDiffer($startTime, $endTime);
    if($data){
        if($data['year'] >0){
            return $data['year']." 年";
        }elseif ($data['month'] >0){
            return $data['month']." 月";
        }elseif ($data['day'] >0){
            return $data['day']." 天";
        }elseif ($data['hour'] >0){
            return $data['hour']." 小时";
        }elseif ($data['minute'] >0){
            return $data['minute']." 分钟";
        }elseif ($data['second'] >0){
            return $data['second']." 秒";
        }
    }else{
        return false;
    }
}

/**
 * @param $content
 * @return string|string[]
 */
function htmtocode($content) {
    //$content = str_replace(" ", "", $content);
    $content = str_replace(array("\r\n", "\r", "\n"), "<br>", $content);
    return $content;
}

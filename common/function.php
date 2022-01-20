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
    $conf =debug_backtrace();
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
    $s= debug_backtrace();
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
 * @param $classname 完整类名
 * @param $key 作为键的字段
 * @param $value 作为值的字段
 * @return array|false
 * @throws \yii\base\InvalidConfigException
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
function getServerIp()
{
    $externalContent = file_get_contents('http://checkip.dyndns.com/');
    preg_match('/Current IP Address: \[?([:.0-9a-fA-F]+)\]?/', $externalContent, $m);
    $Ip = $m[1];
    return $Ip;
}

/**
 * 获取客户端ip
 * @return array|false|mixed|string
 */
function getClientIp()
{
    if (getenv('HTTP_CLIENT_IP')) {
        $ip = getenv('HTTP_CLIENT_IP');
    } else if (getenv('HTTP_X_FORWARDED_FOR')) {
        $ip = getenv('HTTP_X_FORWARDED_FOR');
    } else if (getenv('REMOTE_ADDR')) {
        $ip = getenv('REMOTE_ADDR');
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

/**
 * 发送POST请求文件或数据
 * @param string $url
 * @param string $param
 * @return bool|string
 */
function request_post($url = '', $param = ''){
    if (empty($url) || empty($param)) {
        return false;
    }
    $postUrl = $url;
    $curlPost = $param;
    // 初始化curl
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $postUrl);
    curl_setopt($curl, CURLOPT_HEADER, 0);
    // 要求结果为字符串且输出到屏幕上
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    // post提交方式
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $curlPost);
    // 运行curl
    $data = curl_exec($curl);
    curl_close($curl);
    return $data;
}

/**
 * 百度云图像识别接口
 * @param $filename
 * @return mixed
 */
function getUrl($filename){
    $token = "24.f9b2499ab740c5edb02f91f68392ed43.2592000.1619282334.282335-23867846";
    //异步
    $url = 'https://aip.baidubce.com/rest/2.0/solution/v1/form_ocr/request?access_token='.$token;
    //同步
    //$url = 'https://aip.baidubce.com/rest/2.0/ocr/v1/form?access_token=' . $token;
    //将文件进行base64编码
    $img = file_get_contents($filename);
    $img = base64_encode($img);
    //构造POST参数
    $bodys = array(
        'image' => $img,
        'is_sync' => 'true',
        "request_type"=>'excel'
    );
    //发送Post请求
    $res = request_post($url, $bodys);
    //解析返回结果
    $arr = json_decode($res,true);
    return $arr;
}

/**
 * 获取模型字段注释
 * @param $model \yii\db\ActiveRecord
 * @param $field 字段
 * @return string
 */
function getModelFileComment($model,$field){
    $arr = $model->getTableSchema()->columns;
    return \yii\helpers\ArrayHelper::getValue($arr,$field.".comment");
}

/**
 * @param $number 第一年的初始值
 * @param $growth_rate 年增长率
 * @param $year_number 第几年
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

/**
 * 折现图配置文件
 * @param string $title
 * @param integer $height
 * @param array $xAxis
 * @param array $series
 * @return array
 */
function ECharts_line_config($title,$height,$xAxis,$series){
    $config =[
        'responsive' => true,
        'options' => [
            'style' => "height: ".$height."px;"
        ],
        'pluginOptions' => [
            'option' => [
                'title' => [
                    'text' => $title
                ],
                'tooltip' => [
                    'trigger' => 'axis'
                ],
                'legend' => [
                    'data' => "",
                ],
                'grid' => [
                    'left' => '3%',
                    'right' => '3%',
                    'bottom' => '3%',
                    'containLabel' => true
                ],
                'toolbox' => [
                    'feature' => [
                        'saveAsImage' => []
                    ]
                ],
                //x轴
                'xAxis' =>[
                    'name' => '年',
                    'type' => 'category',
                    'boundaryGap' => false,
                    'data' =>$xAxis,
                ],
                'yAxis' => [
                    'type' => 'value'
                ],
                //系列
                'series' =>$series,
            ],
        ],
    ];
    return $config;
}

/**
 * 条形图配置文件
 * @param string $title 标题
 * @param int $height 高度
 * @param array $legend 系列
 * @param array $xAxis 坐标走x
 * @param array $series 数据
 * @return array
 */
function ECharts_bar_config($title,$height,$legend,$xAxis,$series){
    $config =[
        'responsive' => true,
        'options' => [
            'style' => "height:".$height."px;"
        ],
        'pluginOptions' => [
            'option' => [
                'title' => [
                    'text' => $title
                ],
                'tooltip' => [
                    'trigger' => 'axis'
                ],
                'legend' => [
                    'data' => $legend,
                ],
                'grid' => [
                    'left' => '3%',
                    'right' => '3%',
                    'bottom' => '3%',
                    'containLabel' => true
                ],
                //x轴
                'xAxis' =>[
                    ['data' =>$xAxis],
                ],
                'yAxis' => [
                    'type' => 'value'
                ],
                //系列
                'series' =>$series,
            ],
        ],
    ];
    return $config;
}

function deldir($dir) {
    //先删除目录下的文件：
    $dh=opendir($dir);
    while ($file=readdir($dh)) {
        if($file!="." && $file!="..") {
            $fullpath=$dir."/".$file;
            if(!is_dir($fullpath)) {
                unlink($fullpath);
            } else {
                deldir($fullpath);
            }
        }
    }
}

//去除二维数组重复值,默认重复保留前面的值
/*
  *array 二维数组
  *keyid 需要判断是否重复的项目
  *desc 为true时保留后面的
*/

function array_repeat($array,$keyid="id",$desc=false)
{
    $array = array_values($array);
    //倒叙排列数
    if($desc)
    {
        $array = array_rsort($array,true);
    }

    //提取需要判断的项目变成一维数组
    $a = array_tq($array,$keyid);

    //去除一维数组重复值
    $a = array_unique($a);
    //提取二维数组项目值
    foreach($array[0] AS $key=>$value)
    {
        $akey[] = $key;
    }
    //重新拼接二维数组
    foreach($akey AS $key=>$value)
    {
        $b = array_tq($array,$value);
        foreach($a AS $key2=>$value2)
        {
            $c[$key2][$value] = $b[$key2];
        }
    }

    if($desc)
    {
        $c = array_rsort($c,true);
    }
    return $c;
}

//数组倒叙
function array_rsort($arr,$isvalues=false)
{
    if(is_array($arr)){
        $flag = false;
        //一维数组
        if(count($arr) == count($arr,1)){
            $flag = true;
            $i = 0;
            //转换成二维数组
            foreach($arr AS $key=>$value){
                $a[$i]["okey"] = $key;
                $a[$i]["value"] = $value;
                $i++;
            }
            $arr = $a;
        }
        //多维数组
        else
        {
            //添加临时key值
            foreach($arr AS $key=>$value){
                $value["okey"] = $key;
                $array[] = $value;
            }
            $arr = $array;
        }

        //倒叙并还原key值
        $count = count($arr)-1;
        for($i=0;$i<count($arr);$i++){
            $b[$arr[$count]["okey"]] = $arr[$count];
            $count--;
        }

        //重构一维数组
        if($flag == true){
            foreach($b AS $key=>$value){
                if($isvalues){
                    $c[] = $value["value"];
                }else{
                    $c[$value["okey"]] = $value["value"];
                }
            }
        }
        //多维数组去除临时key值
        else
        {
            foreach($b AS $key=>$value)  {
                unset($value["okey"]);
                if($isvalues){
                    $c[] = $value;
                }else{
                    $c[$key] = $value;
                }
            }
        }
        return $c;
    }
}

//提取二维数组项目
function array_tq($array,$aval="")
{
    foreach($array AS $key=>$value)
    {
        $result[] = $value[$aval];
    }
    return $result;
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
 * 计算两个时间相隔，年月入
 * @param string|integer $starttiem
 * @param string|integer $endtime
 * @return array
 * @throws Exception
 */
function SendTimeDiffer($starttiem,$endtime){
    try {
        if(gettype($starttiem) == 'integer'){
            $starttiem = date('y-m-d h:i:s',$starttiem);
        }
        if(gettype($endtime) == 'integer'){
            $endtime = date('y-m-d h:i:s',$endtime);
        }
        $start = new DateTime($starttiem);
        $end = new DateTime($endtime);
        $res=[];
        $diff= $start->diff($end);
        $res['year']=$diff->format('%y');
        $res['month']=$diff->format('%m');
        $res['day']=$diff->format('%d');
        $res['hour']=$diff->format('%h');
        $res['minute']=$diff->format('%i');
        $res['second']=$diff->format('%s');
        return $res;
    }catch (Exception $e){
        return false;
    }

}

/**
 * 计算两个时间的最大间隔单位
 * @param $starttiem
 * @param $endtime
 * @return false|string
 * @throws Exception
 */
function MaxDifferTime($starttiem,$endtime){
    $data = SendTimeDiffer($starttiem,$endtime);
    if($data){
        if($data['year'] >0){
            return $data['year']."年";
        }elseif ($data['month'] >0){
            return $data['month']."月";
        }elseif ($data['day'] >0){
            return $data['day']."天";
        }elseif ($data['hour'] >0){
            return $data['hour']."小时";
        }elseif ($data['minute'] >0){
            return $data['minute']."分钟";
        }elseif ($data['second'] >0){
            return $data['second']."秒";
        }
    }else{
        return false;
    }




}
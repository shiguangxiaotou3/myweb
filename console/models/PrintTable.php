<?php


namespace console\models;


/**
 * 控制台输入二维数组
 * Class PrintTable
 * @package common\models\tool
 */
class PrintTable{

    /**
     * 计算中文个数
     * @param string $str
     * @return mixed
     */
    private static function getStrLen(string $str){
      return  (strlen($str)- mb_strlen($str))/2;
    }

    /**
     * 计算字符串的字节数
     * @param $str
     * @return bool|false|int|mixed
     */
    private static function getStrByteNumber($str){
       return  mb_strlen($str) + self::getStrLen($str);
    }

    /**
     * 计算数组的最大长度
     * @param $arr
     * @return array
     */
    private static function columnMaxStrLen($arr){
        $keys = array_keys($arr[0]);
        //计算数组的key的长度
        $number_arr=[];
        foreach ($keys as $key){
            $number_arr[] = self::getStrByteNumber($key);
        }
        //计算数组的值长度
        $i=0;
        foreach ($keys as $key){
            $column = array_column($arr ,$key);
            foreach ( $column as $value){
                $str = (string) $value;
                //字符串字节数
                $strNumber =self::getStrByteNumber($str);
                if($number_arr[$i] < $strNumber ){
                    $number_arr[$i] =   $strNumber;
                }
            }
            $i++;
        }
        return $number_arr;
    }

    /**
     * 将一个字符拼接多次
     * @param $int
     * @param string $str
     * @return string
     */
    private static function dump_number($int ,$str ='-'){
        $res ='';
        for ($i=1;$i<=$int;$i++){
            $res .=$str;
        }
        return $res;
    }

    /**
     * 构造分割线
     * @param $maxLens
     * @return string
     */
    private static function intervalStr($maxLens){
        $str ='';
        foreach ($maxLens as $value){
            $str .="+".self::dump_number($value+2 ,'-');
        }
        return $str."-+";
    }

    /**
     * 拼接二维数组的一行
     * @param $maxLens
     * @param $row
     * @return string
     */
    private static function Print_row($maxLens,$row){
        $str ='';
        $i=0;
        foreach ($row as $value){
            $field =  (string) $value;
            $str .="| ". $field;
            //拼接空格
            $str .= self::dump_number($maxLens[$i] +1 - self::getStrByteNumber($field)," ") ;
            $i++;
        }
        return $str." |";
    }

    /**
     * 打印数组
     * @param $arr
     * @param string $str
     * @return string
     */
    public static function Print_table($arr,$str = "\n"){
        //每一列的字符最大字符串长度
        $maxLens = self::columnMaxStrLen($arr);
        //分割线
        $intervalStr = self::intervalStr($maxLens);
        //打印字段
        $fieldStr = self::Print_row($maxLens,array_keys($arr[0]));
        $res = $intervalStr.$str;
        $res .=$fieldStr;
        foreach ($arr as $item){
            $res .= $str.$intervalStr.$str.self::Print_row($maxLens,$item);
        }
        return  $res.$str.$intervalStr.$str;
    }
}
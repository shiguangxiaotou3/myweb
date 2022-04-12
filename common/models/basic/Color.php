<?php
namespace common\models\basic;

class Color
{
    const COLOR_PRIMARY = 'primary';
    const COLOR_SECONDARY = 'secondary';
    const COLOR_SUCCESS = 'success';
    const COLOR_DANGER =  'danger';
    const COLOR_WARING = 'warning';
    const COLOR_INFO = 'info';
    const COLOR_LIGHT = 'light';
    const COLOR_DARK ='dark';
    const COLOR_WHITE ='white';

    /**
     * 返回随机颜色名称
     * @return string
     */
    public static function randomColor(){
        $color =['primary','secondary', 'success','danger','warning','info','light','dark'];
        return $color[rand(0,count($color)-1)];
    }

    /**
     * @return string
     */
    public static function randomSize(){
        $size =['xs','sm','md','lg'];
        return $size[rand(0,count($size)-1)];
    }

}
<?php
namespace common\models\basic;

class Color
{
    const COLOR_BLUE = 'blue';
    const COLOR_INDIGO = 'indigo';
    const COLOR_PURPLE = 'purple';
    const COLOR_PINK = 'pink';
    const COLOR_RED = 'red';
    const COLOR_ORANGE = 'orange';
    const COLOR_YELLOW = 'yellow';
    const COLOR_GREEN = 'green';
    const COLOR_TEAL = 'teal';
    const COLOR_CYAN = 'cyan';
    const COLOR_WHITE = 'white';
    const COLOR_GRAY = 'gray';
    const COLOR_GRAY_DARK =  'gray-dark';
    const COLOR_PRIMARY = 'primary';
    const COLOR_SECONDARY = 'secondary';
    const COLOR_SUCCESS = 'success';
    const COLOR_INFO = 'info';
    const COLOR_WARING = 'warning';
    const COLOR_DANGER =  'danger';
    const COLOR_LIGHT = 'light';
    const COLOR_DARK ='dark';

    /**
     * 返回随机颜色名称
     * @return string
     */
    public static function randomColor(){
        $color =['blue','indigo','purple','pink','red','orange','yellow', 'green',
            'teal','cyan','white','gray','gray-dark','primary','secondary',
            'success','info','warning','danger','light','dark'];
        return $color[rand(0,count($color)-1)];
    }

    /**
     * @return string
     */
    public static function randomSize(){
        $size =['xs','sm','','lg'];
        return $size[rand(0,count($size)-1)];
    }

}
<?php
namespace common\widgets\tag;



use yii\bootstrap\Widget;
use yii\helpers\Html;

class TagWidget extends Widget
{


    const BADGE_PRIMARY = 'primary text-white';
    const BADGE_SECONDARY = 'secondary text-white';
    const BADGE_SUCCESS = 'success text-white';
    const BADGE_DANGER =  'danger text-white';
    const BADGE_WARING = 'warning text-dark';
    const BADGE_INFO = 'info text-dark';
    const BADGE_LIGHT = 'light text-dark';
    const BADGE_DARK ='dark text-white' ;
    const BADGE_WHITE ='white text-dark';
    /**
     * 随机颜色
     * @return string
     */
    public static function randomBg(){
        $bgs =['primary text-white','secondary text-white',
            'success text-white', 'danger text-white',
            'warning text-dark','info text-dark',
            'light text-dark','dark text-white',
            'white text-dark'];
        return ' bg-'.$bgs[rand(0,count($bgs)-1)];
    }
}
<?php

namespace common\modules\file;

/**
 * File module definition class
 */
class File extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'common\modules\file\controllers';
    public $layout ='main';
    public $defaultRoute ='index';
    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}

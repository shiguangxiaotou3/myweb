<?php

namespace common\modules\dns;

/**
 * dns module definition class
 */
class Dns extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'common\modules\dns\controllers';

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

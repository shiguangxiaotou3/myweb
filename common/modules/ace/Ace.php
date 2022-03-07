<?php

namespace common\modules\ace;

/**
 * ace module definition class
 */
class Ace extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'common\modules\ace\controllers';

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

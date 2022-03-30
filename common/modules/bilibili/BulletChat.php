<?php

namespace common\modules\bilibili;

/**
 * BulletChat module definition class
 */
class BulletChat extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'common\modules\bilibili\controllers';

    /**
     * {@inheritdoc}
     */
    public $defaultRoute='index';
    /**
     * {@inheritdoc}
     */
    public $basePath ='common\modules\bilibili';
    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}

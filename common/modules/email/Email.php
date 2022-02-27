<?php

namespace common\modules\email;

use yii\base\Module;

/**
 * Class Email
 * @package common\modules\email
 */
class Email extends Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'common\modules\email\controllers';

    /**
     * {@inheritdoc}
     */
    public $basePath ='common\modules\email';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}

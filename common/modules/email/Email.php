<?php

namespace common\modules\email;

use common\modules\email\components\Imap;

/**
 * Class Email
 * @property-read Imap $imap
 * @package common\modules\email
 */
class Email extends \yii\base\Module
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

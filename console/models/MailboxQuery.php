<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[\common\modules\models\Mailbox]].
 *
 * @see \common\modules\models\Mailbox
 */
class MailboxQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \common\modules\models\Mailbox[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\modules\models\Mailbox|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}

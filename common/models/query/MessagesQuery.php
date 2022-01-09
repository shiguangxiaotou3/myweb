<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[\common\models\ar\Messages]].
 *
 * @see \common\models\ar\Messages
 */
class MessagesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \common\models\ar\Messages[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\ar\Messages|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}

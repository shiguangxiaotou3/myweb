<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[\common\models\ar\Login_record]].
 *
 * @see \common\models\ar\Login_record
 */
class Login_recordQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \common\models\ar\Login_record[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\ar\Login_record|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}

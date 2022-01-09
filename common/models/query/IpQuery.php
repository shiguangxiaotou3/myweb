<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[\common\models\ar\Ip]].
 *
 * @see \common\models\ar\Ip
 */
class IpQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \common\models\ar\Ip[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\ar\Ip|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}

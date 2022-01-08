<?php

namespace api\models\query;

/**
 * This is the ActiveQuery class for [[\api\models\ar\Module]].
 *
 * @see \api\models\ar\Module
 */
class ModuleQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \api\models\ar\Module[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \api\models\ar\Module|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}

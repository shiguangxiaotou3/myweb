<?php

use yii\db\Migration;

/**
 * Class m211223_160257_add_column_for_user
 */
class m211223_160257_add_column_for_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m211223_160257_add_column_for_user cannot be reverted.\n";

        return false;
    }


    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->addColumn('{{%user}}',
            'user_type',
            \yii\db\Schema::TYPE_STRING.'(20) COMMENT "用户类型"');
    }

    public function down()
    {
        echo "m211223_160257_add_column_for_user cannot be reverted.\n";

        return false;
    }

}

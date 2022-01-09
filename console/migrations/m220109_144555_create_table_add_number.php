<?php

use yii\db\Migration;

/**
 * Class m220109_144555_create_table_add_number
 */
class m220109_144555_create_table_add_number extends Migration
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
        echo "m220109_144555_create_table_add_number cannot be reverted.\n";

        return false;
    }


    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
         $this->addColumn('{{%ip}}',
            'visits',
            \yii\db\Schema::TYPE_INTEGER.'(11) COMMENT "访问量"');
    }

    public function down()
    {
        echo "m220109_144555_create_table_add_number cannot be reverted.\n";

        return false;
    }

}

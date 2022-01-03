<?php

use yii\db\Migration;

/**
 * Class m220102_152707_delete_table_vbacode
 */
class m220102_152707_delete_table_vbacode extends Migration
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
        echo "m220102_152707_delete_table_vbacode cannot be reverted.\n";

        return false;
    }


    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
         $this->dropTable('{{%vbacode}}');
    }

    public function down()
    {
        echo "m220102_152707_delete_table_vbacode cannot be reverted.\n";

        return false;
    }

}

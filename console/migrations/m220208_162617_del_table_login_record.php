<?php

use yii\db\Migration;

/**
 * Class m220208_162617_del_table_login_record
 */
class m220208_162617_del_table_login_record extends Migration
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
        echo "m220208_162617_del_table_login_record cannot be reverted.\n";

        return false;
    }


    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->dropTable('{{%login_record}}');
    }

    public function down()
    {
        echo "m220208_162617_del_table_login_record cannot be reverted.\n";

        return false;
    }

}

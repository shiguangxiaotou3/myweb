<?php

use yii\db\Migration;

/**
 * Class m211223_163308_deletc_table_vbaUser
 */
class m211223_163308_deletc_table_vbaUser extends Migration
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

        echo "m211223_163308_deletc_table_vbaUser cannot be reverted.\n";

        return false;
    }


    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->dropTable('{{%vbauser}}');
    }

    public function down()
    {
        echo "m211223_163308_deletc_table_vbaUser cannot be reverted.\n";

        return false;
    }

}

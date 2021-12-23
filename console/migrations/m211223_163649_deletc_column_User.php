<?php

use yii\db\Migration;

/**
 * Class m211223_163649_deletc_column_User
 */
class m211223_163649_deletc_column_User extends Migration
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
        echo "m211223_163649_deletc_column_User cannot be reverted.\n";

        return false;
    }


    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->dropColumn('{{%user}}', 'user_type');
    }

    public function down()
    {
        echo "m211223_163649_deletc_column_User cannot be reverted.\n";

        return false;
    }

}

<?php

use yii\db\Migration;

/**
 * Class m220102_161354_addcolumn_by_user
 */
use \yii\db\mysql\Schema;
class m220102_161354_addcolumn_by_user extends Migration
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
        echo "m220102_161354_addcolumn_by_user cannot be reverted.\n";

        return false;
    }


    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->addColumn('{{%user}}',
            'token',
            Schema::TYPE_STRING . '(200) DEFAULT "" COMMENT "token"');
    }

    public function down()
    {
        echo "m220102_161354_addcolumn_by_user cannot be reverted.\n";

        return false;
    }

}

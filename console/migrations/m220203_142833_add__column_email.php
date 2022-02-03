<?php

use yii\db\Migration;

/**
 * Class m220203_142833_add__column_email
 */
class m220203_142833_add__column_email extends Migration
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
        echo "m220203_142833_add__column_email cannot be reverted.\n";

        return false;
    }


    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->addColumn('{{%email}}',
            'lable',
            \yii\db\Schema::TYPE_INTEGER.'(2) COMMENT "标签"');
    }

    public function down()
    {
        echo "m220203_142833_add__column_email cannot be reverted.\n";

        return false;
    }

}

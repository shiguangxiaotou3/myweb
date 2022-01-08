<?php

use yii\db\Migration;

/**
 * Class m220106_151216_add_user_column_by_user
 */
class m220106_151216_add_user_column_by_user extends Migration
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
        echo "m220106_151216_add_user_column_by_user cannot be reverted.\n";

        return false;
    }


    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->addColumn('{{%user}}',
            'allowance',
            \yii\db\Schema::TYPE_INTEGER.'(10) COMMENT "剩余请求数"');
        $this->addColumn('{{%user}}',
            'allowance_update_at',
            \yii\db\Schema::TYPE_INTEGER.'(10) COMMENT "最后一起请求时间"');
    }

    public function down()
    {
        echo "添加速率请求字段成功.\n";

        return false;
    }

}

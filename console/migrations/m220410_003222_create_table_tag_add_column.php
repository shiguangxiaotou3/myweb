<?php

use yii\db\Migration;

/**
 * Class m220410_003222_create_table_tag_add_column
 */
class m220410_003222_create_table_tag_add_column extends Migration
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
        echo "m220410_003222_create_table_tag_add_column cannot be reverted.\n";

        return false;
    }


    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
          $this->addColumn('{{%tag}}',
            'describe',
            \yii\db\Schema::TYPE_STRING.'(255)  COMMENT "描述"');
    }

    public function down()
    {
        echo "m220410_003222_create_table_tag_add_column cannot be reverted.\n";

        return false;
    }

}

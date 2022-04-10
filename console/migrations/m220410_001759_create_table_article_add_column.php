<?php

use yii\db\Migration;

/**
 * Class m220410_001759_create_table_article_add_column
 */
class m220410_001759_create_table_article_add_column extends Migration
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
        echo "m220410_001759_create_table_article_add_column cannot be reverted.\n";

        return false;
    }


    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

        $this->addColumn('{{%article}}',
            'fabulous',
            \yii\db\Schema::TYPE_INTEGER.'(5)  COMMENT "点赞"');
    }

    public function down()
    {
        echo "m220410_001759_create_table_article_add_column cannot be reverted.\n";

        return false;
    }

}

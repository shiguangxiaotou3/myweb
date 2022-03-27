<?php

use yii\db\Migration;

/**
 * Class m220326_111607_create_table_acticle_addfrist
 */
class m220326_111607_create_table_acticle_addfrist extends Migration
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
        echo "m220326_111607_create_table_acticle_addfrist cannot be reverted.\n";

        return false;
    }


    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->addColumn('{{%article}}',
            'classification',
            \yii\db\Schema::TYPE_STRING.'(10) COMMENT "分类"');
        $this->addColumn('{{%article}}',
            'visits',
            \yii\db\Schema::TYPE_INTEGER.' COMMENT "访问量"');
    }

    public function down()
    {
        echo "m220326_111607_create_table_acticle_addfrist cannot be reverted.\n";

        return false;
    }

}

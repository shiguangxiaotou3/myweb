<?php

use yii\db\Migration;

/**
 * Class m220410_104148_create_table_comment
 */
class m220410_104148_create_table_comment extends Migration
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
        echo "m220410_104148_create_table_comment cannot be reverted.\n";

        return false;
    }


    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
         $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
         $this->createTable('{{%comment}}', [
            'id' => $this->primaryKey(),
            'article_id'=>$this->integer()->comment('文章id'),
            'user_id'=>$this->integer()->comment('用户id'),
            'message'=>$this->string()->comment('消息'),
            'message_id'=>$this->integer()->comment('消息id'),
            'status'=>$this->boolean()->comment('是否已读'),
            'created_at' => $this->integer()->notNull()->comment('创建时间'),
            'updated_at' => $this->integer()->notNull()->comment('修改时间'),
        ], $tableOptions);
    }

    public function down()
    {
        echo "m220410_104148_create_table_comment cannot be reverted.\n";

        return false;
    }

}

<?php

use yii\db\Migration;

/**
 * Class m220109_094916_create_table_message
 */
class m220109_094916_create_table_message extends Migration
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
        echo "m220109_094916_create_table_message cannot be reverted.\n";

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

        $this->createTable('{{%messages}}', [
            'id' => $this->primaryKey(),
            'send_user_id'=>$this->integer(5)->notNull()->comment('发送用户'),
            'receive_user_id'=>$this->integer(5)->notNull()->comment('接收用户'),
            'messages'=>$this->string(255)->notNull()->comment('消息'),
            'status' => $this->smallInteger()->notNull()->defaultValue(0),
            'created_at' => $this->integer()->notNull()->comment('创建时间'),
            'updated_at' => $this->integer()->notNull()->comment('修改时间'),
        ], $tableOptions);
    }

    public function down()
    {
        echo "m220109_094916_create_table_message cannot be reverted.\n";

        return false;
    }
}

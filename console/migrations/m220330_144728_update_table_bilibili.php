<?php

use yii\db\Migration;

/**
 * Class m220330_144728_update_table_bilibili
 */
class m220330_144728_update_table_bilibili extends Migration
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
        echo "m220330_144728_update_table_bilibili cannot be reverted.\n";

        return false;
    }


    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->dropTable('{{%bilibili}}');

         $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
         $this->createTable('{{%bilibili}}', [
            'id' => $this->primaryKey(),
            'roomId'=>$this->integer()->comment('房间id'),
            'unix'=>$this->integer()->comment('发送时间戳'),
            'user_id'=>$this->integer()->comment('用户id'),
            'username'=>$this->string()->comment('用户明'),
            'message'=>$this->string()->comment('消息'),
            'status'=>$this->boolean()->defaultValue(0)->comment('是否已读'),
            'created_at' => $this->integer()->notNull()->comment('创建时间'),
            'updated_at' => $this->integer()->notNull()->comment('修改时间'),
        ], $tableOptions);
    }

    public function down()
    {
        echo "m220330_144728_update_table_bilibili cannot be reverted.\n";

        return false;
    }

}

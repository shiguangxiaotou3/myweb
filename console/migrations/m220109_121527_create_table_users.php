<?php

use yii\db\Migration;

/**
 * Class m220109_121527_create_table_users
 */
class m220109_121527_create_table_users extends Migration
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
        echo "m220109_121527_create_table_users cannot be reverted.\n";

        return false;
    }


    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->dropColumn('{{%ip}}', 'user_id');
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%login_record}}', [
            'id' => $this->primaryKey(),
            'ip' => $this->string()->comment('ip地质'),
            'user_id'=>$this->integer(5)->notNull()->comment('用户'),
            'created_at' => $this->integer()->comment('创建时间'),
            'updated_at' => $this->integer()->comment('修改时间'),
        ], $tableOptions);
    }

    public function down()
    {
        echo "删除IP表user_id字段,新建用户登陆表.\n";

        return false;
    }

}

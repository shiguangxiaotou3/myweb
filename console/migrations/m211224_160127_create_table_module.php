<?php

use yii\db\Migration;

/**
 * Class m211224_160127_create_table_module
 */
class m211224_160127_create_table_module extends Migration
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
        echo "m211224_160127_create_table_module cannot be reverted.\n";

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

        $this->createTable('{{%module}}', [
            'id' => $this->primaryKey(),
            'user_id'=>$this->integer(5)->notNull()->comment('用户id'),
            'name' => $this->string(20)->comment('名称'),
            'type' => $this->integer(1)->defaultValue(1)->comment('类型'),
            'keyword'=>$this->string()->comment('关键字'),
            'describe' => $this->string()->notNull()->comment('描述'),
            'inherit' => $this->string(255)->comment('继承'),
            'created_at' => $this->integer()->notNull()->comment('创建时间'),
            'updated_at' => $this->integer()->notNull()->comment('修改时间'),
        ], $tableOptions);
    }

    public function down()
    {
        echo "m211224_160127_create_table_module cannot be reverted.\n";

        return false;
    }

}

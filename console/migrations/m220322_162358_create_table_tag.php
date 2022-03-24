<?php

use yii\db\Migration;

/**
 * Class m220322_162358_create_table_tag
 */
class m220322_162358_create_table_tag extends Migration
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
        echo "m220322_162358_create_table_tag cannot be reverted.\n";

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

        $this->createTable('{{%article}}', [
            'id' => $this->primaryKey(),
            'user_id'=>$this->integer(5)->notNull()->comment('模块id'),
            'label'=>$this->string()->notNull()->comment('标签'),
            'title' => $this->string(255)->comment('标题'),
            'content'=>$this->text()->comment('类容'),
            'status' => $this->boolean()->comment('可见'),
            'created_at' => $this->integer()->notNull()->comment('创建时间'),
            'updated_at' => $this->integer()->notNull()->comment('修改时间'),
        ], $tableOptions);

    }

    public function down(){
        echo "m220322_162358_create_table_tag cannot be reverted.\n";
        return false;
    }

}

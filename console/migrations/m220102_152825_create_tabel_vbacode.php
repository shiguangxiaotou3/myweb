<?php

use yii\db\Migration;

/**
 * Class m220102_152825_create_tabel_vbacode
 */
class m220102_152825_create_tabel_vbacode extends Migration
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
        echo "m220102_152825_create_tabel_vbacode cannot be reverted.\n";

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

        $this->createTable('{{%vbacode}}', [
            'id' => $this->primaryKey(),
            'module_id'=>$this->integer(5)->notNull()->comment('模块id'),
            'name' => $this->string(20)->notNull()->comment('名称'),
            'code'=>$this->text()->notNull()->comment('代码'),
            'describe' => $this->string()->comment('描述'),
            'created_at' => $this->integer()->notNull()->comment('创建时间'),
            'updated_at' => $this->integer()->notNull()->comment('修改时间'),
        ], $tableOptions);
    }

    public function down()
    {
        echo "m220102_152825_create_tabel_vbacode cannot be reverted.\n";
        return false;
    }

}

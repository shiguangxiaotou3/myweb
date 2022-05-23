<?php

use yii\db\Migration;

/**
 * Class m220523_143127_create_tabel_steel
 */
class m220523_143127_create_tabel_steel extends Migration
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
        echo "m220523_143127_create_tabel_steel cannot be reverted.\n";

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
                 $this->createTable('{{%steel}}', [
                    'id' => $this->primaryKey(),
                    'city'=>$this->string()->comment('城市'),
                     'type'=>$this->string()->comment('材料名称'),
                    "time"=>$this->integer()->comment('发布时间'),
                    "titer"=>$this->string()->comment('标题'),
                    'created_at' => $this->integer()->notNull()->comment('创建时间'),
                    'updated_at' => $this->integer()->notNull()->comment('修改时间'),
                ], $tableOptions);
    }

    public function down()
    {
        echo "m220523_143127_create_tabel_steel cannot be reverted.\n";

        return false;
    }

}

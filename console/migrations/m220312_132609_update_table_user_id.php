<?php

use yii\db\Migration;

/**
 * Class m220312_132609_update_table_user_id
 */
class m220312_132609_update_table_user_id extends Migration
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
        echo "m220312_132609_update_table_user_id cannot be reverted.\n";

        return false;
    }


    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->dropTable('{{%ip}}');
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%ip}}', [
            'id' => $this->primaryKey(),
            'ip' => $this->string()->comment('ip地址'),
            //'user_id'=>$this->integer(5)->notNull()->comment('用户'),
            'hostname'=>$this->string()->comment('域名'),
            'city'=>$this->string(100)->comment('城市'),
            'region'=>$this->string(100)->comment('地区'),
            'country' => $this->string(10)->comment('国家代码'),
            'loc' => $this->string()->comment('经纬度'),
            'org' => $this->string()->comment('组织'),
            'postal' => $this->string()->comment('邮政编码'),
            'timezone' => $this->string(30)->comment('时区'),
            'country_name' => $this->string()->comment('国家名称'),
            'latitude' => $this->double(8,5)->comment('纬度'),
            'longitude' => $this->double(8,5)->comment('经度'),
            'visits'=>$this->integer()->defaultValue(1)->comment('访问量'),
            'created_at' => $this->integer()->comment('创建时间'),
            'updated_at' => $this->integer()->comment('修改时间'),
        ], $tableOptions);
    }

    public function down()
    {
        echo "m220312_132609_update_table_user_id cannot be reverted.\n";

        return false;
    }

}

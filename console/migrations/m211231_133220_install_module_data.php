<?php

use yii\db\Migration;

/**
 * Class m211231_133220_install_module_data
 */
class m211231_133220_install_module_data extends Migration
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
        echo "m211231_133220_install_module_data cannot be reverted.\n";

        return false;
    }


    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->insert('module',[
            'id'=>1,
            'user_id'=>1,
            'name'=>'测试',
            'type'=>1,
            'keyword'=>'mok',
            'describe'=>'da',
            'inherit'=>'as',
            'created_at'=>time(),
            'updated_at'=>time(),
        ]);
    }

    public function down()
    {
        echo "m211231_133220_install_module_data cannot be reverted.\n";

        return false;
    }

}

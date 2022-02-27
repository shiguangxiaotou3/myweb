<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%mailbox}}`.
 */
class m220224_134220_create_mailbox_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%mailbox}}', [
            'id' => $this->primaryKey(),
            'server'=>$this->string()->comment('创建时间'),
            'mailbox'=>$this->string()->comment('邮箱名称'),
            'number'=>$this->integer()->comment('消息uid'),
            'subject'=>$this->string()->comment('主题'),
            'from'=>$this->string()->comment('发件人'),
            'to'=>$this->string()->comment('收件人'),
            'date'=>$this->integer()->comment('时间'),
            'isDeleted'=>$this->boolean()->comment('是否已删除'),
            'isDraft'=>$this->boolean()->comment('是否是草稿'),
            'isSeen'=>$this->boolean()->comment('是否已发送'),
            'isAttachment'=>$this->boolean()->comment('是否存在附件'),
            'created_at' => $this->integer()->notNull()->comment('创建时间'),
            'updated_at' => $this->integer()->notNull()->comment('修改时间'),

        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%mailbox}}');
    }
}

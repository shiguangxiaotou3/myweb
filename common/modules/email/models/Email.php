<?php

namespace common\modules\email\models;

use common\models\User;
use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "email".
 *
 * @property int $id
 * @property int $send_user_id 发送用户
 * @property int $receive_user_id 接收用户
 * @property string $title 标题
 * @property string $content 消息
 * @property int $status
 * @property int|null $lable 标签
 * @property int $created_at 创建时间
 * @property int $updated_at 修改时间
 */
class Email extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'email';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['send_user_id', 'receive_user_id', 'title', 'content', /*'created_at', 'updated_at'*/], 'required'],
            [['send_user_id', 'receive_user_id', 'status', /*'created_at', 'updated_at',*/'lable'], 'integer'],
            [['title', 'content'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(){
        return [
            'id' => Yii::t('app', 'ID'),
            'send_user_id' => Yii::t('app', 'send_user_id'),
            'receive_user_id' => Yii::t('app', 'receive_user_id'),
            'title' => Yii::t('app', 'title'),
            'content' => Yii::t('app', 'content'),
            'status' => Yii::t('app', 'status'),
            'lable' => Yii::t('app', 'lable'),
            'created_at' => Yii::t('app', 'created_at'),
            'updated_at' => Yii::t('app', 'updated_at'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return array[]
     */
    public function behaviors(){
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',// 自己根据数据库字段修改
                'updatedAtAttribute' => 'updated_at', // 自己根据数据库字段修改
                'value' => time(),
            ],
        ];
    }

    /**
     * 获取收信箱
     * @param  User $user
     * @return array|Email[]|yii\db\ActiveRecord[]
     */
    public function Inbox($user){
        return self::find()->where(['receive_user_id'=>$user->id])->all();
    }

    /**
     * 获取发送信箱
     * @param User $user
     * @return array|Email[]|yii\db\ActiveRecord[]
     */
    public function Sent($user){
        return self::find()->where(['send_user_id'=>$user->id])->all();
    }
}

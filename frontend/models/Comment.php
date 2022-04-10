<?php

namespace frontend\models;

use common\models\User;
use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "comment".
 *
 * @property int $id
 * @property int|null $article_id 文章id
 * @property string $username 用户名
 * @property int|null $user_id 用户id
 * @property string|null $message 消息
 * @property int|null $message_id 消息id
 * @property int|null $status 是否已读
 * @property int $created_at 创建时间
 * @property int $updated_at 修改时间
 */
class Comment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['user_id','default','value' => Yii::$app->user->id],
            ['status','default','value' => 1],
            [['article_id', 'user_id', 'message_id', 'status', /*'created_at', 'updated_at'*/], 'integer'],
//            [['created_at', 'updated_at'], 'required'],
            [['message'], 'string', 'max' => 255],
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
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'article_id' => Yii::t('app', '文章id'),
            'user_id' => Yii::t('app', '用户id'),
            'message' => Yii::t('app', '消息'),
            'message_id' => Yii::t('app', '消息id'),
            'status' => Yii::t('app', '是否已读'),
            'created_at' => Yii::t('app', '创建时间'),
            'updated_at' => Yii::t('app', '修改时间'),
        ];
    }

    /**
     * 获取作者名字
     * @return string
     */
    public function getUsername(){
        return User::findOne($this->user_id)->username;
    }
}

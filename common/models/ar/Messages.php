<?php

namespace common\models\ar;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "messages".
 *
 * @property int $id
 * @property int $send_user_id 发送用户
 * @property int $receive_user_id 接收用户
 * @property string $messages 消息
 * @property int $status
 * @property int $created_at 创建时间
 * @property int $updated_at 修改时间
 */
class Messages extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'messages';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['send_user_id', 'receive_user_id', 'messages',/* 'created_at', 'updated_at'*/], 'required'],
            [['send_user_id', 'receive_user_id', 'status', /*'created_at', 'updated_at'*/], 'integer'],
            [['messages'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'send_user_id' => '发送用户',
            'receive_user_id' => '接收用户',
            'messages' => '消息',
            'status' => 'Status',
            'created_at' => '创建时间',
            'updated_at' => '修改时间',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\MessagesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\MessagesQuery(get_called_class());
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
     * 获取用户未读消息数量
     * @param $receive_user_id
     * @return bool|int|string|null
     */
    public function getUnreadNumber($receive_user_id){
       return  self::find()
           ->where(['receive_user_id'=>$receive_user_id,'status'=>0])
           ->count();;
    }

    /**
     * 获取用户的所有未读消息
     * @param $receive_user_id
     * @return array
     */
    public function getUnreadData($receive_user_id){
        $send_user = self::find()
            ->select(['send_user_id'])
            ->where(['receive_user_id'=>$receive_user_id,'status'=>0])
            ->asArray()->all();
        $ids = array_unique(array_column($send_user,'send_user_id'));
        $res =array();
        /** @var  $model Messages */
        foreach ($ids as $id){
                $model = self::find()
                    ->where(['send_user_id'=>$id, 'receive_user_id'=>$receive_user_id, 'status'=>0])
                    ->orderBy(['created_at'=>SORT_ASC])
                    ->one();
                $res[] =array(
                    'send_user_id'=>$id,
                    'message'=>$model->messages,
                    'time'=>$model->created_at,
                );
        }
        return $res;
    }

}

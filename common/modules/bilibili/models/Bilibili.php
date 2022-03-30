<?php

namespace common\modules\bilibili\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "bilibili".
 *
 * @property int $id
 * @property int|null $roomId 房间id
 * @property int|null $unix 发送时间戳
 * @property int|null $user_id 用户id
 * @property string|null $username 用户明
 * @property string|null $message 消息
 * @property int|null $status 是否已读
 * @property int $created_at 创建时间
 * @property int $updated_at 修改时间
 */
class Bilibili extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bilibili';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['roomId', 'unix', 'user_id', 'status', /*'created_at', 'updated_at'*/], 'integer'],
            [['username', 'message'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'roomId' => Yii::t('app', '房间id'),
            'unix' => Yii::t('app', '发送时间戳'),
            'user_id' => Yii::t('app', '用户id'),
            'username' => Yii::t('app', '用户明'),
            'message' => Yii::t('app', '消息'),
            'status' => Yii::t('app', '是否已读'),
            'created_at' => Yii::t('app', '创建时间'),
            'updated_at' => Yii::t('app', '修改时间'),
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
     * 获取近7天弹幕数量
     *
     * @param $roomId
     * @return array
     */
    public static function bulletChatNumber($roomId){
        $time = time();
        $endDate = $time-( $time % 24*60*60) ;
        $startDate = $time - 24*60*60*7;
        $res =[];
        for($i=0;$i<=6;$i++){
            $unixStart =$startDate + $i *24*60*60;
            $number = Bilibili::find()
                ->where(['roomId'=>$roomId])
                ->andWhere(['>=','unix',$unixStart])
                ->andWhere(['<','unix',$unixStart + 24*60*60])
                ->count();
            $res[$unixStart]=$number;
        }
        return  $res;

    }

}

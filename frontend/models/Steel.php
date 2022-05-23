<?php

namespace frontend\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "steel".
 *
 * @property int $id
 * @property string|null $city 城市
 * @property string|null $type 材料名称
 * @property int|null $time 发布时间
 * @property string|null $titer 标题
 * @property int $created_at 创建时间
 * @property int $updated_at 修改时间
 */
class Steel extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'steel';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['time', /*'created_at', 'updated_at'*/], 'integer'],
            //[['created_at', 'updated_at'], 'required'],
            [['city', 'type', 'titer'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'city' => '城市',
            'type' => '材料名称',
            'time' => '发布时间',
            'titer' => '标题',
            'created_at' => '创建时间',
            'updated_at' => '修改时间',
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
     * 添加记录
     * @param $data
     * @return Steel
     */
    public static function addData($data){
        $model = new self();
        $model->city = $data['city'];
        $model->type = $data['type'];
        $model->time = $data['time'];
        $model->titer = $data['titer'];
       if(  $model->save()){
           return   $model;
       }
    }
}

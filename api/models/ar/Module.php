<?php

namespace api\models\ar;


use Yii;
use common\models\User;
use api\models\query\ModuleQuery;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "module".
 *
 * @property int $id
 * @property int $user_id 用户id
 * @property string|null $name 名称
 * @property int|null $type 类型
 * @property string|null $keyword 关键字
 * @property string $describe 描述
 * @property string|null $inherit 继承
 * @property int $created_at 创建时间
 * @property int $updated_at 修改时间
 */
class Module extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'module';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['user_id','default','value'=>function(){
                return Yii::$app->user->getId();
            }],
            [['user_id',/*'describe'*//* 'created_at', 'updated_at'*/], 'required'],
            [['user_id', 'type', /* 'created_at', 'updated_at'*/], 'integer'],
            [['name'], 'string', 'max' => 20],
            [['keyword', 'describe', 'inherit'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => '用户id',
            'name' => '名称',
            'type' => '类型',
            'keyword' => '关键字',
            'describe' => '描述',
            'inherit' => '继承',
            'created_at' => '创建时间',
            'updated_at' => '修改时间',
        ];
    }

    /**
     * {@inheritdoc}
     * @return ModuleQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ModuleQuery(get_called_class());
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
     * @return array[]
     */
    public function  fields(){
        /** @var User $model  */
        return [
            'id' ,
            'name',
            'type',
            'keyword',
            'describe',
            'author'=>function($molde){
                    return User::findOne($molde->user_id)->username;
            },
            'inherit',
        ];
    }
}

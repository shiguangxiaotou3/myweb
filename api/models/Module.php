<?php

namespace api\models;

use Yii;

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
            [['user_id', 'describe', 'created_at', 'updated_at'], 'required'],
            [['user_id', 'type', 'created_at', 'updated_at'], 'integer'],
            [['name'], 'string', 'max' => 20],
            [['keyword', 'describe', 'inherit'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     * 删除条作者id及常见事件修改事件
     */
    public function fields()
    {
        $fields = parent::fields();
        // 删除一些包含敏感信息的字段
        unset($fields['user_id'], $fields['created_at'], $fields['updated_at']);

        return $fields;
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
     * @return \frontend\models\query\ModuleQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \frontend\models\query\ModuleQuery(get_called_class());
    }
}

<?php

namespace frontend\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "article".
 *
 * @property int $id
 * @property int $user_id 模块id
 * @property string $label 标签
 * @property string|null $title 标题
 * @property string|null $content 类容
 * @property int|null $status 可见
 * @property int $created_at 创建时间
 * @property int $updated_at 修改时间
 */
class Article extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'article';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'label', /*'created_at', 'updated_at'*/], 'required'],
            [['user_id', 'status', /*'created_at', 'updated_at'*/], 'integer'],
            [['content'], 'string'],
            [['label', 'title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', '模块id'),
            'label' => Yii::t('app', '标签'),
            'title' => Yii::t('app', '标题'),
            'content' => Yii::t('app', '类容'),
            'status' => Yii::t('app', '可见'),
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
}

<?php

namespace frontend\models;

use common\models\User;
use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "article".
 *
 * @property int $id
 * @property int $user_id 模块id
 * @property-read string $username 用户名
 * @property string $label 标签
 * @property string|null $title 标题
 * @property string|null $content 类容
 * @property int|null $status 可见
 * @property string|null $classification 分类
 * @property int|null $visits 访问量
 * @property int|null $fabulous 点赞
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
            ['user_id','default','value' => Yii::$app->user->id],
            ['status','default','value' =>1],
            ['visits','default','value' =>0],
            ['fabulous','default','value' =>1],
            [['user_id',  'title'/*'created_at', 'updated_at'*/], 'required'],
            [['user_id', 'status', 'fabulous'/*'created_at', 'updated_at'*/], 'integer'],
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
            'user_id' => Yii::t('app', '用户'),
            'label' => Yii::t('app', '标签'),
            'title' => Yii::t('app', '标题'),
            'content' => Yii::t('app', '内容'),
            'status' => Yii::t('app', '可见'),
            'classification' => Yii::t('app', '分类'),
            'visits' => Yii::t('app', '访问量'),
            'created_at' => Yii::t('app', '创建时间'),
            'updated_at' => Yii::t('app', '修改时间'),
            'fabulous' => Yii::t('app', '点赞'),
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
     * 获取作者名字
     * @return string
     */
    public function getUsername(){
       return User::findOne($this->user_id)->username;
    }

    /**
     * 获取热门文章
     */
    public static function ArticleTop10(){
        $model= self::find()->select(['id','title'])->orderBy(['fabulous'=>'SORT_DESC'])->asArray()->all();
       return array_slice($model,0,10);
    }
}

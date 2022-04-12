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
            [['label'], 'validateTags'],
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
     * 验证标签是否定义
     * @param $attribute
     * @param bool $clearErrors
     */
    public function validateTags($attribute , $clearErrors = true)
    {
        $tags= Tag::getTags();
        $str= $this->label;
        if(strpos($str,",")){
            $data = explode(',',$str);
            foreach ($data as $datum){
                if(!in_array($datum,$tags)){
                    return $this->addError($attribute,"标签".$datum."为定义");
                }
            }
        }else{
            if(!in_array($str,$tags)){
                return $this->addError($attribute,"标签".$str."为定义");
            }
        }
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
     * 访问量
     */
    public function addVisits(){
       $this->visits +=1;
       $this->save(false);
    }

    /**
     * 点赞
     */
    public function addFabulous(){
       $this->fabulous +=1;
       $this->save(false);
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

    /**
     * 获取评论
     * @return \yii\db\ActiveQuery
     */
    public function getComment(){
        return Comment::find()
            ->where(['article_id'=>$this->id])
            ->andWhere(['status'=>1])
            ->andWhere(['message_id'=>0])
            ->orderBy(['created_at'=>'SORT_DESC']) ->all();
    }
}

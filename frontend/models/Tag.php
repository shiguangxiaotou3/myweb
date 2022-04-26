<?php

namespace frontend\models;

use Yii;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use common\widgets\tag\TagWidget;
use yii\behaviors\TimestampBehavior;
/**
 * This is the model class for table "tag".
 *
 * @property int $id
 * @property int|null $parent 父id
 * @property string $name 标签
 * @property string|null $title 标题
 * @property int $created_at 创建时间
 * @property int $updated_at 修改时间
 * @property string|null $describe 描述
 */
class Tag extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tag';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent', /*'created_at', 'updated_at'*/], 'integer'],
            [['name',  /*'created_at', 'updated_at'*/], 'required'],
            [['name', 'title', 'describe'], 'string', 'max' => 255],
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
            'parent' => Yii::t('app', '分类'),
            'name' => Yii::t('app', '标签名称'),
            'title' => Yii::t('app', '标题'),
            'created_at' => Yii::t('app', '创建时间'),
            'updated_at' => Yii::t('app', '修改时间'),
            'describe' => Yii::t('app', '描述'),
        ];
    }


    /**
     * 查询所有分类标签
     */
    public static function getClassification(){
        $model= self::find()->select('name')
            ->andWhere(['parent'=>0])
            ->andWhere(['NOT',  ['name'=>'NULL']])
            ->distinct('name')->asArray()->all();
        if(count($model)>0){
            return ArrayHelper::getColumn($model,'name');
        }
    }


    /**
     * 查询所有标签
     * @return array|Tag[]|yii\db\ActiveRecord[]
     */
    public static function getTags(){
        $model= self::find()->select('name')
            ->andWhere(['NOT',['parent'=>0]])
           ->andWhere(['NOT',['parent'=>'NULL']])
            ->andWhere(['NOT',  ['name'=>'NULL']])
            ->distinct('name')->asArray()->all();
        if(count($model)>0){
            return ArrayHelper::getColumn($model,'name');
        }
    }


    /**
     * 生产标签云  无前端css
     * @return bool|string
     */
    public static function TagsWidget(){
        $tags = self::getTags();
        $res =false;
        if(is_array( $tags) && !empty( $tags)){
            foreach ( $tags as $value){
                $res .= Html::tag('span', $value, [
                        'class'=>"badge rounded-pill ".TagWidget::randomBg(),
                        'onclick'=>"addTag(this)",
                    ])."\n";
            }
        }
        return $res;
    }

    /**
     * 获取下拉列表数据
     * @return array|false
     */
    public static function getTagsArr(){
        $model = self::find()->select(['id','name'])->where(['NOT',['name'=>'NULL']])->asArray()->all();
        return array_combine(ArrayHelper::getColumn($model,'id'),ArrayHelper::getColumn($model,'name'));
    }
}

<?php

namespace common\models\ar;

use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "ip".
 *
 * @property int $id
 * @property string|null $ip ip地址
 * @property int $user_id 用户
 * @property string|null $hostname 域名
 * @property string|null $city 城市
 * @property string|null $region 地区
 * @property string|null $country 国家代码
 * @property string|null $loc 经纬度
 * @property string|null $org 组织
 * @property string|null $postal 邮政编码
 * @property string|null $timezone 时区
 * @property string|null $country_name 国家名称
 * @property float|null $latitude 纬度
 * @property float|null $longitude 经度
 * @property int|null $visits 访问量
 * @property int|null $created_at 创建时间
 * @property int|null $updated_at 修改时间
 */
class Ip extends ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ip';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['country','city','loc'], 'required'],
            [['user_id', 'visits',/* 'created_at', 'updated_at'*/], 'integer'],
            [['latitude', 'longitude'], 'number'],
            [['ip', 'hostname', 'loc', 'org', 'postal', 'country_name'], 'string', 'max' => 255],
            [['city', 'region'], 'string', 'max' => 100],
            [['country'], 'string', 'max' => 10],
            [['timezone'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ip' => 'ip地质',
            'hostname' => '域名',
            'city' => '城市',
            'region' => '地区',
            'country' => '国家代码',
            'loc' => '经纬度',
            'org' => '单位',
            'postal' => '邮政编码',
            'timezone' => '时区',
            'country_name' => '国家名称',
            'latitude' => '纬度',
            'longitude' => '经度',
            'visits' => '访问量',
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
     * 判断一个IP地址是否，已经解析物理地址
     * @param $ip
     * @return bool
     */
    public static function is_empty($ip){
        $n = self::find()->where(['ip'=>$ip])->count();
        if($n == 0){
            return false;
        }else{
            return true;
        }
    }

    /**
     * 访问量加1
     * @param $ip
     * @return mixed
     */
    public static function sum_count($ip){
       $model = self::find()->where(['ip'=>$ip])->one();
       $model->visits ++;
       return $model->save(false);
    }

    /**
     * 获取所有地区的访问量
     * @return array|false
     */
    public function visitsDataByCountry(){
        $data =self::find()->select(['country'])->where(['not',['country'=>null]])
            ->indexBy('country')->asArray()->all();
       $country = array_keys($data);
        if(!empty($country)){
            $res = array();
            foreach ($country as $value){
                $res[$value] = self::find()->where(['country'=>$value])->sum('visits');
            }
        }else{
            return false;
        }
        return ['visitorsData'=>$res];
    }


    /**
     * 获取所有登陆的城市
     * @return array
     */
    public function visitsDataByCity(){
        $data = self::find()->select(['city','loc'])->where(['not',['city'=>null]])
            ->indexBy('city')->asArray()->all();
        if($data){
            $markers =array();
            foreach ($data as $datum){
                $markers[] =array(
                    'latLng'=> explode(",", $datum['loc']),
                    'name'=> $datum['city'],
                );
            }
            return ['markers'=>$markers];
        }
    }
}

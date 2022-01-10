<?php

namespace common\models\ar;

use ipinfo\ipinfo\IPinfo;
use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "ip".
 *
 * @property int $id
 * @property string|null $ip ip地质
 * @property string|null $hostname 域名
 * @property string|null $city 城市
 * @property string|null $region 地区
 * @property string|null $country 国家代码
 * @property string|null $loc 经纬度
 * @property int|null $org 单位
 * @property int|null $postal 邮政编码
 * @property string|null $timezone 时区
 * @property string|null $country_name 国家名称
 * @property float|null $latitude 纬度
 * @property float|null $longitude 经度
 * @property float|null $visits 访问量
 * @property int|null $created_at 创建时间
 * @property int|null $updated_at 修改时间
 */
class Ip extends \yii\db\ActiveRecord
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
            [['org', 'postal','visits', /*'created_at', 'updated_at'*/], 'integer'],
            [['latitude', 'longitude'], 'number'],
            [['ip', 'hostname', 'loc', 'country_name'], 'string', 'max' => 255],
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
     * @return \common\models\query\IpQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\IpQuery(get_called_class());
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
     * 根据ip地质，解析登陆者物理位置
     * 注意一个账号一个月只有5000次机会
     */
    public function auto(){
        $token ="7265d1b29d49c2";
        /** @var  $model  self */
        foreach (self::find()->each(10) as $model){
            try {
                if($model->city !== ''){
                    /** @var  $client IPinfo */
                    $client = new IPinfo($token);
                    $details = $client->getDetails($model->ip);
                    //$model->hostname = $details->hostname;
                    $model->city = $details->city;
                    $model->region = $details->region;
                    $model->country = $details->country;
                    $model->loc = $details->loc;
                    //$model->org = $details->org;
                    //$model->postal = $details->postal;
                    $model->timezone = $details->timezone;
                    $model->country_name = $details->country_name;
                    $model->latitude = $details->latitude;
                    //$model->longitude = $details->longitude;
                    $model->save(false);
                }
            }catch (\Exception $e){
                logObject($e->getMessage());
                continue;
            }

        }
    }

    /**
     * 更新一条ip的地址信息
     * @param $model
     */
    public static function ParseIP($model){
        $token ="7265d1b29d49c2";
        //不解析的白名单
        $ips =['127.0.0.1'];
        try {
            if($model->city !== '' &&  !in_array($model->ip,$ips) ){
                /** @var  $client IPinfo */
                $client = new IPinfo($token);
                $details = $client->getDetails($model->ip);
                //$model->hostname = $details->hostname;
                $model->city = $details->city;
                $model->region = $details->region;
                $model->country = $details->country;
                $model->loc = $details->loc;
                //$model->org = $details->org;
                //$model->postal = $details->postal;
                $model->timezone = $details->timezone;
                $model->country_name = $details->country_name;
                $model->latitude = $details->latitude;
                //$model->longitude = $details->longitude;
                $model->save(false);

            }
        }catch (\Exception $e){

        }
    }
}

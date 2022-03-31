<?php


namespace common\components;


use yii\base\Component;
use common\models\ar\Bilibili as message;
/**
 * Class Bilibili
 * @property-read  array $data
 * @package common\components
 */
class Bilibili extends Component
{
    public  $url = "https://api.live.bilibili.com/xlive/web-room/v1/dM/gethistory?roomid=";
    public $modelclass ='common\modules\bilibili\models\Bilibili';
    public  $roomId ="";
    public $day=15;

    public function getData(){
        $data =file_get_contents($this->url.$this->roomId);
        return json_decode($data);
    }

    /**
     * 从服务器中获取弹幕，并保存到数据库中
     * @param $roomId
     */
    public function saveMessages($roomId){
        $this->roomId = $roomId;
        $data = $this->data;
        if($data->code==0){
            if(count($data->data->room)>0){
                $messages = $data->data->room;
                foreach ($messages as $message){
                    $username =$message->nickname;
                    $user_id =$message->uid;
                    $time =strtotime($message->timeline);
                    $str =$message->text;
                    $number = $this->modelclass::find()->where(['roomId'=>$roomId,'user_id'=>$user_id,'unix'=>$time])->count();
                    if($number==0){
                        $model = new $this->modelclass();
                        $model->roomId =$roomId;
                        $model->username =  $username;
                        $model->user_id= $user_id;
                        $model->message =$str;
                        $model->unix =$time;
                        $model->validate() ? $model->save() :  logObject($model->getErrors());
                    }
                }
            }

        }else{
            logObject($data->message);
        }

    }

    /**
     * 获取最近一分钟类的，弹幕消息
     * @param $roomId
     * @param int $time
     * @return array|false
     */
    public function getMessage($roomId,$time=60){
        $startTime = time() - $time;
        $message = message::find()
            ->select(['id','username','message'])
            ->where(['roomId'=>$roomId,'status'=>0])
            ->andWhere(['>=','unix',$startTime]);

       if($message->count() >0){
           $str =[];
           /** @var $each message */
          foreach ($message->each(10) as $each){
                $str []= $each->username .'说：'.$each->message;
                // 设置为已读
                $model = message::findOne($each->id);
                $model->status =1;
                $model->validate() ? $model->save() :logObject($model->getErrors());
          }
            return $str ;
       }else{
           return false;
       }

    }
}
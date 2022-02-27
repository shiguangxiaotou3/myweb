<?php


namespace common\modules\email\widgets;

use Yii;
use yii\base\Widget;
use yii\helpers\Html;

class MailboxListWidget extends Widget{

    public $data = [];
    public $server ='收箱箱';
    public $icon ='fa fa-';
    public $badgeClass='label pull-right label-';
    public $url ='';
    public $action ='/email/inbox/index';
    public $actionUpdate ='/email/inbox/update';
    public $actionClaer ='/email/inbox/clear';
    public $onclick = "$.pjax({url: '/action/clear', container: '#assets'});";

    /**
     * 列表样式
     * @return string[][]
     */
    public static function category(){
        return [
            //收信箱
            'INBOX'=>['icon'=>'inbox','badgeClass'=>'default'],
            //已发送
            'Sent'=>['icon'=>'envelope-o','badgeClass'=>'success'],
            //草稿
            'Drafts'=>['icon'=>'file-text-o','badgeClass'=>'info'],
            //已删除
            'Deleted'=>['icon'=>'trash-o','badgeClass'=>'primary'],
            //垃圾
            'Junk'=>['icon'=>'filter','badgeClass'=>'danger'],
            'default'=>['icon'=>'inbox','badgeClass'=>'default'],

        ];
    }
    /**
     * 邮箱分类
     * @return string[][]
     */
    public static function config(){
       return [
            //收信箱
            'INBOX'=>['INBOX','Outbox'],
            //已发送
            'Sent'=>['Sent Messages','Sent'],
            //草稿
            'Drafts'=>['Drafts','存档',],
            //已删除
            'Deleted'=>['Deleted Messages','Deleted'],
            //垃圾
            'Junk'=>['Junk]'],
        ];
    }
    /**
     * 根据邮箱名称，返回默认样式
     * @param $key
     * @return string[]
     */
    public static function getTemplate($key){
        $category = self::category();
        $data = self::config();
        foreach ($data as $datum =>$arr){
            if(in_array($key,$arr)){
                return $category[$datum];
            }
        }
        return ['icon'=>'inbox','badgeClass'=>'default'];
    }
    public  function getUrl($server,$mailbox){
        return Yii::$app->urlManager->createUrl([$this->action,'server'=>$server,'mailbox'=>$mailbox]);
    }
    /**
     * 构造邮箱的html
     * @param $mailbox
     * @param $number
     * @return string
     */
    public function item($mailbox,$number){
        $category  = self::getTemplate($mailbox);
        if($number > 0){
            $str ='<i class="'.$this->icon.$category['icon'].'" ></i>'. Html::encode(Yii::t('app',$mailbox)).
                    '<span class="'.$this->badgeClass.$category['badgeClass'].'">'. $number. '</span>';

            return '<li>'. Html::a( $str, false, [
                        'onclick'=>"$.pjax({url: '".$this->getUrl($this->server,$mailbox)."', container: '#messages'});"]).'</li>';
        }else{
            $cont ='<i class="'.$this->icon.$category['icon'].'" ></i>'. Html::encode(Yii::t('app',$mailbox));
            return "<li>".Html::a( $cont,false,[
                'onclick'=>"$.pjax({url: '".$this->getUrl($this->server,$mailbox)."', container: '#messages'});"])."</li>";
        }
    }
    public function items(){
        $data = $this->data;
        if($data){
            $str ='';
            foreach ($data as $mailbox =>$number){
                $str .= $this->item($mailbox,$number);
            }
            return $str;
        }else{
            return '<li ><a href="#">没有缓存</a></li>';
        }

    }
    public function run(){
        return $this->renderFile(__DIR__.'/layouts/box.php', [
                'data'=>$this->items(),
                'label'=>$this->server,
                'actionUpdate'=>$this->actionUpdate,
                'actionClaer'=>$this->actionClaer,
            ]);
    }

}
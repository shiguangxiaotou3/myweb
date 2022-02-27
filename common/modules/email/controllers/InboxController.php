<?php


namespace common\modules\email\controllers;


use Yii;
use yii\web\Controller;
use yii\data\Pagination;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 *
 * @property-read mixed $imap
 */
class InboxController extends Controller{


    /**
     * {@inheritdoc}
     */
    public function behaviors(){
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' =>  ['index','download','messages','view','update','clear'],
                'rules' => [
                    [
                        'actions' => ['index','download','messages','view','update','clear'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],

                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function actions(){
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
                'layout'=>'blank',
            ],
        ];
    }
    /**
     * 查看消息页面
     * @return string
     */
    public function actionIndex(){
        $request = Yii::$app->request;
        $imap =Yii::$app->imap;
        if($request->isAjax){
            return  $this->renderAjax('index',['imap'=> $imap]);
        }else{
            return $this->render('index',['imap'=> $imap]);
        }
    }
    /**
     * 显示消息列表
     * @return mixed|string|null
     * @throws yii\base\InvalidRouteException
     */
    public function actionMessages(){
        $request = Yii::$app->request;
        if($request->isGet){
            $server =$request->get('server','');
            $mailbox =$request->get('mailbox','');
            if($request->isAjax and $server !='' and $mailbox !='') {
                $imap = Yii::$app->imap;
                $data = $imap->mailboxMessagesList($server, $mailbox);
                $pages = new Pagination(['totalCount' =>count($data), 'pageSize' => '10']);
                $res = $this->getData($data,$pages->offset,$pages->limit);
                return $this->renderAjax('messages', [
                    'mailbox'=>$mailbox,
                    'data' => $res,
                    'pages'=>$pages,
                    'server'=>$server,]);
            } else{
                return  $this->runAction('index');
            }
        }
    }
    /**
     * 查看邮件
     * @param $server
     * @param $mailbox
     * @param $number
     * @return string
     */
    public function actionView($server,$mailbox,$number){
        $imap = Yii::$app->imap;
        $res = $imap->getMesssgeData($server,$mailbox,$number);
        $data = [
            'from' => $res['info']['from'],
            'subject' => $res['info']['subject'],
            'to' => $res['info']['to'],
            'date' => $res['info']['date'],
            'html' => $res['html']];
        return $this->renderAjax('view', [
            'data'=>$data,
            'server'=>$server,
            'mailbox'=>$mailbox,
            'number'=>$number]);
    }
    /**
     * 加载缓存文件
     * @param $server
     * @throws \Exception
     */
    public function actionUpdate($server){
        $imap = Yii::$app->imap;
        $imap->open($server);
        $imap->saveServer();
        $imap->close();
    }
    /**
     * 清理服务器缓存文件
     * @param $server
     */
    public function actionClear($server){
        Yii::$app->imap->clearCache($server);
    }




    /**
     * @param $data
     * @param $offset
     * @param $limit
     * @return false|mixed
     */
    private function getData( $data,$offset,$limit){
       if(!empty($data)){
           $i =0;
           $res =[];
           $last_names = array_column($data,'date');
           array_multisort($last_names,SORT_DESC,$data);
           foreach ($data as $row){
               if($i<$offset){
                   $i++;
                   continue;
               }elseif ($i>= $offset and $i < $offset+$limit){
                   $res[]= $row;
               }elseif($i >= $offset+$limit){
                    break;
               }
               $i++;
           }
           unset($data);
           return  $res;
       }else{
           return false;
       }
    }

    /**
     * 显示邮件的html
     * @param $server
     * @param $mailbox
     * @param $number
     * @return false|string
     */
    public function actionHtml($server,$mailbox,$number){
        $this->layout =false;
        $imap = Yii::$app->imap;
        return $imap->BodyContent($server,$mailbox,$number);
    }


}
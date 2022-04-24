<?php

use yii\helpers\Html;

/* @var $this yii\web\View view component instance */
/* @var $message yii\mail\MessageInterface the message being composed */
/* @var $content string main view render result */

?>
<?php $this->beginPage() ?>
    <html>
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
        <style>
            .clearfix:after {
                content: ".";
                display: block;
                height: 0;
                clear: both;
                visibility: hidden;
            }
            .clearfix {
                *display: inline-block;
                *zoom: 100%;
            }
            .open_email {
                background: url(http://imgcache.qq.com/bossweb/pay/images/mailmsg/email_bg.png) no-repeat 0 -35px;
                width: 760px;
                padding: 10px;
                font-family: Tahoma, "宋体";
                margin: 0 auto;
                margin-bottom: 20px;
                text-align: left;
            }
            .open_email a:link,
            .open_email a:visited {
                color: #295394;
                text-decoration: none !important;
            }
            .open_email a:active,
            .open_email a:hover {
                color: #000;
                text-decoration: underline !important;
            }
            a.lv:link,
            a.lv:visited {
                color: #1969e2;
                text-decoration: underline;
            }
            a.lv:active,
            a.lv:hover {
                color: #000;
                text-decoration: underline;
            }
            .open_email .img_left {
                float: left;
                width: 125px;
                text-align: left;
            }
            .open_email .word_right {
                float: right;
                width: 615px;
            }
            .open_email h5,
            .open_email h6 {
                font-size: 14px;
                margin: 0px;
                padding-top: 2px;
                line-height: 21px;
            }
            .open_email h5 {
                color: #df0202;
                padding-bottom: 10px;
            }
            .open_email h6 {
                padding-bottom: 2px;
            }
            .open_email h5 span,
            .open_email p {
                font-size: 12px;
                color: #808080;
                font-weight: normal;
                margin: 0;
                padding: 0;
                line-height: 21px;
            }
            .email_btn {
                background: url(http://imgcache.qq.com/bossweb/pay/images/mailmsg/email_bg.png) no-repeat 0 0;
                width: 84px;
                height: 29px;
                line-height: 29px;
                border: 0;
                padding: 0px;
                cursor: pointer;
                color: #023a65;
                font-size: 14px;
                vertical-align: middle;
                text-align: center;
                margin: 10px 0 6px;
                display: block;
                text-decoration: none;
            }
            .email_hr {
                background: url(http://imgcache.qq.com/bossweb/pay/images/mailmsg/email_bg.png) no-repeat -100px 0px;
                height: 4px;
                margin: 8px 0;
            > overflow: hidden;
            }
            .Wrap{
                word-break: break-all;
                box-sizing:border-box;
                text-align:center;
                min-width:320px;
                max-width:660px;
                border:1px solid #f6f6f6;
                background-color:#f7f8fa;
                margin:auto;
                padding:20px 0 30px;
            }
            .hr{
                height:2px;
                background-color: #00a4ff;
                border: 0;
                font-size:0;
                padding:0;
                width:100%;
                margin-top:20px;
            }
            .inner{
                background-color:#fff;
                padding:23px 0 20px;
                box-shadow: 0px 1px 1px 0px rgba(122, 55, 55, 0.2);
                text-align:left;
            }
            .table{
                width:100%;
                font-weight:300;
                margin-bottom:10px;
                border-collapse:collapse;
                text-align:left;
            }
        </style>
    </head>
    <body>
        <?php $this->beginBody() ?>
        <div align='center'>
            <div class="open_email" style="margin-left: 8px; margin-top: 8px; margin-bottom: 8px; margin-right: 8px;">
                <div>
                    <!--左侧 -->
                    <span class="genEmailNicker"></span>
                    <br>
                    <!--中侧 -->
                    <span class="genEmailContent">
                        <div id="cTMail-Wrap" class="Wrap" style=" ">
                            <div class="main-content" style="">
                                <table class="table">
                                    <tbody>
                                        <tr style="font-weight:300">
                                            <!-- 第一列 空-->
                                            <td style="width:3%;max-width:30px;"></td>
                                            <!-- 第二列 主体-->
                                            <td style="max-width:600px;">
                                                <!-- logo-->
                                                <?= $this->render('./title/logo.php') ?>
                                                <!-- 主要内容 -->
                                                <div id="cTMail-inner" class="inner" >
                                                    <table class="table" >
                                                        <tbody>
                                                            <tr style="font-weight:300">
                                                                <!-- 左侧空白-->
                                                                <td style="width:3.2%;max-width:30px;"></td>

                                                                <td style="max-width:480px;text-align:left;">
                                                                    <?= $content ?>
                                                                    <?= $this->render('./sign/Sign.php') ?>
                                                                </td>
                                                                <!-- 右侧空白-->
                                                                <td style="width:3.2%;max-width:30px;"></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <!-- 页脚 -->
                                                 <?= $this->render('./footer/footer.php') ?>
                                            </td>
                                            <!-- 第三列 空-->
                                            <td style="width:3%;max-width:30px;"></td>
                                        </tr>
                                    </tbody>
                                </table>
                             </div>
                        </div>
                    </span>
                    <br>
                    <!--右侧 -->
                    <span class="genEmailTail"></span>
                </div>
            </div>
        </div>
        <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage();

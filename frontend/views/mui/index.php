<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = Yii::t('app','About');
$this->params['breadcrumbs'][] = $this->title;
$js =<<<JS
    mui.init({});
JS;
$this->registerJs($js,\yii\web\View::POS_HEAD)
?>

<ul class="mui-table-view">
    <li class="mui-table-view-cell mui-collapse">
        <a class="mui-navigate-right" href="#">面板1</a>
        <div class="mui-collapse-content">
            <p>面板1子内容</p>
        </div>
    </li>
</ul>


<form class="mui-input-group">
    <div class="mui-input-row">
        <label>用户名</label>
        <input type="text" class="mui-input-clear" placeholder="请输入用户名">
    </div>
    <div class="mui-input-row">
        <label>密码</label>
        <input type="password" class="mui-input-password" placeholder="请输入密码">
    </div>
    <div class="mui-button-row">
        <button type="button" class="mui-btn mui-btn-primary" >确认</button>
        <button type="button" class="mui-btn mui-btn-danger" >取消</button>
    </div>
</form>
<div class="mui-switch mui-active">
    <div class="mui-switch-handle"></div>
</div>
<?php

use yii\helpers\Html;
use yii\grid\GridView;
use mdm\admin\components\Helper;

/* @var $this yii\web\View */
/* @var $searchModel mdm\admin\models\searchs\User */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('rbac-admin', 'Users');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index" style="background-color: #FFFFFF;padding: 15px">

    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a(Yii::t('rbac-admin', 'Login'), ['login'], ['class' => 'btn btn-success']) ?>
        <?= Html::a(Yii::t('rbac-admin', 'Logout'), ['logout'], ['class' => 'btn btn-success']) ?>
        <?= Html::a(Yii::t('rbac-admin', 'Signup'), ['signup'], ['class' => 'btn btn-success']) ?>
        <?= Html::a(Yii::t('rbac-admin', 'Delete'), ['delete'], ['class' => 'btn btn-success']) ?>
        <?= Html::a(Yii::t('rbac-admin', 'RequestPasswordReset'), ['login'], ['class' => 'btn btn-success']) ?>
        <?= Html::a(Yii::t('rbac-admin', 'ResetPassword'), ['login'], ['class' => 'btn btn-success']) ?>
        <?= Html::a(Yii::t('rbac-admin', 'ChangePassword'), ['login'], ['class' => 'btn btn-success']) ?>
    </p>
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'username',
                'format' => 'text',
                'label' => Yii::t('rbac-admin', 'Username'),
            ],
            [
                'attribute' => 'email',
                //'format' => 'text',
                'label' => Yii::t('rbac-admin', 'email'),
            ],
            [
                'attribute' => 'status',
                'value' => function($model) {
                    return $model->status == 0 ? '不活跃的' : '活跃的';
                },
                'label' => '状态',
                'filter' => [
                    0 => '不活跃的',
                    10 => '活跃的'
                ]
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => Helper::filterActionColumn(['view', 'activate', 'delete']),
                'buttons' => [
                    'activate' => function($url, $model) {
                        if ($model->status == 10) {
                            return '';
                        }
                        $options = [
                            'title' => Yii::t('rbac-admin', 'Activate'),
                            'aria-label' => Yii::t('rbac-admin', 'Activate'),
                            'data-confirm' => Yii::t('rbac-admin', 'Are you sure you want to activate this user?'),
                            'data-method' => 'post',
                            'data-pjax' => '0',
                        ];
                        return Html::a('<span class="glyphicon glyphicon-ok"></span>', $url, $options);
                    }
                    ]
                ],
            ],
        ]);
        ?>
</div>

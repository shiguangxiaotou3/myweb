<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Article */
?>
<div class="article-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'user_id',
            'label',
            'title',
            'content:ntext',
            'status',
            'created_at',
            'updated_at',
            'classification',
            'visits',
        ],
    ]) ?>

</div>

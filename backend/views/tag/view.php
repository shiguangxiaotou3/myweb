<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Tag */
?>
<div class="tag-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'parent',
            'name',
            'title',
            'created_at',
            'updated_at',
            'describe',
        ],
    ]) ?>

</div>

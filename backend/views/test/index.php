<?php
use common\components\Reptile;
use console\models\PrintTable;
use DiDom\Document;
use yii\web\View;
use common\components\Snoopy;
/** @var $this yii\web\View */
/** @var $content string */
/** @var $data string|array|bool */

$arr=[
    [1,1,1],
    [2,2,2],
    [3,3,3],
];
array_unshift($arr,[0,0,0]);
dump($arr);
?>
<input type="text">
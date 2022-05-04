<?php
use  common\models\tool\MySteel;
use common\components\Snoopy;
/** @var $this yii\web\View */
/** @var $content string */
/** @var $data string|array|bool */



?>

<div class="row">
    <div class="col col-lg-12">
        <?php

            $mysteel = new MySteel();
            $path = Yii::getAlias('@backend/runtime/data');
            $data =$mysteel->getAll('https://jiancai.mysteel.com/market/pa228a15354aa0aaaaa1.html',$path);
//            dump($data);
        ?>
    </div>
    <div class="col col-lg-12"><? ?></div>
</div>


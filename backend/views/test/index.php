<?php
use himiklab\handsontable\HandsontableWidget;
/** @var $this yii\web\View */
/** @var $content string */
/** @var $data string|array|bool */
use mihaildev\elfinder\InputFile;
use mihaildev\elfinder\ElFinder;
use yii\web\JsExpression;

//echo InputFile::widget([
//    'language'   => 'zh-cn',
//    'controller' => 'elfinder', // вставляем название контроллера, по умолчанию равен elfinder
//    'path' => 'image', // будет открыта папка из настроек контроллера с добавлением указанной под деритории
//    'filter'     => 'image',    // фильтр файлов, можно задать массив фильтров https://github.com/Studio-42/elFinder/wiki/Client-configuration-options#wiki-onlyMimes
//    'name'       => 'myinput',
//    'value'      => '',
//]);

//echo $form->field($model, 'attribute')->widget(InputFile::className(), [
//    'language'      => 'ru',
//    'controller'    => 'elfinder', // вставляем название контроллера, по умолчанию равен elfinder
//    'path' => 'image', // будет открыта папка из настроек контроллера с добавлением указанной под деритории
//    'filter'        => 'image',    // фильтр файлов, можно задать массив фильтров https://github.com/Studio-42/elFinder/wiki/Client-configuration-options#wiki-onlyMimes
//    'template'      => '<div class="input-group">{input}<span class="input-group-btn">{button}</span></div>',
//    'options'       => ['class' => 'form-control'],
//    'buttonOptions' => ['class' => 'btn btn-default'],
//    'multiple'      => false       // возможность выбора нескольких файлов
//]);

//echo ElFinder::widget([
//    'language'         => 'zh_CN',
//    'controller'       => 'elfinder', // вставляем название контроллера, по умолчанию равен elfinder
//    'path' => 'image', // будет открыта папка из настроек контроллера с добавлением указанной под деритории
//    'filter'           => 'image',    // фильтр файлов, можно задать массив фильтров https://github.com/Studio-42/elFinder/wiki/Client-configuration-options#wiki-onlyMimes
//    'callbackFunction' => new JsExpression('function(file, id){}'), // id - id виджета
////    'frameOptions'=>['style'=>'width: 1200px;height: 600px'],
//    'containerOptions'=>['class'=>'col clo-lg-12 no-margin no-padding','style'=>'height: 600px'],
//]);
dump($data);
?>
<!--
<div class="row">
    <div class="col col-lg-12">
        <?php
        echo HandsontableWidget::widget([
            'settings' => [
                'licenseKey' => 'non-commercial-and-evaluation',
                'data'=>[['asd','asda'],['asd','asdasd']],
                'contextMenu'=> ['row_above', 'row_below', 'remove_row'],
                'colHeaders' => true,
                'rowHeaders' => true,
            ]
        ]);
        ?>
    </div>
    <div class="col col-lg-12"><?=  dump($data) ?></div>
</div>
-->


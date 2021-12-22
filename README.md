<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">时光小偷的web框架模版</h1>
    <br>
</p>

基于yii2框架和AdminLTE Asset Bundle后台模版，进行二次开发

文档位于 [docs/guide/README.md](docs/guide/README.md).

[![Latest Stable Version](https://img.shields.io/packagist/v/yiisoft/yii2-app-advanced.svg)](https://packagist.org/packages/yiisoft/yii2-app-advanced)
[![Total Downloads](https://img.shields.io/packagist/dt/yiisoft/yii2-app-advanced.svg)](https://packagist.org/packages/yiisoft/yii2-app-advanced)
[![build](https://github.com/yiisoft/yii2-app-advanced/workflows/build/badge.svg)](https://github.com/yiisoft/yii2-app-advanced/actions?query=workflow%3Abuild)

DIRECTORY STRUCTURE
-------------------

```
common
    assets/              二次开发前段资源依赖
    config/              contains shared configurations
    mail/                contains view files for e-mails
    models/              contains model classes used in both backend and frontend
    tests/               contains tests for common classes    
    widgets/            二次开发小部件

```
### 卡片
```php
use common\widgets\Card;
echo Card::widget([
    'bg' => 'bg-green',
    'titer' => '<h3>1213<sup style="font-size: 20px">元</sup></h3>',
    'lable' => '<p>销售金额</p>',
    'icon' => 'ion-stats-bars',
    'url' => ['#'],
    ]);
```
### 图表
```html
common\widgets\charts\Charts;
$areaChartData = [
      'labels' => ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
      'datasets' =>  [
        [
          'label' =>  'Electronics',
          'fillColor' =>  'rgba(210, 214, 222, 1)',
          'strokeColor' =>  'rgba(210, 214, 222, 1)',
          'pointColor' =>  'rgba(210, 214, 222, 1)',
          'pointStrokeColor' => '#c1c7d1',
          'pointHighlightFill' => '#fff',
          'pointHighlightStroke' =>  'rgba(220,220,220,1)',
          'data' =>  [65, 59, 80, 81, 56, 55, 40]
        ],
        [
          'label' =>  'Digital Goods',
          'fillColor' =>  'rgba(60,141,188,0.9)',
          'strokeColor' =>  'rgba(60,141,188,0.8)',
          'pointColor' =>  '#3b8bba',
          'pointStrokeColor' =>  'rgba(60,141,188,1)',
          'pointHighlightFill' => '#fff',
          'pointHighlightStroke' => 'rgba(60,141,188,1)',
          'data' => [28, 48, 40, 19, 86, 27, 90]
        ]
      ]
    ]
];
echo common\widgets\charts\Charts::Widget([
    'type'=>'area',
    'data'=>$areaChartData
]);
```
### 热力图
```php
$visitorsData = [
    'US' => 398, // USA
    'SA' => 400, // Saudi Arabia
    'CA' => 1000, // Canada
    'DE' => 500, // Germany
    'FR' => 60, // France
    'CN' => 300, // China
    'AU' => 700, // Australia
    'BR' => 600, // Brazil
    'IN' => 800, // India
    'GB' => 320, // Great Britain
    'RU' => 3000 // Russia
];

echo \common\widgets\charts\Mapwidget::widget([
    'visitorsData'=>$visitorsData
]);
```
### 热力图2
```php
$markers =[
    ['latLng'=> [28.12,112.59 ], 'name'=>'长沙'],
    ['latLng'=> [30.51667,114.31667 ], 'name'=> '武汉' ],
];
echo \common\widgets\charts\Mapwidget::widget([
    'markers'=>$markers
]);
```
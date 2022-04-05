# yii2-tags-input

Yii2 integration for [developit/tags-input](https://github.com/developit/tags-input).

## Installation

The preferred way to install this extension is through [composer](https://getcomposer.org/download/).

Either run

```
php composer.phar require mludvik/yii2-tags-input:"~1.0"
```

or add

```
"mludvik/yii2-tags-input": "~1.0"
```

to the require section of your `composer.json`.

## Usage

```
<?php use mludvik\tagsinput\TagsInputWidget; ?>

<?= $form->field($model, 'tags')->widget(TagsInputWidget::className()) ?>
```

# Yii2 [Ace Editor](https://ace.c9.io) Widget

### Installation

```bash
composer require eluhr/yii2-aceeditor
```

### Usuage

without a model
```php
<?= AceEditor::widget([
    'name' => 'editor'
]); ?>
```

with a model

```php
<?= AceEditor::widget([
    'model' => $model,
    'attribute' => 'attribute_name'
]); ?>
```

### Configuration

For informations about configuration please read documents of [widget](./src/widgets/AceEditor.php)


# Yii Framework Froala WYSIWYG HTML Editor

[![Packagist](https://img.shields.io/packagist/v/froala/yii2-froala-editor.svg)](https://packagist.org/packages/froala/yii2-froala-editor)
[![Packagist](https://img.shields.io/packagist/dt/froala/yii2-froala-editor.svg)](https://packagist.org/packages/froala/yii2-froala-editor)

>Yii 2 widget for Froala Wysiwyg editor.

## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist froala/yii2-froala-editor
```

or add

```
"froala/yii2-froala-editor": "^3.2.5"
```

to the require section of your `composer.json` file.


## Usage

Once the extension is installed, simply use it in your code by  :

```php
<?php echo froala\froalaeditor\FroalaEditorWidget::widget([
    'name' => 'content',
    'options' => [
        // html attributes
        'id'=>'content'
    ],
    'clientOptions' => [
        'toolbarInline'=> false,
        'theme' =>'royal', //optional: dark, red, gray, royal
        'language'=>'en_gb' // optional: ar, bs, cs, da, de, en_ca, en_gb, en_us ...
    ]
]); ?>
```

or use with a model:

```php
<?php echo froala\froalaeditor\FroalaEditorWidget::widget([
    'model' => $model,
    'attribute' => 'content',
    'options' => [
        // html attributes
        'id'=>'content'
    ],
    'clientOptions' => [
        'toolbarInline' => false,
        'theme' => 'royal', //optional: dark, red, gray, royal
        'language' => 'en_gb' // optional: ar, bs, cs, da, de, en_ca, en_gb, en_us ...
    ]
]); ?>
```

add Font-awesome cdn for font-awesome plugin
```php
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
```

## Upload example

Using the basic Yii template make a new folder under /web/ called uploads.

For controler: 

```php
public function actionUpload() {
    $base_path = Yii::getAlias('@app');
    $web_path = Yii::getAlias('@web');
    $model = new UploadForm();

    if (Yii::$app->request->isPost) {
        $model->file = UploadedFile::getInstanceByName('file');

        if ($model->validate()) {
            $model->file->saveAs($base_path . '/web/uploads/' . $model->file->baseName . '.' . $model->file->extension);
        }
    }

    // Get file link
    $res = [
        'link' => $web_path . '/uploads/' . $model->file->baseName . '.' . $model->file->extension,
    ];

    // Response data
    Yii::$app->response->format = Yii::$app->response->format = Response::FORMAT_JSON;
    return $res;
}
```

For model: 

```php
namespace app\models;
use yii\base\Model;
use yii\web\UploadedFile;

/**
 * UploadForm is the model behind the upload form.
 */
class UploadForm extends Model
{
    /**
     * @var UploadedFile|Null file attribute
     */
    public $file;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['file'], 'file']
        ];
    }
}
```

For the view:

```php
<?= \froala\froalaeditor\FroalaEditorWidget::widget([
    'name' => 'body',
    'clientOptions' => [
        'toolbarInline'=> false,
        'height' => 200,
        'theme' => 'royal',//optional: dark, red, gray, royal
        'language' => 'en_gb' ,
        'toolbarButtons' => ['fullscreen', 'bold', 'italic', 'underline', '|', 'paragraphFormat', 'insertImage'],
        'imageUploadParam' => 'file',
        'imageUploadURL' => \yii\helpers\Url::to(['site/upload/'])
    ],
    'clientPlugins'=> ['fullscreen', 'paragraph_format', 'image']
]); ?>
```

For full details on usage, see the [documentation](https://froala.com/wysiwyg-editor/docs).

## Custom Buttons Example

The custom Buttons can be defined in JS files anywhere you want, in this example in /basic/assets/ folder.

In the view:

```php
<?php $this->registerJsFile('/basic/assets/alert.js', ['depends' => '\Froala\Editor\FroalaEditorAsset']);?>

<?= \Froala\Editor\FroalaEditorWidget::widget([
    'name'          => 'body',
    'clientOptions' => [
        'toolbarInline'    => false,
        'height'           => 200,
        'theme'            => 'royal',//optional: dark, red, gray, royal
        'language'         => 'en_gb',
        'toolbarButtons'   => ['fullscreen', 'bold', 'italic', 'underline', '|', 'paragraphFormat', 'insertImage', 'alert']
    ],
    'clientPlugins' => ['fullscreen', 'paragraph_format', 'image']
]); ?>
```

In /basic/assets/alert.js:

```js
FroalaEditor.DefineIcon('alert', {NAME: 'info'});
FroalaEditor.RegisterCommand('alert', {
        title: 'Hello',
        focus: false,
        undo: false,
        refreshAfterCallback: false,
        callback: function () {
            alert('Hello!');
        }
    }
);
```

For more details you can go to [Custom Buttons](https://www.froala.com/wysiwyg-editor/examples/custom-buttons)
## License

This package is available under MIT License. However, Froala editor requires purchasing a license from https://www.froala.com/wysiwyg-editor/pricing.

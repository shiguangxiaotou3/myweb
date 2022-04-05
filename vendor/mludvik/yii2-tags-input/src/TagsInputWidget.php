<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2018 Martin Ludvik
 * @license https://opensource.org/licenses/MIT MIT License
 */

namespace mludvik\tagsinput;

use yii\helpers\Html;
use yii\web\View;
use yii\widgets\InputWidget;

class TagsInputWidget extends InputWidget {

  const EXTENSION_ID = 'mludvik/yii2-tags-input';

  public function init() {
    parent::init();
    $this->options['type'] = 'tags';
  }

  public function run() {
    if ($this->hasModel()) {
      echo Html::activeTextInput($this->model, $this->attribute, $this->options);
    } else {
      echo Html::textInput($this->name, $this->value, $this->options);
    }

    $this->registerAssets();
  }

  private function registerAssets() {
    $view = $this->getView();
    TagsInputAsset::register($view);
    $view->registerJs(
      $this->initScript(),
      View::POS_READY,
      self::EXTENSION_ID
    );
  }

  private function initScript() {
    return "
      $('input[type=\"tags\"]').each(function() {
        tagsInput(this);
      });
    ";
  }

}

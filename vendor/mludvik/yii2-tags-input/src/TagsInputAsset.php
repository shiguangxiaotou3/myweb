<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2018 Martin Ludvik
 * @license https://opensource.org/licenses/MIT MIT License
 */

namespace mludvik\tagsinput;

use yii\web\AssetBundle;

class TagsInputAsset extends AssetBundle {

  public $sourcePath = '@bower/tags-input';
  public $css = [
    'tags-input.css',
  ];
  public $js = [
    'tags-input.js',
  ];

}

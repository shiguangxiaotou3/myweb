<?php
/**
 * @package   yii2-bootstrap5-dropdown
 * @author    Kartik Visweswaran <kartikv2@gmail.com>
 * @copyright Copyright &copy; Kartik Visweswaran, Krajee.com, 2015 - 2021
 * @version   1.0.0
 */

namespace kartik\bs5dropdown;

use kartik\base\PluginAssetBundle;

/**
 * Dropdown asset bundle.
 */
class DropdownAsset extends PluginAssetBundle
{
    /**
     * @inheritdoc
     */
    public $bsVersion = '5.x';

    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->setSourcePath(__DIR__ . '/assets');
        $this->setupAssets('js', ['js/dropdown']);
        $this->setupAssets('css', ['css/dropdown']);
        parent::init();
    }
}

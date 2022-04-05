<?php

namespace froala\froalaeditor;

use yii\base\Exception;
use yii\helpers\ArrayHelper;
use yii\web\AssetBundle;

/**
 * Froala Editor asset
 */
class FroalaEditorAsset extends AssetBundle
{
	/**
	 * Constants for enter pressed action
	 *
	 * @see https://www.froala.com/wysiwyg-editor/examples/enter
	 */
	const ENTER_P = 0; // default
	const ENTER_DIV = 1;
	const ENTER_BR = 2;

	/**
     * @var string
     */
    public $sourcePath = '@vendor/froala/wysiwyg-editor';

    /**
     * @var array
     */
    public $js = [
        'js/froala_editor.min.js',
        'js/plugins/markdown.min.js',
        'js/plugins/track_changes.min.js',
    ];

    /**
     * @var array
     */
    public $css = [
        'css/froala_editor.min.css',
        'css/froala_style.min.css',
        'css/plugins/markdown.min.css',
    ];

    /**
     * @var array
     */
    public $froalaPlugins = [
        'align', 'char_counter', 'code_beautifier', 'code_view', 'colors',
        'draggable', 'emoticons', 'entities', 'file', 'font_family',
        'font_size', 'fullscreen', 'image', 'image_manager', 'inline_style',
        'line_breaker', 'link', 'lists', 'paragraph_format', 'paragraph_style',
        'quick_insert', 'quote', 'save', 'table', 'url', 'video', 'help', 'print',
        'special_characters', 'word_paste', 'markdown', 'track_changes'
    ];

    /**
     * @param $clientPlugins
     * @param $excludedPlugins
     * @throws Exception
     */
    public function registerClientPlugins($clientPlugins, $excludedPlugins)
    {
        $pluginNames = [];
        if (is_array($clientPlugins)) {
            if (ArrayHelper::isIndexed($clientPlugins, true)) {
                // sequential array = list of plugins to be included
                // use default configurations for every plugin
                $this->registerPlugins($clientPlugins);
                $pluginNames = array_values($clientPlugins);
            } else {
                // associative array = custom plugins and options included
                foreach ($clientPlugins as $key => $value) {
                    if (is_numeric($key)) {
                        $pluginName = $value;
                        if (!$this->isPluginExcluded($pluginName, $excludedPlugins)) {
                            $this->registerPlugin($pluginName);
                        }
                    } else {
                        $pluginName = $key;
                        if (!$this->isPluginExcluded($pluginName, $excludedPlugins)) {
                            $pluginOptions = $value;
                            $issetJs = isset($pluginOptions['js']);
                            $issetCss = isset($pluginOptions['css']);
                            if ($issetJs) {
                                $this->addJs($pluginOptions['js']);
                            } else {
                                if ($this->isPluginJsFileExist($pluginName)) {
                                    $this->addJs($this->getDefaultJsUrl($pluginName));
                                } else {
                                    throw new Exception("you must set 'js' [and 'css'] for plugin '$pluginName'");
                                }
                            }
                            if ($issetCss) {
                                $this->addCss($pluginOptions['css']);
                            } else {
                                if ($this->isPluginCssFileExist($pluginName)) {
                                    $this->addCss($this->getDefaultCssUrl($pluginName));
                                }
                            }
                        }
                    }
                    $pluginNames[] = $pluginName;
                }
            }
        } else {
            $this->registerPlugins(array_diff($this->froalaPlugins, $excludedPlugins ?: []), true, true);
        }
        return $pluginNames;
    }

    /**
     * @param $pluginName
     * @param bool $checkJs
     * @param bool $checkCss
     * @throws Exception
     */
    public function registerPlugin($pluginName, $checkJs = true, $checkCss = true)
    {
        $jsFile = "js/plugins/$pluginName.min.js";
        if ($checkJs && $this->isPluginJsFileExist($pluginName)) {
            $this->addJs($jsFile);
            $cssFile = "css/plugins/$pluginName.min.css";
            if (!$checkCss || $this->isPluginCssFileExist($pluginName)) {
                $this->addCss($cssFile);
            }
        } else {
            $thirdPartyJsFile = "js/third_party/$pluginName.min.js";
            if($checkJs && $this->isThirdPartyPluginJsFileExist($pluginName)) {
                $this->addJs($thirdPartyJsFile);
                $thirdPartyCssFile = "css/third_party/$pluginName.min.css";
                if (!$checkCss || $this->isThirdPartyPluginCssFileExist($pluginName)) {
                    $this->addCss($thirdPartyCssFile);
                }
            }
            else {
                throw new Exception("plugin '$pluginName' is not supported, if you trying to set custom plugin, please set 'js' and 'css' options for your plugin");
            }
            
        }
    }

    /**
     * @param array $pluginsArray
     * @param bool $checkJs
     * @param bool $checkCss
     */
    public function registerPlugins(array $pluginsArray, $checkJs = true, $checkCss = true)
    {
        foreach ($pluginsArray as $pluginName) {
            $this->registerPlugin($pluginName, $checkJs, $checkCss);
        }
    }

    /**
     * @param $pluginName
     * @return bool
     */
    public function isPluginJsFileExist($pluginName)
    {
        return is_file($this->sourcePath . '/' . $this->getDefaultJsUrl($pluginName));
    }

    public function isThirdPartyPluginJsFileExist($pluginName)
    {
        return is_file($this->sourcePath . '/' . $this->getDefaultThirdPartyJsUrl($pluginName));
    }

    /**
     * @param $pluginName
     * @return bool
     */
    public function isPluginCssFileExist($pluginName)
    {
        return is_file($this->sourcePath . '/' . $this->getDefaultCssUrl($pluginName));
    }

    public function isThirdPartyPluginCssFileExist($pluginName)
    {
        return is_file($this->sourcePath . '/' . $this->getDefaultThirdPartyCssUrl($pluginName));
    }

    /**
     * @param $pluginName
     * @param $excludedPlugins
     * @return bool
     */
    public function isPluginExcluded($pluginName, $excludedPlugins)
    {
        return in_array($pluginName, $excludedPlugins, true);
    }

    /**
     * @param $jsFile
     */
    public function addJs($jsFile)
    {
        $this->js[] = $jsFile;
    }

    /**
     * @param $cssFile
     */
    public function addCss($cssFile)
    {
        $this->css[] = $cssFile;
    }

    /**
     * @param $pluginName
     * @return string
     */
    public function getDefaultCssUrl($pluginName)
    {
        return "css/plugins/{$pluginName}.min.css";
    }

    public function getDefaultThirdPartyCssUrl($pluginName)
    {
        return "css/third_party/{$pluginName}.min.css";
    }

    /**
     * @param $pluginName
     * @return string
     */
    private function getDefaultJsUrl($pluginName)
    {
        return "js/plugins/{$pluginName}.min.js";
    }

    private function getDefaultThirdPartyJsUrl($pluginName)
    {
        return "js/third_party/{$pluginName}.min.js";
    }
}

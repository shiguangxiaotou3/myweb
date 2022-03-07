<?php

namespace eluhr\aceeditor\assets;

use yii\web\AssetBundle;
use yii\web\View;


/**
 * Class AceEditorAsset
 * @package eluhr\aceeditor\assets
 * @author Elias Luhr <elias.luhr@gmail.com>
 */
class AceEditorAsset extends AssetBundle
{
    public $sourcePath = '@bower/ace-builds/src-' . (YII_DEBUG ? '' : 'min-') . 'noconflict';

    public $js = [
        'ace.js',
    ];

    /**
     * @param View $view
     * @param array $extensions
     * @return AceEditorAsset
     */
    public static function register($view, $extensions = [])
    {
        /** @var AceEditorAsset $bundle */
        $bundle = parent::register($view);
        foreach ($extensions as $extension) {
            $view->registerJsFile($bundle->baseUrl . '/ext-' . $extension . '.js', ['depends' => [static::class]], 'ACE_EXTENTION_' . $extension);
        }
        return $bundle;
    }
}
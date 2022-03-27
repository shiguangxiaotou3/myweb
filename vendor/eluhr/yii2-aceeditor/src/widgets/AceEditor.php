<?php

namespace eluhr\aceeditor\widgets;

use eluhr\aceeditor\assets\AceEditorAsset;
use Yii;
use yii\base\InvalidConfigException;
use yii\base\Model;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\widgets\InputWidget;

/**
 * Class AceEditor
 * @package eluhr\aceeditor
 * @author Elias Luhr <elias.luhr@gmail.com>
 *
 * --- PROPERTIES ---
 *
 * @property string $mode
 * @property string $theme
 * @property array $container_options
 * @property bool $read_only
 * @property bool $autocomplete
 * @property bool $remember_position
 * @property array $plugin_options
 * @property array $extensions
 *
 *
 * --- PARENT PROPERTIES ---
 *
 * @property array $options
 * @property Model $model
 * @property string $attribute
 * @property string $name
 * @property string $value
 */
class AceEditor extends InputWidget
{

    /**
     * @var string
     * Mode of editor. Used amongst other things for synatx highlighting.
     * See: https://github.com/ajaxorg/ace/tree/master/lib/ace/mode
     */
    public $mode = 'html';

    /**
     * @var string
     * GUI Theme of editor.
     * See: https://github.com/ajaxorg/ace/tree/master/lib/ace/theme
     */
    public $theme = 'github';

    /**
     * @var bool
     * Turn autocomplete on or off
     */
    public $autocomplete = true;

    /**
     * @var bool
     * Remembers current position in editor on reload
     */
    public $remember_position = true;

    /**
     * @var array
     * Html attributes for editor element
     */
    public $container_options = [];

    /**
     * @var array
     * js options for ace editor
     */
    public $plugin_options = [];

    /**
     * @var array
     * List of ace editor extensions which will be installed
     */
    public $extensions = [];


    /**
     * @throws InvalidConfigException
     */
    public function init()
    {
        parent::init();

        // set editor html element id to widget id
        $this->container_options['id'] = $this->container_options['id'] ?? $this->id;
        $this->options['id'] = $this->options['id'] ?? 'textarea-' . $this->container_options['id'];

        // hide textarea
        Html::addCssStyle($this->options, 'display: none');

        // add default size for editor
        $this->container_options['style'] = $this->container_options['style'] ?? 'width: 100%; min-height: 400px';


        if ($this->autocomplete) {
            $this->extensions[] = 'language_tools';

            $this->plugin_options = ArrayHelper::merge([
                'enableBasicAutocompletion' => true,
                'enableSnippets' => true,
                'enableLiveAutocompletion' => true
            ], $this->plugin_options);
        }

        $this->registerAssets();
    }


    /**
     * @return string
     */
    public function run()
    {
        return Html::tag('div', '', $this->container_options) . ($this->hasModel() ? Html::activeTextarea($this->model, $this->attribute, $this->options) : Html::textarea($this->name, $this->value, $this->options));
    }

    protected function registerAssets()
    {

        AceEditorAsset::register($this->view, $this->extensions);

        $editor_variable = 'ace_' . $this->container_options['id'];

        // require extensions
        foreach ($this->extensions as $extension) {
            $this->view->registerJs('ace.require("ace/ext/' . $extension . '");');
        }

        // initialize ace editor 
        $this->view->registerJs('var ' . $editor_variable . ' = ace.edit("' . $this->container_options['id'] . '");');

        // set theme and mode
        $this->view->registerJs($editor_variable . '.setTheme("ace/theme/' . $this->theme . '");');
        $this->view->registerJs($editor_variable . '.getSession().setMode("ace/mode/' . $this->mode . '");');

        // apply options
        if (!empty($this->plugin_options)) {
            $this->view->registerJs($editor_variable . '.setOptions(' . Json::encode($this->plugin_options) . ');');
        }
        $additional_update_script = '';
        if ($this->remember_position) {
            $uuid = md5((isset($this->model) ? Html::getInputId($this->model, $this->attribute) : $this->id) . Yii::$app->id);
            $this->view->registerJs(<<<JS
var cursorPos = JSON.parse(localStorage.getItem("{$uuid}"));
if (cursorPos !== null) {
    {$editor_variable}.focus();
    setTimeout(function() {
      {$editor_variable}.gotoLine(cursorPos.row + 1, cursorPos.column);
    },0);
}
JS
            );

            $additional_update_script = <<<JS
localStorage.setItem("{$uuid}",JSON.stringify({$editor_variable}.getCursorPosition()));
JS;
        }

        $textarea_variable = 'ace_textarea_' . $this->container_options['id'];

        // write editor value to hidden text value
        $this->view->registerJs(<<<JS
var {$textarea_variable} = document.getElementById("{$this->options['id']}");
{$editor_variable}.getSession().setValue({$textarea_variable}.value);
{$editor_variable}.getSession().addEventListener("change", function() {
  {$textarea_variable}.value = {$editor_variable}.getSession().getValue();
  {$additional_update_script}
});
JS
        );
    }
}

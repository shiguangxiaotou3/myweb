<?php


namespace common\models\basic;

use yii\base\Model;

class UploadForm extends Model
{

    public $upload;
    private $options;
    private $type;

    public function __construct($type, $options){
        $this->options = $options;
        $this->type = $type;
    }
    /**
     * Declares the validation rules.
     * The rules state that username and password are required,
     * and password needs to be authenticated.
     */
    public function rules()
    {
        return array(
            array('upload', 'file',
                'types' => $this->options->getAttribute("allow_".$this->type."_type"),
                'maxSize' => 1024 * (int)$this->options->getAttribute("allow_".$this->type."_maxsize"),
                'tooLarge'=>'文件大小超过限制',
            ),
        );
    }

}
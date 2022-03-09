<?php

namespace common\components;

use yii\base\Component;
use  common\components\File;

/**
 * Class Markdown
 *
 * @property File $viewPath
 * @property-read  $markdownFile
 * @property-read  $htmlFile
 * @package common\components\markdown
 */
class Markdown extends  Component
{
    public $markdown_path ='md';
    public $html_path ='html';
    private $_view ;

    /**
     * @param $file
     */
    public function setViewPath($file){
        $component = new File();
        $component->path = $file;
        $this->_view = $component;
    }
    /**
     * @return mixed
     */
    public function getViewPath(){
        return $this->_view;
    }
    /**
     * 获取markdown文件
     * @return array|bool
     */
    public function getMarkdownFile(){
        $path= $this->viewPath->dirname.'/'.$this->markdown_path;
        if(is_dir($path)){
            $files = File::dirChildren($path)['file'];
            $res = [];
            foreach ($files as $file){
                $info = pathinfo ($path.'/'.$file);
                if($info ['extension'] == "md"){
                    $res[] =$info['filename'];
                }
            }
            return $res;
        }else{
            return false;
        }
    }
    /**
     * 获取一解析的html文件
     * @return array|bool
     */
    public function getHtmlFile(){
        $path = $this->viewPath->dirname.'/'.$this->html_path;
        if(is_dir($path)){
            $files = File::dirChildren($path)['file'];
            $res = [];
            foreach ($files as $file){
                $info = pathinfo ($path.'/'.$file);
                if($info ['extension'] == "php"){
                    $res[] =$info['filename'];
                }
            }
            return $res;
        }else{
            return false;
        }
    }
}
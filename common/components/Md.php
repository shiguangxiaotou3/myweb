<?php

namespace common\components;

use yii\base\Component;
use yii\helpers\Markdown;
use common\models\basicData\File;
/**
 * Class MarkDown
 * @property string $markdown_path
 * @property string $html_path
 * @package common\components
 */
class Md extends  Component
{
    public $markdown_path ='md';
    public $html_path ='html';
    private $_viewDir ;

    /**
     * MarkDown constructor.
     * @param $markdown_path
     * @param $html_path
     * @param array $config
     */
    public function __construct($markdown_path, $html_path, $config = []){
        $this->html_path =$html_path;
        $this->markdown_path =$markdown_path;
        parent::__construct($config);
    }

    /**
     *
     */
    public function auto(){
        //获取被调用的位置
        $viewFile = debug_backtrace();
        //获取被调用的文件目录
        $this->_viewDir = dirname($viewFile[0]['file']) ;
        unset($viewFile);
        //获取所有mu文件
        $mds = $this->markdownFile();
        if($mds){
            foreach ($mds as $value){
                $name =str_replace(".md","",$value);
                //md文件路径
                $md_filepath = $this->_viewDir.'/'.$this->markdown_path.'/'.$name.'.md';
                //解析后的保存文件路径
                $save_filepath = $this->_viewDir.'/'.$this->html_path.'/'.$name.".php";
                if(!$this->validatorAnalysis($save_filepath)){
                    $this->analysisMdFile($md_filepath,$save_filepath,$name);
                }
            }
        }
    }

    /**
     * 获取当前视图文件的md文件的所有md文件名称
     * @return array|false
     */
    private function markdownFile(){
        $files = File::getDirChildrens($this->_viewDir.'/'.$this->markdown_path);
        if($files){
            $file = $files['file'];
            $md = array();
            foreach ($file as $value){
                if(preg_match_all('#[\S]*?\.md$#', $value) ){
                    $md[] = $value;
                }
            }
            return $md;
        }
        return false;
    }

    /**
     * 判断一个md文件是否已经解析，
     * 存在返回true,否则返回 false
     * @param string $save_filepath
     * @return bool
     */
    private function validatorAnalysis($save_filepath){
       return file_exists($save_filepath);
    }

    /**
     * 解析md文件
     * @param $md_filepath
     * @param $save_filepath
     * @return false|int
     */
    public function analysisMdFile($md_filepath,$save_filepath,$id){
        $md_str_start ='<!-- '.$id.' --><div class="container-overview" id="'.$id.'">';
        $md_str_end ='</div>';
        $text = file_get_contents($md_filepath);
        $html = Markdown::process($text,'gfm');
        $html = $this->strreplace($html);
        return file_put_contents($save_filepath,$md_str_start.$html.$md_str_end,LOCK_EX);
    }

    /**
     * 样式替换
     * @param $html
     * @return string|string[]
     */
    public function strreplace($html){
        $conf =array(
            '<pre><code'=>'<pre class="syntax"><code',
            '<tr><td align="left">'=>'<tr><td align="left" class="name">',
            '<table>
<thead>
<tr><th align="left">名称</th><th align="left">类型</th><th align="left">必填</th><th align="left">描述</th></tr>
</thead>'=> '<table class="params"><thead><th style="width: 15%">名称</th><th style="width: 10%">类型</th><th style="width: 8%">必填</th><th style="width: 67%">描述</th></thead>',
            '<h4>'=>'<h4 class="name">'
        );
        foreach ($conf as $key =>$value){
            $html=str_replace($key,$value,$html);
        }
        return $html;
    }




}
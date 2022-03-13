<?php

namespace common\modules\ace\models;

use common\components\File;
use Yii;
use yii\base\Model;

/**
 * @property-read string $theme
 * @property-read string $mode
 * @property-read string $permissionsStr
 * @property-read $permissions
 * Class File
 * @package common\modules\ace\models
 */
class Ace extends Model
{

    const SUBLIME_TEXT ='monokai';
    public $aliases;
    public $str;

    public function rules(){
       return [
           [['aliases','str'],'string'],
           [['aliases'],'required'],
       ];
    }

    /**
     * 获取权限
     * @return string
     */
    public function getPermissionsStr(){
        return File::permissionsStr(Yii::getAlias($this->aliases));
    }
    /**
     * 获取权限的对应数字
     * @return false|string
     */
    public function getPermissions(){
        return substr(sprintf('%o', fileperms(Yii::getAlias($this->aliases))), -4);
    }
    /**
     * 获取文件的内容
     * @return false|string
     */
    public function getContent(){
        $path = Yii::getAlias($this->aliases);
        if(is_file($path)){
           return  file_get_contents($path);
        }else{
            return  '';
        }
    }
    /**
     *  通过文件名或拓展名，获取对应的语言
     * @return mixed|string
     */
    public function getMode(){
        $path =  Yii::getAlias($this->aliases);
        if(file_exists($path)){
            $extension = pathinfo($path);
            if(isset($extension['filename']) && $extension['filename'] ='Dockerfile'){
                return 'dockerfile';
            }
            if(isset($extension['extension'])){
                if($extension['extension'] =='md'){
                    return 'markdown';
                }elseif ($extension['extension'] =='txt'){
                    return  'text';
                }elseif ($extension['extension'] =='js'){
                    return  'javascript';
                }elseif ($extension['extension'] =='yml'){
                    return  'yaml';
                }
                return $extension['extension'];
            }//yml
        }
        return 'php';
    }
    /**
     * 获取主题
     * @return string
     */
    public function getTheme(){
        //备至语言对应的默认主题
        $arr=[
            'php'=>self::SUBLIME_TEXT,//monokai,
            'markdown'=>self::SUBLIME_TEXT,//solarized_dark
            'json'=>self::SUBLIME_TEXT,
            'txt'=>self::SUBLIME_TEXT,
            'yml'=>self::SUBLIME_TEXT,
        ];
        $mode =$this->mode;
        if(isset($arr[$mode])){
            return $arr[$mode];
        }
        return self::SUBLIME_TEXT;
    }
    /**
     * 获取所有支持的语言
     * @return string[]
     */
    public function getModes(){
        return [
            'php','javascript','html','css','json','java','jsp','sh','python','nginx','vbscript','typescript',
            'markdown','apache_conf','yaml','sql','xml','gitignore',
            'abap','abc','actionscript','ada','alda',
            'apex','applescript','aql','asciidoc','asl','assembly_x86',
            'autohotkey','batchfile','c9search','c_cpp','cirru','clojure',
            'cobol','coffee','coldfusion','crystal','csharp','csound_document',
            'csound_orchestra','csound_score','csp','curly','d','dart','diff',
            'django','dockerfile','dot','drools','edifact','eiffel','ejs','elixir',
            'elm','erlang','forth','fortran','fsharp','fsl','ftl','gcode','gherkin',
            'glsl','gobstones','golang','graphqlschema','groovy','haml', 'handlebars',
            'haskell','haskell_cabal','haxe','hjson','html_elixir', 'html_ruby','ini',
            'io','jack','jade','json5', 'jsoniq','jssm','jsx','julia','kotlin','latex',
            'less','liquid','lisp',
            'livescript','logiql','logtalk','lsl','lua','luapage','lucene','makefile',
            'mask','matlab','maze','mediawiki','mel','mixal','mushcode','mysql',
            'nim','nix','nsis','nunjucks','objectivec','ocaml','pascal','perl','perl6',
            'pgsql','php_laravel_blade','pig','plain_text','powershell','praat',
            'prisma','prolog','properties','protobuf','puppet','qml','r',
            'razor','rdoc','red','redshift','rhtml','rst','ruby','rust','sass','scad',
            'scala','scheme','scss','sjs','slim','smarty','snippets','soy_template',
            'space','sparql','sqlserver','stylus','svg','swift','tcl','terraform',
            'tex','text','textile','toml','tsx','turtle','twig','vala',
            'velocity','verilog','vhdl','visualforce','wollok',
            'xquery','zeek'
        ];
    }
    /**
     * 获取获取支持的主题
     * @return string[]
     */
    public function getThemes(){
        return [
            'monokai','eclipse','xcode','dreamweaver','github','sqlserver',
            'ambiance','chaos','chrome','clouds','clouds_midnight','cobalt',
            'crimson_editor','dawn','dracula',
            'gob','gruvbox','idle_fingers','iplastic','katzenmilch','kr_theme',
            'kuroir','merbivore','merbivore_soft','mono_industrial',
            'nord_dark','pastel_on_dark','solarized_dark','solarized_light',
            'terminal','textmate','tomorrow','tomorrow_night','tomorrow_night_blue',
            'tomorrow_night_bright','tomorrow_night_eighties','twilight','vibrant_ink',
        ];
    }

    /**
     * 保存文件
     * @return false|int|string
     */
    public function saveFile(){

        $path = Yii::getAlias($this->aliases);

        // 是目录则返回fales
        if(is_dir($path)){
            return false;
        }
            //如果文件存在
            if (file_exists($path)){
                return file_put_contents($path,$this->str);
            }else{
                return '文件不存在'.$path;
            }


    }

    /**
     * 判断一个文件是否有写权限
     * @return bool
     */
    public function writable(){
        return !is_writable(Yii::getAlias($this->aliases));
    }




}
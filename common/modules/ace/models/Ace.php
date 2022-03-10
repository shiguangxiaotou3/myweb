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
           ['str','string']
       ];
    }

    /**
     * @return string
     */
    public function getPermissionsStr(){
        return File::permissionsStr(Yii::getAlias($this->aliases));
    }
    /**
     * @return false|string
     */
    public function getPermissions(){
        return substr(sprintf('%o', fileperms(Yii::getAlias($this->aliases))), -4);
    }
    /**
     * @return false|string
     */
    public function getContent(){
        $path = Yii::getAlias($this->aliases);
        if(file_exists($path)){
           return  file_get_contents($path);
        }else{
            return  '';
        }
    }
    /**
     * @return mixed|string
     */
    public function getMode(){
        $path =  Yii::getAlias($this->aliases);
        if(file_exists($path)){
            $extension = pathinfo($path);
            if(isset($extension['extension'])){
                if($extension['extension'] =='md'){
                    return 'markdown';
                }elseif ($extension['extension'] =='txt'){
                    return  'text';
                }elseif ($extension['extension'] =='js'){
                    return  'javascript';
                }
                return $extension['extension'];
            }
        }
        return 'text';
    }
    /**
     * @return string
     */
    public function getTheme(){
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
     * @return string[]
     */
    public function getModes(){
        return [
            'abap','abc','actionscript','ada','alda','apache_conf',
            'apex','applescript','aql','asciidoc','asl','assembly_x86',
            'autohotkey','batchfile','c9search','c_cpp','cirru','clojure',
            'cobol','coffee','coldfusion','crystal','csharp','csound_document',
            'csound_orchestra','csound_score','csp','css','curly','d','dart','diff',
            'django','dockerfile','dot','drools','edifact','eiffel','ejs','elixir',
            'elm','erlang','forth','fortran','fsharp','fsl','ftl','gcode','gherkin',
            'gitignore','glsl','gobstones','golang','graphqlschema','groovy','haml',
            'handlebars','haskell','haskell_cabal','haxe','hjson','html','html_elixir',
            'html_ruby','ini','io','jack','jade','java','javascript','json','json5',
            'jsoniq','jsp','jssm','jsx','julia','kotlin','latex','less','liquid','lisp',
            'livescript','logiql','logtalk','lsl','lua','luapage','lucene','makefile',
            'markdown','mask','matlab','maze','mediawiki','mel','mixal','mushcode','mysql',
            'nginx','nim','nix','nsis','nunjucks','objectivec','ocaml','pascal','perl','perl6',
            'pgsql','php','php_laravel_blade','pig','plain_text','powershell','praat',
            'prisma','prolog','properties','protobuf','puppet','python','qml','r',
            'razor','rdoc','red','redshift','rhtml','rst','ruby','rust','sass','scad',
            'scala','scheme','scss','sh','sjs','slim','smarty','snippets','soy_template',
            'space','sparql','sql','sqlserver','stylus','svg','swift','tcl','terraform',
            'tex','text','textile','toml','tsx','turtle','twig','typescript','vala',
            'vbscript','velocity','verilog','vhdl','visualforce','wollok','xml',
            'xquery','yaml','zeek'
        ];
    }
    /**
     * @return string[]
     */
    public function getThemes(){
        return [
            'ambiance','chaos','chrome','clouds','clouds_midnight','cobalt',
            'crimson_editor','dawn','dracula','dreamweaver','eclipse','github',
            'gob','gruvbox','idle_fingers','iplastic','katzenmilch','kr_theme',
            'kuroir','merbivore','merbivore_soft','mono_industrial','monokai',
            'nord_dark','pastel_on_dark','solarized_dark','solarized_light',
            'sqlserver','terminal','textmate','tomorrow','tomorrow_night','tomorrow_night_blue',
            'tomorrow_night_bright','tomorrow_night_eighties','twilight','vibrant_ink','xcode'
        ];
    }




}
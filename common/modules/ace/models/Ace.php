<?php

namespace common\modules\ace\models;

use Yii;
use yii\base\Model;

/**
 * @property-read string $extensionName
 * Class File
 * @package common\modules\ace\models
 */
class Ace extends Model
{


    public $aliases;
    public $str;

    public function rules(){
       return [
           [['aliases','str'],'string'],
           ['str','string']
       ];
    }

    /**
     * 如何重写set()方法
     * @param $aliases
     * @return mixed
     */
    public function setAliases($aliases){
        $path = Yii::getAlias($aliases);
        if(file_exists($path)){
            $this->str = file_get_contents($path);
        }else{
            $this->str ='';
        }
    }

    public function getExtensionName(){
        $path =  Yii::getAlias($this->aliases);
        if(file_exists($path)){
            $extensionName =pathinfo($path)['extension'];
            if($extensionName =='md'){
              return self::MODE_MARKDOWN;
            }
            return $extensionName;
        }
        return 'text';
    }

    const EXT_BEAUTIFY ='beautify';
    const EXT_CODE_LENS ='code_lens';
    const EXT_ELASTIC_TABSTOPS_LITE ='elastic_tabstops_lite';
    const EXT_EMMET ='emmet';
    const EXT_ERROR_MARKER ='error_marker';
    const EXT_KEYBINDING_MENU ='keybinding_menu';
    const EXT_LANGUAGE_TOOLS ='language_tools';
    const EXT_LINKING ='linking';
    const EXT_MODELIST ='modelist';
    const EXT_OPTIONS ='options';
    const EXT_PROMPT ='prompt';
    const EXT_RTL ='rtl';
    const EXT_SEARCHBOX ='searchbox';
    const EXT_SETTINGS_MENU ='settings_menu';
    const EXT_SPELLCHECK ='spellcheck';
    const EXT_SPLIT ='split';
    const EXT_STATIC_HIGHLIGHT ='static_highlight';
    const EXT_STATUSBAR ='statusbar';
    const EXT_TEXTAREA ='textarea';
    const EXT_THEMELIST ='themelist';
    const EXT_WHITESPACE ='whitespace';
    const KEYBINDING_EMACS ='emacs';
    const KEYBINDING_SUBLIME ='sublime';
    const KEYBINDING_VIM ='vim';
    const KEYBINDING_VSCODE ='vscode';

    const MODE_ABAP ='abap';
    const MODE_ABC ='abc';
    const MODE_ACTIONSCRIPT ='actionscript';
    const MODE_ADA ='ada';
    const MODE_ALDA ='alda';
    const MODE_APACHE_CONF ='apache_conf';
    const MODE_APEX ='apex';
    const MODE_APPLESCRIPT ='applescript';
    const MODE_AQL ='aql';
    const MODE_ASCIIDOC ='asciidoc';
    const MODE_ASL ='asl';
    const MODE_ASSEMBLY_X86 ='assembly_x86';
    const MODE_AUTOHOTKEY ='autohotkey';
    const MODE_BATCHFILE ='batchfile';
    const MODE_C9SEARCH ='c9search';
    const MODE_C_CPP ='c_cpp';
    const MODE_CIRRU ='cirru';
    const MODE_CLOJURE ='clojure';
    const MODE_COBOL ='cobol';
    const MODE_COFFEE ='coffee';
    const MODE_COLDFUSION ='coldfusion';
    const MODE_CRYSTAL ='crystal';
    const MODE_CSHARP ='csharp';
    const MODE_CSOUND_DOCUMENT ='csound_document';
    const MODE_CSOUND_ORCHESTRA ='csound_orchestra';
    const MODE_CSOUND_SCORE ='csound_score';
    const MODE_CSP ='csp';
    const MODE_CSS ='css';
    const MODE_CURLY ='curly';
    const MODE_D ='d';
    const MODE_DART ='dart';
    const MODE_DIFF ='diff';
    const MODE_DJANGO ='django';
    const MODE_DOCKERFILE ='dockerfile';
    const MODE_DOT ='dot';
    const MODE_DROOLS ='drools';
    const MODE_EDIFACT ='edifact';
    const MODE_EIFFEL ='eiffel';
    const MODE_EJS ='ejs';
    const MODE_ELIXIR ='elixir';
    const MODE_ELM ='elm';
    const MODE_ERLANG ='erlang';
    const MODE_FORTH ='forth';
    const MODE_FORTRAN ='fortran';
    const MODE_FSHARP ='fsharp';
    const MODE_FSL ='fsl';
    const MODE_FTL ='ftl';
    const MODE_GCODE ='gcode';
    const MODE_GHERKIN ='gherkin';
    const MODE_GITIGNORE ='gitignore';
    const MODE_GLSL ='glsl';
    const MODE_GOBSTONES ='gobstones';
    const MODE_GOLANG ='golang';
    const MODE_GRAPHQLSCHEMA ='graphqlschema';
    const MODE_GROOVY ='groovy';
    const MODE_HAML ='haml';
    const MODE_HANDLEBARS ='handlebars';
    const MODE_HASKELL ='haskell';
    const MODE_HASKELL_CABAL ='haskell_cabal';
    const MODE_HAXE ='haxe';
    const MODE_HJSON ='hjson';
    const MODE_HTML ='html';
    const MODE_HTML_ELIXIR ='html_elixir';
    const MODE_HTML_RUBY ='html_ruby';
    const MODE_INI ='ini';
    const MODE_IO ='io';
    const MODE_JACK ='jack';
    const MODE_JADE ='jade';
    const MODE_JAVA ='java';
    const MODE_JAVASCRIPT ='javascript';
    const MODE_JSON ='json';
    const MODE_JSON5 ='json5';
    const MODE_JSONIQ ='jsoniq';
    const MODE_JSP ='jsp';
    const MODE_JSSM ='jssm';
    const MODE_JSX ='jsx';
    const MODE_JULIA ='julia';
    const MODE_KOTLIN ='kotlin';
    const MODE_LATEX ='latex';
    const MODE_LESS ='less';
    const MODE_LIQUID ='liquid';
    const MODE_LISP ='lisp';
    const MODE_LIVESCRIPT ='livescript';
    const MODE_LOGIQL ='logiql';
    const MODE_LOGTALK ='logtalk';
    const MODE_LSL ='lsl';
    const MODE_LUA ='lua';
    const MODE_LUAPAGE ='luapage';
    const MODE_LUCENE ='lucene';
    const MODE_MAKEFILE ='makefile';
    const MODE_MARKDOWN ='markdown';
    const MODE_MASK ='mask';
    const MODE_MATLAB ='matlab';
    const MODE_MAZE ='maze';
    const MODE_MEDIAWIKI ='mediawiki';
    const MODE_MEL ='mel';
    const MODE_MIXAL ='mixal';
    const MODE_MUSHCODE ='mushcode';
    const MODE_MYSQL ='mysql';
    const MODE_NGINX ='nginx';
    const MODE_NIM ='nim';
    const MODE_NIX ='nix';
    const MODE_NSIS ='nsis';
    const MODE_NUNJUCKS ='nunjucks';
    const MODE_OBJECTIVEC ='objectivec';
    const MODE_OCAML ='ocaml';
    const MODE_PASCAL ='pascal';
    const MODE_PERL ='perl';
    const MODE_PERL6 ='perl6';
    const MODE_PGSQL ='pgsql';
    const MODE_PHP ='php';
    const MODE_PHP_LARAVEL_BLADE ='php_laravel_blade';
    const MODE_PIG ='pig';
    const MODE_PLAIN_TEXT ='plain_text';
    const MODE_POWERSHELL ='powershell';
    const MODE_PRAAT ='praat';
    const MODE_PRISMA ='prisma';
    const MODE_PROLOG ='prolog';
    const MODE_PROPERTIES ='properties';
    const MODE_PROTOBUF ='protobuf';
    const MODE_PUPPET ='puppet';
    const MODE_PYTHON ='python';
    const MODE_QML ='qml';
    const MODE_R ='r';
    const MODE_RAZOR ='razor';
    const MODE_RDOC ='rdoc';
    const MODE_RED ='red';
    const MODE_REDSHIFT ='redshift';
    const MODE_RHTML ='rhtml';
    const MODE_RST ='rst';
    const MODE_RUBY ='ruby';
    const MODE_RUST ='rust';
    const MODE_SASS ='sass';
    const MODE_SCAD ='scad';
    const MODE_SCALA ='scala';
    const MODE_SCHEME ='scheme';
    const MODE_SCSS ='scss';
    const MODE_SH ='sh';
    const MODE_SJS ='sjs';
    const MODE_SLIM ='slim';
    const MODE_SMARTY ='smarty';
    const MODE_SNIPPETS ='snippets';
    const MODE_SOY_TEMPLATE ='soy_template';
    const MODE_SPACE ='space';
    const MODE_SPARQL ='sparql';
    const MODE_SQL ='sql';
    const MODE_SQLSERVER ='sqlserver';
    const MODE_STYLUS ='stylus';
    const MODE_SVG ='svg';
    const MODE_SWIFT ='swift';
    const MODE_TCL ='tcl';
    const MODE_TERRAFORM ='terraform';
    const MODE_TEX ='tex';
    const MODE_TEXT ='text';
    const MODE_TEXTILE ='textile';
    const MODE_TOML ='toml';
    const MODE_TSX ='tsx';
    const MODE_TURTLE ='turtle';
    const MODE_TWIG ='twig';
    const MODE_TYPESCRIPT ='typescript';
    const MODE_VALA ='vala';
    const MODE_VBSCRIPT ='vbscript';
    const MODE_VELOCITY ='velocity';
    const MODE_VERILOG ='verilog';
    const MODE_VHDL ='vhdl';
    const MODE_VISUALFORCE ='visualforce';
    const MODE_WOLLOK ='wollok';
    const MODE_XML ='xml';
    const MODE_XQUERY ='xquery';
    const MODE_YAML ='yaml';
    const MODE_ZEEK ='zeek';
    const THEME_AMBIANCE ='ambiance';
    const THEME_CHAOS ='chaos';
    const THEME_CHROME ='chrome';
    const THEME_CLOUDS ='clouds';
    const THEME_CLOUDS_MIDNIGHT ='clouds_midnight';
    const THEME_COBALT ='cobalt';
    const THEME_CRIMSON_EDITOR ='crimson_editor';
    const THEME_DAWN ='dawn';
    const THEME_DRACULA ='dracula';
    const THEME_DREAMWEAVER ='dreamweaver';
    const THEME_ECLIPSE ='eclipse';
    const THEME_GITHUB ='github';
    const THEME_GOB ='gob';
    const THEME_GRUVBOX ='gruvbox';
    const THEME_IDLE_FINGERS ='idle_fingers';
    const THEME_IPLASTIC ='iplastic';
    const THEME_KATZENMILCH ='katzenmilch';
    const THEME_KR_THEME ='kr_theme';
    const THEME_KUROIR ='kuroir';
    const THEME_MERBIVORE ='merbivore';
    const THEME_MERBIVORE_SOFT ='merbivore_soft';
    const THEME_MONO_INDUSTRIAL ='mono_industrial';
    const THEME_MONOKAI ='monokai';
    const THEME_NORD_DARK ='nord_dark';
    const THEME_PASTEL_ON_DARK ='pastel_on_dark';
    const THEME_SOLARIZED_DARK ='solarized_dark';
    const THEME_SOLARIZED_LIGHT ='solarized_light';
    const THEME_SQLSERVER ='sqlserver';
    const THEME_TERMINAL ='terminal';
    const THEME_TEXTMATE ='textmate';
    const THEME_TOMORROW ='tomorrow';
    const THEME_TOMORROW_NIGHT ='tomorrow_night';
    const THEME_TOMORROW_NIGHT_BLUE ='tomorrow_night_blue';
    const THEME_TOMORROW_NIGHT_BRIGHT ='tomorrow_night_bright';
    const THEME_TOMORROW_NIGHT_EIGHTIES ='tomorrow_night_eighties';
    const THEME_TWILIGHT ='twilight';
    const THEME_VIBRANT_INK ='vibrant_ink';
    const THEME_XCODE ='xcode';

    const WORKER_BASE ='base';
    const WORKER_COFFEE ='coffee';
    const WORKER_CSS ='css';
    const WORKER_HTML ='html';
    const WORKER_JAVASCRIPT ='javascript';
    const WORKER_JSON ='json';
    const WORKER_LUA ='lua';
    const WORKER_PHP ='php';
    const WORKER_XML ='xml';
    const WORKER_XQUERY ='xquery';




}
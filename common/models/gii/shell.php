<?php


namespace common\models\gii;

use Yii;
use yii\base\Model;

/**
 * 构造gii的命令行执行语句
 * @package common\models\yii
 */
class shell extends Model
{

    /** @var $path 执行目录 */
    public $path = "sudo php /Library/WebServer/Documents/myweb/yii gii/model ";

    //数据库链接id
    public $db = 'db';
    //是否使用表前缀
    public $useTablePrefix = 0;
    //使用架构名称
    public $useSchemaName = true;
    //数据库表名称
    public $tableName = '';
    //标准化资产
    public $standardizeCapitals = false;
    //单一化
    public $singularize = false;
    //模型名称
    public $modelClass = '';
    //模型命名空间
    public $ns = "";
    //模型基类
    public $baseClass = 'yii\db\ActiveRecord';
    //生成关系 none: 没有关系 all:所有关系 all-inverse:与逆的所有关系
    public $generateRelations = 'all';
    //生成链接关系 table:通过表 model：通过模型
    public $generateJunctionRelationMode = 'table';
    //从当前模式中生成关系
    public $generateRelationsFromCurrentSchema = true;
    //从数据库注释生成标签
    public $generateLabelsFromComments = true;
    //是否 生成 ActiveQuery
    public $generateQuery = true;
    //ActiveQuery 命名空间
    public $queryNs = '';
    //ActiveQuery 类名
    public $queryClass = '';
    //ActiveQuery 基类
    public $queryBaseClass = 'yii\\db\\ActiveQuery';
    //是否启用I18N
    public $enableI18N = true;
    //是否启用I18N 类别
    public $messageCategory = 'app';



    /**
     * 调用gii生成数据库模型
     * @param $appName
     * @return string
     */
    public function ConstructShell($appName){
        $str =  "sudo php ".dirname(Yii::getAlias("@common"))."/yii gii/model ";
        if(!empty($this->tableName)){
            $str .= " --tableName=".$this->tableName;
            $str .= " --modelClass=".ucfirst($this->tableName);
            $str .= " --ns=".$appName."\\\models\\\ar";
            $str .= ' --generateQuery=1';
            $str .= ' --queryNs='.$appName."\\\models\\\query";
            $str .= ' --queryClass='.ucfirst($this->tableName)."Query";
            $str .= '  --generateLabelsFromComments=1';
            $str .= ' --enableI18N=0';
            $str .= ' --messageCategory=app';

        }
        return $str;
    }

}
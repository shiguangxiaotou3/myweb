<?php


namespace common\components\file;
use Yii;
use yii\base\Component;
use yii\helpers\ArrayHelper;


/**
 * Class File
 *
 * @property $alias
 * @property $path
 * @property-read $baseName
 * @property-read $fileName
 * @property-read $dirname
 * @property-read $extension
 * @property-read $size
 * @property-read $group 所属组
 * @property-read $owner 所有者
 * @property-read $children
 * @property-read $tmpSize
 * @property-read $tmpLabels
 * @property-read $permissionsNumber    权限十进制数字
 * @property-read $permissionsStr       所有权限字符串
 * @package common\components\file
 */
class File extends  Component{

    public $tmpAlias = [
            'backend'=>[
                'cache'=>'@backend/runtime/cache',
                'debug'=>'@backend/runtime/debug',
                'HTML'=>'@backend/runtime/HTML',
                'logs'=>'@backend/runtime/logs',
                'URI'=>'@backend/runtime/URI',
                'mail'=>'@backend/runtime/mail',
                'assets'=>'@backend/web/assets',

            ],
            'frontend'=>[
                'cache'=>'@frontend/runtime/cache',
                'debug'=>'@frontend/runtime/debug',
                'HTML'=>'@frontend/runtime/HTML',
                'logs'=>'@frontend/runtime/logs',
                'URI'=>'@frontend/runtime/URI',
                'mail'=>'@frontend/runtime/mail',
                'assets'=>'@frontend/web/assets',

            ],
            'console'=>[
                'cache'=>'@console/runtime/cache',
                'mail'=>'@console/runtime/mail',
                //'debug'=>'@console/runtime/debug',
                //'HTML'=>'@console/runtime/HTML',
                'logs'=>'@console/runtime/logs',
                //'URI'=>'@console/runtime/URI',
            ],
        ];
    private  $_alias;
    private $_path;

    /**
     * @return string
     */
    public function getAlias()
    {
        return $this->_alias;
    }

    /**
     * @param $alias
     */
    public function setAlias($alias){
        $this->_alias = $alias;
        $this->_path =Yii::getAlias($alias);
    }

    /**
     * 获取绝对路径
     * @return false|string
     */
    public function getPath(){
        return $this->_path;
    }

    /**
     * 设置路由
     * @param $path
     */
    public function setPath($path){
        $this->_path = $path;
    }

    /**
     * 创建子目录
     * @param $dirname
     * @param int $permissions
     * @return bool
     */
    public function createDir($dirname,$permissions = 0777 )
    {
        return mkdir($this->path."/".$dirname,$permissions,true);
    }

    /**
     * 删除子目录
     * @param string $relative_path 相对路径
     * @return bool
     */
    public function delDir( $relative_path)
    {
        return rmdir($this->path.'/'.$relative_path);
    }

    /**
     * 获取目录下的子目录和子文件
     * @return array[]|false
     */
    public function getChildren(){
        return self::dirChildren($this->path);
    }

    /**
     * 清空当前目录
     */
    public function clear()
    {
       return self::clearDir($this->path);
    }

    /**
     * 获取当前目录的大小,返回字节数
     * @return false|int
     */
    public function getSize()
    {
        return self::dirSize($this->path);
    }

    /**
     * 所属组
     * @return false|int
     */
    public function getGroup()
    {
        return filegroup($this->path);
    }

    /**
     * 所有者
     * @return false|int
     */
    public function getOwner()
    {
        return fileowner($this->path);
    }

    /**
     * 获取当前目录权限，返回数字
     * @return false|string|integer
     */
    public function getPermissionsNumber(){
        return substr(sprintf('%o', fileperms($this->path)), -4);
    }

    /**
     *  获取当前目录权限，返回字符传
     * @return string
     */
    public function getPermissionsStr()
    {
        return self::permissionsStr($this->path);
    }
    public function getBaseName()
    {
        return basename($this->path);
    }
    public function getFileName(){
        if (is_file($this->path)){
            return pathinfo($this->path)['filename'];
        }else{
            return false;
        }
    }
    public function getDirname()
    {
        return dirname($this->path);
    }
    public function getExtension(){
        if (is_file($this->path)){
            return pathinfo($this->path)['extension'];
        }else{
            return false;
        }
    }


    /**
     * 获取临时文件目录大小
     * @return array
     */
    public function getTmpSize()
    {
        $data = $this->tmpAlias;
        $res =array();
        foreach ($data as $key =>$datum){
            $row =array();
            foreach ($datum as $field =>$value){
                $this->alias = $value;
                $row[$field] = round(self::dirSize($this->path)/1024/1024,2);
            }
            $res[] = array('label'=>$key,'data'=>$row);
        }
        return $res;
    }

    /**
     * 获取图表x轴
     * @return array
     */
    public function getTmpLabels(){
        return array_keys($this->tmpAlias['backend']);
    }

    public function clearTmp(){
        $data = $this->tmpAlias;
        foreach ($data as $datum){
            foreach ($datum as$key => $value){
                $path = Yii::getAlias($value);
                if($key != 'cache'){
                    self::clearDir($path);
                }
            }
        }
    }



    /**
     * 获取文件配置信息
     * @param $path
     * @return array|bool
     */
    public static function fileInfo($path)
    {
        if (is_file($path)){
            $config = [
                //返回路径中的文件名部分
                'basename'=>basename($path),
                //返回路径中的目录部分
                'dirname'=>dirname($path),
                //取得文件的上次访问时间
                'atime'=>fileatime($path),
                //取得文件的 inode 修改时间
                'ctime'=>filectime($path),
                //取得文件的 inode
                'inode'=>fileinode($path),
                //取得文件修改时间
                'mtime'=>filemtime($path),
                //取得文件的组
                'group'=>filegroup($path),
                //取得文件的所有者
                'owner'=>fileowner($path),
                //取得文件的权限

                //取得文件大小
                'size'=>filesize($path),
                //取得文件类型
                'type'=>filetype($path),
            ];
            $info = pathinfo($path);
            $stat = stat($path);
            //文件拓展名
            $config['extension']=$info['extension'];
            //文件名
            $config['filename']=$info['filename'];
            $con =[
               'dev',       //设备名
               'nlink',     // 被连接数目
               'rdev',      //设备类型，如果是 inode 设备的话
               'mode',      //inode 保护模式
               'blksize',   // 文件系统 IO 的块大小
               'blocks'     //所占据块的数目
            ];
           foreach ($con as $item ){
               if(isset($stat[$item])){
                  $config[$item]= $stat[$item];
               }
           }
            //权限
            $config['perms'] = self::permissions($path);

           return $config;

        }else{
            return false;
        }
    }

    /**
     * 获取目录下的所文件和名称
     * @param $path
     * @return array|bool|null
     */
    public static function dirChildren($path)
    {
        if(self::is_Null($path)){
           return null;
        }else{
            if(is_dir($path)){
                $dir = [];
                $file= [];
                $arr = scandir($path);
                foreach ($arr as $item){
                    if ($item != '.' && $item != '..'){
                        if (is_dir($path.'/'.$item)){
                            array_push($dir,$item);
                        }else{
                            array_push($file,$item);
                        }
                    }
                }
                return  ['dir'=>$dir,'file'=>$file];
            }else{
                return  false;
            }
        }

    }

    /**
     * 获取目录或文件大小
     * @param $path
     * @return false|int
     */
    public static function dirSize($path)
    {
        if (is_dir($path)){
            $handle = opendir($path);
            $sizeResult = 0;
            while (false !== ($FolderOrFile = readdir($handle))){
                if ($FolderOrFile != "." && $FolderOrFile != ".."){
                    if (is_dir($path.'/'.$FolderOrFile)){
                        $sizeResult += self::dirSize($path.'/'.$FolderOrFile);
                    }else{
                        $sizeResult += filesize($path."/".$FolderOrFile);
                    }
                }
            }
            closedir($handle);
            return $sizeResult;
        }else{
            return  false;
        }
    }

    /**
     * 递归删除文件
     * @param $path
     * @return false
     */
    public static function recursionDelFile($path){
        $dh = opendir($path);
        if($dh){
            while ($file = readdir($dh)) {
                if ($file != '.' && $file != ".." && $file != '.gitignore') {
                    $pathName = $path . "/" . $file;
                    if (is_dir($pathName)) {
                        self::recursionDelFile($pathName);
                        rmdir($pathName);
                    } else {
                        if(is_writable($pathName)){
                            unlink($pathName);
                        }else{
                            continue;
                        }
                    }
                }
            }
            closedir($dh);
        }else{
            return false;
        }

    }

    /**
     * 清空当前目录
     * 没有权限或者存在
     * @param $path
     * @return bool
     */
    public static function clearDir($path){
        if(self::is_Null($path)){
            return true;
        }else{
            if(is_dir($path)){
                $name = scandir($path);
                foreach ($name as $pathName){
                    if ($pathName != '.' && $pathName !=".." && $pathName !='.gitignore'){
                        if (is_dir($path."/".$pathName)){
                            //递归删除文件
                            self::recursionDelFile($path."/".$pathName);
                            if (self::is_Null($path."/".$pathName)){
                                rmdir($path."/".$pathName);
                            }
                        }else{
                            if(is_writable($path."/".$pathName)){
                                unlink($path."/".$pathName);
                            }else{
                                continue;
                            }
                        }
                    }
                }
                //最后检测是否为空
                return self::is_Null($path);
            }
        }
    }

    /**
     * 判断一个目录是否为空
     * @param $path
     * @return bool
     */
    public static function is_Null($path){
        if(is_dir($path)){
            $isNull =array_diff(scandir($path),array('..','.'));
            if (empty($isNull)){
                return true;
            }
        }
        return  false;
    }

    /**
     * 获取文件权限
     * @param $path
     * @return array
     */
    public static function permissions($path){
      return  [
          fileperms($path),
          substr(sprintf('%o', fileperms($path)), -4),
          self::permissionsStr($path),
      ];
    }

    /**
     * 获取文件或目录权限
     * @param $path
     * @return string
     */
    public static function permissionsStr($path){
        $perms = fileperms($path);
        if (($perms & 0xC000) == 0xC000) {
            // Socket
            $info = 's';
        } elseif (($perms & 0xA000) == 0xA000) {
            // Symbolic Link
            $info = 'l';
        } elseif (($perms & 0x8000) == 0x8000) {
            // Regular
            $info = '_';
        } elseif (($perms & 0x6000) == 0x6000) {
            // Block special
            $info = 'b';
        } elseif (($perms & 0x4000) == 0x4000) {
            // Directory
            $info = 'd';
        } elseif (($perms & 0x2000) == 0x2000) {
            // Character special
            $info = 'c';
        } elseif (($perms & 0x1000) == 0x1000) {
            // FIFO pipe
            $info = 'p';
        } else {
            // Unknown
            $info = 'u';
        }

        // Owner
        $info .= (($perms & 0x0100) ? 'r' : '_');
        $info .= (($perms & 0x0080) ? 'w' : '_');
        $info .= (($perms & 0x0040) ? (($perms & 0x0800) ? 's' : 'x' ) : (($perms & 0x0800) ? 'S' : '_'));

        // Group
        $info .= (($perms & 0x0020) ? 'r' : '_');
        $info .= (($perms & 0x0010) ? 'w' : '_');
        $info .= (($perms & 0x0008) ? (($perms & 0x0400) ? 's' : 'x' ) : (($perms & 0x0400) ? 'S' : '_'));

        // World
        $info .= (($perms & 0x0004) ? 'r' : '_');
        $info .= (($perms & 0x0002) ? 'w' : '_');
        $info .= (($perms & 0x0001) ? (($perms & 0x0200) ? 't' : 'x' ) : (($perms & 0x0200) ? 'T' : '_'));

        return $info;
    }

    /**
     * 构造写入字符串,并写入文件中
     * @param $filePath
     * @param $config
     * @return false|int
     */
    public static function writeConfig($filePath, $config){
        if(file_exists($filePath)){
            unlink($filePath);
        }
        $str = "<?php\r\nreturn [\r\n";  // 拼接数组字符串-开头
        $str .= self::ConfigToStr($str, $config,1);  // 拼接数组字符串-中间
        $str .= "];";  //
        return file_put_contents($filePath, $str,FILE_APPEND);
    }

    /**
     * 构造写入数据
     * @param $str
     * @param $array
     * @param int $space
     */
    public static function ConfigToStr(&$str, $array, $space = 0){
         $s ='' ;
        for($i=0; $i<$space*4;$i++){
            $s .= " ";
        }
        foreach($array as $k=>$item){
            if(is_array($item)){
                $str .= "$s'$k' => [\r\n";
                $str .= self::ConfigToStr($str, $item, $space+1);
                $str .= "$s],\r\n";
            }else{
                $item =str_replace('\'','\\\'',$item);
                $str .= "$s'$k' => '$item',\r\n";
            }
        }
    }

    /**
     * 合并数据
     * @param $path
     * @param $config
     * @return false|int
     */
    public static function saveConfig($path,$config){
        if(!file_exists($path)){
            file_put_contents($path, "<?php\r\nreturn [\r\n"."];");
        }
        /** @var array $arr */
        $arr = require($path);
        $tmp = ArrayHelper::merge($arr , $config);
        return self::writeConfig($path,$tmp);
    }

    /**
     * 添加翻译,如果键重复，默认是不会添加
     * @param array $arr
     * @param string $category
     * @param string $alias
     * @return string
     */
    public static function addI18n( $arr,$alias = "@common/messages/zh-CN", $category = 'app'){
        $dir = Yii::getAlias($alias);
        $path = $dir.'/'.$category  .'.php';
        if(!file_exists($path)){
            file_put_contents($path, "<?php\r\nreturn [\r\n"."];");
        }
        $res = require($path);
        if(empty($res)){
            $tmp =$arr;
        }else{
            $tmp =  ArrayHelper::merge($res,$arr);
        }

        return  self::saveConfig($path,$tmp);
    }

    public static function addMailData($arr,$alias ="@app/runtime/mail", $category='data'){
        $dir = Yii::getAlias($alias);
        $path = $dir.'/'.$category  .'.php';
        if(!file_exists($path)){
            file_put_contents($path, "<?php\r\nreturn [\r\n"."];");
        }
        $res = require($path);
        foreach ($arr as $server =>$item){
            foreach ($item as $mailbox =>$item2){
                foreach ($item2 as $number =>$data){
                    $res[$server][$mailbox][$number] =$data;
                }
            }
        }
        return self::saveConfig($path,$res);
    }
}


<?php
namespace common\models;


use PhpOffice\PhpSpreadsheet\Writer\Xls;
use Yii;
use yii\base\Model;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

/**
 * Class MySteel
 * @property $excel
 * @property $sheet
 * @property $range
 * @property-read $sheetByName
 * @package common\models\tool
 */
class Excel extends Model{


    /**
     * 创建并写入文件
     * @param $path
     * @param $data
     * @param $title
     */
    public static function create($path,$title,$data){
        if(is_array($data)){
            //添加表头
            array_unshift($data,array_keys($data[0]));
            $spreadsheet= new Spreadsheet();
            $sheet =$spreadsheet->getActiveSheet();
            $sheet->setTitle(str_replace(":", "-",$title));
            $sheet->fromArray($data,null,"a1");
            $xls = new Xls($spreadsheet);
            unset($spreadsheet,$data);
            $xls->save($path);
        }


    }
}
<?php
namespace common\models;


use frontend\models\Steel;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use Yii;
use \PhpOffice\PhpSpreadsheet\IOFactory;
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


    /**
     * 读取数据
     * @param $path
     * @param null $formName
     * @return array
     * @throws \PhpOffice\PhpSpreadsheet\Reader\Exception
     */
    public static function loadExcel($path, $formName = null){
        if(file_exists($path)){
            $reader = IOFactory::createReader('Xls');
            $reader->setReadDataOnly(TRUE);
            $spreadsheet = $reader->load($path);
            $worksheet = $spreadsheet->getActiveSheet();
            $titer = $worksheet->getTitle();
            $arr=[];
            foreach ($worksheet->getRowIterator() as $row) {
                echo '<tr>' . PHP_EOL;
                $cellIterator = $row->getCellIterator();
                $cellIterator->setIterateOnlyExistingCells(FALSE); // This loops through all cells,
                $arr2 =[];
                foreach ($cellIterator as $cell) {
                    $arr2[]= $cell->getValue();
                }
                $arr[] =$arr2;
                unset($arr2);
            }
            unset($reader,$worksheet);
            return ['titer'=>$titer,"data"=>$arr];
        }

    }
}
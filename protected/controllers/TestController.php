<?php

class TestController extends ProjectController
{
	
	public function actionIndex(){
		
		include dirname(__FILE__)."/../components/PHPExcel/IOFactory.php"; 
		$inputFileName = Yii::app()->baseUrl.'/upload/call rates spreadsheet.xlsx';
		//  Read your Excel workbook
		try {
			$inputFileType = PHPExcel_IOFactory::identify($inputFileName);
			// $objReader = PHPExcel_IOFactory::createReader($inputFileType);
			$objPHPExcel = $objReader->load($inputFileName);
			dump($objPHPExcel);
		} catch(Exception $e) {
			die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
		}
		dump($inputFileName);
	}
	
	
	
}

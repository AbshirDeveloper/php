<?php require_once('../data/combine.php');  ?>
<?php
if (isset($_POST['download'])) {
	require_once '../phpexcel/PHPExcel.php';
	try {
		$sheet = new PHPExcel();
		
		// Set metadata
		$sheet->getProperties()->setCreator('www.Xisaab.com')
		                       ->setLastModifiedBy('www.Xisaab.com')
		                       ->setTitle('Xisaab xafiis weeye')
		                       ->setKeywords('cars second-hand used');
		
		// Set default settings
		$sheet->getDefaultStyle()->getAlignment()->setVertical(
	            PHPExcel_Style_Alignment::VERTICAL_TOP);
		$sheet->getDefaultStyle()->getAlignment()->setHorizontal(
				PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$sheet->getDefaultStyle()->getFont()->setName('Lucida Sans Unicode');
		$sheet->getDefaultStyle()->getFont()->setSize(12);
		
		// Get reference to active spreadsheet in workbook
		$sheet->setActiveSheetIndex(0);
		$activeSheet = $sheet->getActiveSheet();
		
		// Set print options
		$activeSheet->getPageSetup()->setOrientation(
	            PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE)
	            ->setFitToWidth(1)
	            ->setFitToHeight(0);
		
		$activeSheet->getHeaderFooter()->setOddHeader('&C&B&16' . 
                $sheet->getProperties()->getTitle())
                ->setOddFooter('&CPage &P of &N');
		

		// Generate Excel file and download
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="inventory.csv"');
		header('Cache-Control: max-age=0');
		
		$writer = PHPExcel_IOFactory::createWriter($sheet, 'Excel2015');
		$writer->save('php://output');
		exit;
		
	} catch (Exception $e) {
		$error = $e->getMessage();
	}
}
?>

<html>
<head></head>
<body>
<div id="main">
<div id="navigation">
<?php require_once('../data/navigation.php'); ?>
<script>
window.onload = function(){
		asking();
	}
</script>	
</div>
<div id="page"></div>
<?php require_once("../data/footer.php"); ?>
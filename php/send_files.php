<?php

require 'vendor/autoload.php';
require_once("history_update.php"); 

global $connection;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
$three = 3;

//object of the Spreadsheet class to create the excel data
$spreadsheet = new Spreadsheet();
$myWorkSheet2 = new \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet($spreadsheet, 'Dayn');
$myWorkSheet3 = new \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet($spreadsheet, 'Amano');
$myWorkSheet4 = new \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet($spreadsheet, 'Expenses');

$spreadsheet->getActiveSheet()->setTitle('Summary'); //set a title for Worksheet
$spreadsheet->addSheet($myWorkSheet2, 1);

//OVERALL


$sql_amano = "select sum(r_balance) as total from amano";
    $result_amano = mysqli_query($connection, $sql_amano);
while ($row_amano = mysqli_fetch_assoc($result_amano)){
    $sum_amano = $row_amano['total'];

}

$sql_amano_office = "select sum(r_balance) as total from amano where type='office'";
    $result_amano_office = mysqli_query($connection, $sql_amano_office);
while ($row_amano_office = mysqli_fetch_assoc($result_amano_office)){
    $sum_amano_office = $row_amano_office['total'];

}

$sql_dayn = "select sum(balance) as total from dayn";
    $result_dayn = mysqli_query($connection, $sql_dayn);
while ($row_dayn = mysqli_fetch_assoc($result_dayn)){
    $sum_dayn = $row_dayn['total'];

}


$sql_cash = "select sum(amount) as total from cash where status != 'Approved'";
    $result_cash = mysqli_query($connection, $sql_cash);
while ($row_cash = mysqli_fetch_assoc($result_cash)){
    $sum_cash = $row_cash['total'];

}

$sql_initial = "select sum(amount) as total from initial";
    $result_initial = mysqli_query($connection, $sql_initial);
while ($row_initial = mysqli_fetch_assoc($result_initial)){
    $sum_initial = $row_initial['total'];

}

$sql_drop = "select sum(amount) as total from drope";
    $result_drop = mysqli_query($connection, $sql_drop);
while ($row_drop = mysqli_fetch_assoc($result_drop)){
    $sum_drop = $row_drop['total'];

}


$sql_check_pending = "select sum(amount) as total from checks where status = 'Pending'";
    $result_check_pending = mysqli_query($connection, $sql_check_pending);
while ($row_check_pending = mysqli_fetch_assoc($result_check_pending)){
    $sum_check_pending = $row_check_pending['total'];

}

$sql_check_approved = "select sum(amount) as total from checks where status = 'Approved'";
    $result_check_approved = mysqli_query($connection, $sql_check_approved);
while ($row_check_approved = mysqli_fetch_assoc($result_check_approved)){
    $sum_check_approved = $row_check_approved['total'];

}

$sql_check_deposited = "select sum(amount) as total from checks where status = 'staged'";
    $result_check_deposited = mysqli_query($connection, $sql_check_deposited);
while ($row_check_deposited = mysqli_fetch_assoc($result_check_deposited)){
    $sum_check_deposited = $row_check_deposited['total'];

}


$sql_expenses = "select sum(r_balance) as total from expenses";
    $result_expenses = mysqli_query($connection, $sql_expenses);
while ($row_expenses = mysqli_fetch_assoc($result_expenses)){
    $sum_expenses = $row_expenses['total'];

}

//$total = -$sum_initial + $sum_dayn + $sum_drop - $sum_amano + $sum_cash + $sum_check_pending;
$total = -$sum_initial + $sum_dayn + $sum_drop - $sum_amano - $sum_amano_office + $sum_cash + $sum_check_pending + $sum_check_deposited - $sum_check_approved + $sum_expenses;










//add some data in DAYN
$spreadsheet->setActiveSheetIndex(1)
 ->setCellValue('C1', 'DAYN')
->setCellValue("J2", 'TOTAL:')
->setCellValue("K2", $sum_dayn)
 ->setCellValue('B2', 'Date')
 ->setCellValue('C2', 'Due Date')
 ->setCellValue('D2', 'Name')
 ->setCellValue('E2', 'Phone')
 ->setCellValue('F2', 'Amount')
 ->setCellValue('G2', 'Paid')
 ->setCellValue('H2', 'Balance');

$sql = "select * from dayn";
$qry = mysqli_query($connection, $sql);
    $i = 3;
while($result = mysqli_fetch_array($qry)){
$date = date('m/d/Y', $result['date']);
$due_date = date('m/d/Y', $result['due_date']);
$amount = "$".$result['amount'];
$spreadsheet->setActiveSheetIndex(1)
 ->setCellValue("B{$i}", $date)
 ->setCellValue("C{$i}", $due_date)
 ->setCellValue("D{$i}", $result['name'])
 ->setCellValue("E{$i}", $result['phone'])
 ->setCellValue("F{$i}", $result['amount'])
 ->setCellValue("G{$i}", $result['paid'])
 ->setCellValue("H{$i}", $result['balance']);
    $i++;
}
//set style for A1,B1,C1 cells
$cell_st =[
 'font' =>['bold' => true],
 'alignment' =>['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER],
 'borders'=>['bottom' =>['style'=> \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM]]
];
$spreadsheet->getActiveSheet()->getStyle('A1:C1')->applyFromArray($cell_st);

//set columns width
$spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(18);
$spreadsheet->getActiveSheet()->getStyle('B2:H2')->getFill()
    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()->setARGB('958623');
$spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(18);
$spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(18);
$spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(18);
$spreadsheet->getActiveSheet()->getStyle('F3:F1000')->getNumberFormat()->setFormatCode("$#.##0");
$spreadsheet->getActiveSheet()->getStyle('G3:G1000')->getNumberFormat()->setFormatCode("$#.##0");
$spreadsheet->getActiveSheet()->getStyle('H3:H1000')->getNumberFormat()->setFormatCode("$#.##0");
$spreadsheet->getActiveSheet()->getStyle('K2')->getNumberFormat()->setFormatCode("$#.##0");










$spreadsheet->addSheet($myWorkSheet3, 2);

//add some data in AMANO
$spreadsheet->setActiveSheetIndex(2)
 ->setCellValue('C1', 'AMANO')
 ->setCellValue("G2", 'TOTAL:')
->setCellValue("H2", $sum_amano)
 ->setCellValue('B2', 'Date')
 ->setCellValue('C2', 'Name')
 ->setCellValue('D2', 'Phone')
 ->setCellValue('E2', 'Balance');
$sql = "select * from amano where firstname != 'NULL'";
$qry = mysqli_query($connection, $sql);
    $i = 3;
while($result = mysqli_fetch_array($qry)){
$date = date('m/d/Y', $result['date']);
$spreadsheet->setActiveSheetIndex(2)
 ->setCellValue("B{$i}", $date)
 ->setCellValue("C{$i}", $result['firstname']." ".$result['lastname'])
 ->setCellValue("D{$i}", $result['phone'])
 ->setCellValue("E{$i}", $result['r_balance']);

    $i++;
}
//set style for A1,B1,C1 cells
$cell_st =[
 'font' =>['bold' => true],
 'alignment' =>['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER],
 'borders'=>['bottom' =>['style'=> \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM]]
];
$spreadsheet->getActiveSheet()->getStyle('A1:C1')->applyFromArray($cell_st);

//set columns width
$spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(18);
$spreadsheet->getActiveSheet()->getStyle('B2:E2')->getFill()
    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()->setARGB('958623');
$spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(18);
$spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(18);
$spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(18);
$spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(18);
$spreadsheet->getActiveSheet()->getStyle('E3:E1000')->getNumberFormat()->setFormatCode("$#.##0");
$spreadsheet->getActiveSheet()->getStyle('H2')->getNumberFormat()->setFormatCode("$#.##0");











$spreadsheet->addSheet($myWorkSheet4, 3);

//add some data in EXPENSES
$spreadsheet->setActiveSheetIndex(3)
 ->setCellValue('C1', 'EXPENSES')
  ->setCellValue("F2", 'TOTAL:')
->setCellValue("G2", $sum_expenses)
 ->setCellValue('B2', 'Date')
 ->setCellValue('C2', 'Description')
 ->setCellValue('D2', 'Balance');
$sql = "select * from expenses where description != 'NULL'";
$qry = mysqli_query($connection, $sql);
    $i = 3;
while($result = mysqli_fetch_array($qry)){
$date = date('m/d/Y', $result['date']);
$spreadsheet->setActiveSheetIndex(3)
 ->setCellValue("B{$i}", $date)
 ->setCellValue("C{$i}", $result['description'])
 ->setCellValue("D{$i}", $result['r_balance']);
    $i++;
}
//set style for A1,B1,C1 cells
$cell_st =[
 'font' =>['bold' => true],
 'alignment' =>['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER],
 'borders'=>['bottom' =>['style'=> \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM]]
];
$spreadsheet->getActiveSheet()->getStyle('A1:C1')->applyFromArray($cell_st);

//set columns width
$spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(18);
$spreadsheet->getActiveSheet()->getStyle('B2:D2')->getFill()
    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()->setARGB('958623');
$spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(18);
$spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(18);
$spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(18);
$spreadsheet->getActiveSheet()->getStyle('D3:D1000')->getNumberFormat()->setFormatCode("$#.##0");
$spreadsheet->getActiveSheet()->getStyle('G2')->getNumberFormat()->setFormatCode("$#.##0");




//add some data in Summary
$spreadsheet->setActiveSheetIndex(0)
 ->setCellValue('C1', 'SUMMARY')
 ->setCellValue('C3', 'Description')
 ->setCellValue('D3', 'Amount');

$spreadsheet->setActiveSheetIndex(0)
 ->setCellValue("C4", 'Initial')
 ->setCellValue("C5", 'Dayn')
 ->setCellValue("C6", 'Amano')
 ->setCellValue("C7", 'Dropped From hawala')
 ->setCellValue("C8", 'Cash')
 ->setCellValue("C9", 'Expenses')
 ->setCellValue("C10", 'Pending Checks')
 ->setCellValue("C11", 'Deposited Checks')
 ->setCellValue("C12", 'Overall')
 
 ->setCellValue("D4", $sum_initial)
 ->setCellValue("D5", $sum_dayn)
 ->setCellValue("D6", $sum_amano)
 ->setCellValue("D7", $sum_drop)
 ->setCellValue("D8", $sum_cash)
 ->setCellValue("D9", $sum_expenses)
 ->setCellValue("D10", $sum_check_pending)
 ->setCellValue("D11", $sum_check_deposited)
 ->setCellValue("D12", $total);

//set style for A1,B1,C1 cells
$cell_st =[
 'font' =>['bold' => true],
 'alignment' =>['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER],
 'borders'=>['bottom' =>['style'=> \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM]]
];
$spreadsheet->getActiveSheet()->getStyle('A1:C1')->applyFromArray($cell_st);

//set columns width
$spreadsheet->getActiveSheet()->getStyle('C3:D3')->getFill()
    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()->setARGB('958623');
$spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(18);
$spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(18);
$spreadsheet->getActiveSheet()->getStyle('D4:D14')->getNumberFormat()->setFormatCode("$#.##0");







//make object of the Xlsx class to save the excel file
$writer = new Xlsx($spreadsheet);
$fxls ='files/Summary.xlsx';
$writer->save($fxls);

$today = date("m-d-Y", time());

$file = "files/Summary.xlsx";

require_once("PHPMailer/PHPMailerAutoload.php");
 
$im = new PHPMailer;
$im->isSMTP();
$im->SMTPAuth = true;
// $im->SMTPDebug = 2;

$im->Host = 'smtpout.secureserver.net';
$im->Username = 'ajama26@techsom.info';
$im->Password = 'Abshir@26';
//$im->SMTPSecure = 'SSL';
$im->Port = 80;

$im->From = 'etawakalchi@gmail.com';
$im->FromName = 'Tawakal Chicago';
$im->AddReplyTo('etawakalchi@gmail.com', 'Reply Address');
$im->AddAttachment($file);
$im->addAddress('brotherabshir@gmail.com');

$im->Subject = "Daily Summary {$today}";
$im->Body = 'Waa daynta iyo amanada listigooda';
//$im->AltBody = "Final Test";

$placed = $im->send(); 


$final = "update settings set sent_email = '$today' where id = 1";
$final_query = mysqli_query($connection, $final);

?>
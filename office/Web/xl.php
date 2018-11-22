<?php

require_once("../data/combine.php");
require_once("../PHPExcel/Classes/PHPExcel.php");


if(isset($_POST['download'])){
    $name = "{$_POST['name']}.xlsx";

    global $connection;

    $sql = "select * from customer";


    $result1 = mysqli_query($connection, $sql);
    
    
    $phpexcel = new PHPExcel();
    $phpexcel->setactivesheetindex(0);

    global $cel;

    global $abdi;
    
    $cel = 2;
    while($abshir = mysqli_fetch_array($result1)){
    
    $cel_phone = $cel + 1;
    $cel_id = $cel + 2;
    $cel_weight = $cel + 3;
    $cel_title = $cel + 4;

    global $abdi;

    $abdi = $abshir['id'];

    $phpexcel->getactivesheet()->setcellvalue("A{$cel}", "Customer Name");
    $phpexcel->getactivesheet()->setcellvalue("B{$cel}", "{$abshir['first_name']} {$abshir['last_name']}");
    $phpexcel->getactivesheet()->setcellvalue("A{$cel_phone}", "Phone");
    $phpexcel->getactivesheet()->setcellvalue("B{$cel_phone}", "{$abshir['phone']}");
    $phpexcel->getactivesheet()->setcellvalue("A{$cel_id}", "ID");
    $phpexcel->getactivesheet()->setcellvalue("B{$cel_id}", "{$abshir['id']}");   
    $phpexcel->getactivesheet()->setcellvalue("A{$cel_weight}", "Total Weight");
    $phpexcel->getactivesheet()->setcellvalue("B{$cel_weight}", "weight");

    //$weight = $public->select_sum_column_where('products', 'weight', $abshir['id']);

    $phpexcel->getactivesheet()->setcellvalue("B{$cel_title}", "AWB");
    $phpexcel->getactivesheet()->setcellvalue("C{$cel_title}", "Length");
    $phpexcel->getactivesheet()->setcellvalue("D{$cel_title}", "Width");
    $phpexcel->getactivesheet()->setcellvalue("E{$cel_title}", "Height");
    $phpexcel->getactivesheet()->setcellvalue("F{$cel_title}", "Quantity");
    $phpexcel->getactivesheet()->setcellvalue("G{$cel_title}", "Weight");

    $phpexcel->getactivesheet()->getcolumndimension("A")->setautosize(true);
    $phpexcel->getactivesheet()->getcolumndimension("B")->setautosize(true);
    $phpexcel->getactivesheet()->getcolumndimension("C")->setautosize(true);
    $phpexcel->getactivesheet()->getcolumndimension("D")->setautosize(true);
    $phpexcel->getactivesheet()->getcolumndimension("E")->setautosize(true);
    $phpexcel->getactivesheet()->getcolumndimension("F")->setautosize(true);
    $phpexcel->getactivesheet()->getcolumndimension("G")->setautosize(true);


//     $cell = 7;
//     $sql = "select * from products where id  = {$abshir['id']}";
//     $result = mysqli_query($connection, $sql);
//     while($answer = mysqli_fetch_array($result)){
    
//     $phpexcel->getactivesheet()->setcellvalue("B{$cell}", $answer['awb']);
//     $phpexcel->getactivesheet()->setcellvalue("C{$cell}", $answer['length']);
//     $phpexcel->getactivesheet()->setcellvalue("D{$cell}", $answer['width']);
//     $phpexcel->getactivesheet()->setcellvalue("E{$cell}", $answer['height']);
//     $phpexcel->getactivesheet()->setcellvalue("F{$cell}", $answer['quantity']);
//     $phpexcel->getactivesheet()->setcellvalue("G{$cell}", $answer['weight']);

//     $cell++;
// }

$ahmed = $public->select_count_where('products', $abdi);

$cel = $cel + $ahmed + 9;
    
}

        $objwriter = new PHPExcel_Writer_Excel2007($phpexcel);
        $objwriter->save($name);


        header("location: Office_needs.php");

        
}

?>
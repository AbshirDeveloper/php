<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
$data = json_decode(file_get_contents("php://input"));
require_once("history_update.php"); 
global $connection;
//include "db.php";


$sql_cash = "select sum(amount) as total from cash where status = 'on'";
    $result_cash = mysqli_query($connection, $sql_cash);
while ($row_cash = mysqli_fetch_assoc($result_cash)){
    $sum_cashe = $row_cash['total'];
}

$sql_cash_count = "SELECT count(*) as total from cash where status = 'on'";
    $result_cash_count = mysqli_query($connection, $sql_cash_count);
while ($row_cash_count = mysqli_fetch_assoc($result_cash_count)){
    $sum_cashe_count = $row_cash_count['total'];
}

$today_real = time();
$initials = 'MS';
$unique = $sum_cashe_count + $sum_cashe;
$sql = "INSERT INTO ready (date, type, count, total, initials, uniq)
VALUES ('$today_real', 'Cash', $sum_cashe_count, $sum_cashe, '$initials', $unique)";
$qry = mysqli_query($connection, $sql);

$w = "update cash set status = 'staged', uniq = {$unique} where status = 'on'";

$yab = mysqli_query($connection, $w);

//if($data->description != null){
//
//  
//$time = time();
//
//$sql_amano = "select sum(idbalance) as total from amano";
//    $result_amano = mysqli_query($connection, $sql_amano);
//while ($row_amano = mysqli_fetch_assoc($result_amano)){
//    $sum_amano = $row_amano['total'];
//
//}
//
//$sql_dayn = "select sum(balance) as total from dayn";
//    $result_dayn = mysqli_query($connection, $sql_dayn);
//while ($row_dayn = mysqli_fetch_assoc($result_dayn)){
//    $sum_dayn = $row_dayn['total'];
//
//}
//
//
//$sql_cash = "select sum(amount) as total from cash where status != 'Approved'";
//    $result_cash = mysqli_query($connection, $sql_cash);
//while ($row_cash = mysqli_fetch_assoc($result_cash)){
//    $sum_cash = $row_cash['total'];
//
//}
//
//$sql_initial = "select sum(amount) as total from initial";
//    $result_initial = mysqli_query($connection, $sql_initial);
//while ($row_initial = mysqli_fetch_assoc($result_initial)){
//    $sum_initial = $row_initial['total'];
//
//}
//
//$sql_drop = "select sum(amount) as total from drope";
//    $result_drop = mysqli_query($connection, $sql_drop);
//while ($row_drop = mysqli_fetch_assoc($result_drop)){
//    $sum_drop = $row_drop['total'];
//
//}
//
//$sql_check = "select sum(amount) as total from checks";
//    $result_check = mysqli_query($connection, $sql_check);
//while ($row_check = mysqli_fetch_assoc($result_check)){
//    $sum_check = $row_check['total'];
//
//}
//
//
//$totale = $sum_initial - $sum_drop - $sum_dayn  + $sum_amano + $sum_cash + $sum_check;
//    
//$pertain = "Cash registery";
//    
//$sq = "INSERT INTO histor (time, pertain, status, transaction, new_balance)
//VALUES ('$time', '$pertain', 'Positive', $data->amount, $totale)";     
//$qr = mysqli_query($connection, $sq);    
//    
//}

?>
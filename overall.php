<?php
header("Access-Control-Allow-Origin: *");
//header("Content-Type: application/json; charset=UTF-8");


//$connection = mysqli_connect('localhost', 'abshir', 'abshir26', 'xafiis');
$connection = mysqli_connect('localhost', 'abshir', 'abshir26', 'etawakalchi');

//$dat = json_decode(file_get_contents("php://input"));

global $connection;

$data = array();

$sql_amano = "select sum(r_balance) as total from amano";
    $result_amano = mysqli_query($connection, $sql_amano);
while ($row_amano = mysqli_fetch_assoc($result_amano)){
    $sum_amano = $row_amano['total'];

}

$sql_dayn = "select sum(balance) as total from dayn";
    $result_dayn = mysqli_query($connection, $sql_dayn);
while ($row_dayn = mysqli_fetch_assoc($result_dayn)){
    $sum_dayn = $row_dayn['total'];

}


$sql_cash = "select sum(amount) as total from cash";
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

$sql_check = "select sum(amount) as total from checks where status != 'Confirmed'";
    $result_check = mysqli_query($connection, $sql_check);
while ($row_check = mysqli_fetch_assoc($result_check)){
    $sum_check = $row_check['total'];

}

$sql_checks = "select sum(amount) as total from checks where status = 'Approved'";
    $result_checks = mysqli_query($connection, $sql_checks);
while ($row_checks = mysqli_fetch_assoc($result_checks)){
    $sum_check_approved = $row_checks['total'];

}


//$total = $sum_initial - $sum_dayn - $sum_drop + $sum_amano + $sum_cash + $sum_check;
$total = -$sum_initial + $sum_dayn + $sum_drop - $sum_amano + $sum_cash + $sum_check - $sum_check_approved;

echo json_encode($total);




//    


?>
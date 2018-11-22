<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");


//$connection = mysqli_connect('localhost', 'abshir', 'abshir26', 'xafiis');
$connection = mysqli_connect('localhost', 'abshir', 'abshir26', 'etawakal');

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


$sql_check_pending = "select sum(amount) as total from checks where status != 'Approved'";
    $result_check_pending = mysqli_query($connection, $sql_check_pending);
while ($row_check_pending = mysqli_fetch_assoc($result_check_pending)){
    $sum_check_pending = $row_check_pending['total'];

}

$sql_check_approved = "select sum(amount) as total from checks where status = 'Approved'";
    $result_check_approved = mysqli_query($connection, $sql_check_approved);
while ($row_check_approved = mysqli_fetch_assoc($result_check_approved)){
    $sum_check_approved = $row_check_approved['total'];

}

$sql_check_deposited = "select sum(amount) as total from checks where status = 'Deposited'";
    $result_check_deposited = mysqli_query($connection, $sql_check_deposited);
while ($row_check_deposited = mysqli_fetch_assoc($result_check_deposited)){
    $sum_check_deposited = $row_check_deposited['total'];

}

$total = -$sum_initial + $sum_dayn + $sum_drop - $sum_amano + $sum_cash + $sum_check_pending;
$data = [$sum_initial, $sum_dayn, $sum_drop, $sum_amano, $sum_cash, $sum_check_pending, $sum_check_deposited ,$sum_check_approved, $total];


echo json_encode($data);




//    


?>
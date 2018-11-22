<?php 
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
$data = json_decode(file_get_contents("php://input"));
require_once("history_update.php"); 
global $connection;



$sqle = "select sum(balance) as total from expenses where id_customer = $data->id";
    $qry_sqle = mysqli_query($connection, $sqle);
while ($row_sqle = mysqli_fetch_assoc($qry_sqle)){
    $sum_sqle = $row_sqle['total'];
}
$credit = $data->amount;
$debit = 0;
$balance = $data->amount;
$r_balance = $sum_sqle + $balance;      

$today_real = time();
$sql = "INSERT INTO expenses (date, description_r, debit, credit, balance, id_customer, idbalance)
VALUES ('$today_real', '$data->description_r', $debit, $credit, $balance, $data->id, $r_balance)";

$sql_real_balance = "update expenses set r_balance = $r_balance where id = $data->id";

if($data->description_r){
$qry = mysqli_query($connection, $sql);
$query_real_balance = mysqli_query($connection, $sql_real_balance);
    
    
    
$jawaab_celing = $public->get_by_id('expenses', 'id', $data->id);
$nam_description = $jawaab_celing['description'];
$amount = $data->amount;


$pertain = "New expense for (".$nam_description.")";
$public->history_up($pertain, $amount);
    
    
    
$jaw = "success";
 echo json_encode($jaw); 
}
?>
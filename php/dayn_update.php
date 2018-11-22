<?php
require_once("header.php");
$data = json_decode(file_get_contents("php://input"));
require_once("history_update.php"); 
require_once("text.php"); 
global $connection;


$sq="SELECT amount as total FROM dayn where phone = '$data->phone_number'";

$result = mysqli_query($connection, $sq);

while ($row = mysqli_fetch_assoc($result)){
    $sum = $row['total'];
    
}   
   
if(!isset($sum)){

$today = time() + ($data->days * 24 * 60 *60);
$today_real = time();
$paid = 0;
$sql = "INSERT INTO dayn (name, phone, amount, date, due_date, paid, balance)
VALUES ('$data->name', '$data->phone_number', $data->amount, '$today_real', '$today', $paid, $data->amount)";
if($data->name != null){
    
$t = date('m/d/Y', $today_real);
$l = date('m/d/Y', $today);
    
$phone = $data->phone_number;
$message = "Waxaad qaadatay $".$data->amount." maanta oo taariikhdu tahay {$t}, waxaad balan qaadday inaad bixin doontid {$l}, fadlan lasoco xisaabtaada";

testing($phone, $message);    
    
$qry = mysqli_query($connection, $sql);
  
    
$pertain = "Dayn to {$data->name}";
    
$public->history_up($pertain, $data->amount);
}
} else {
$jaw = "no";
 echo json_encode($jaw);  
}
?>
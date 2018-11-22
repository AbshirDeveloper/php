<?php
require_once("header.php");
$data = json_decode(file_get_contents("php://input"));
require_once("history_update.php"); 
require_once("text.php"); 
global $connection;


$sql="SELECT r_balance as total FROM amano where phone = '$data->phone'";

$result = mysqli_query($connection, $sql);

while ($row = mysqli_fetch_assoc($result)){
    $sum = $row['total'];
    
}

if(!isset($sum)){
$time = time();



$sql = "INSERT INTO amano (firstname, lastname, phone, r_balance)
VALUES ('$data->firstname', '$data->lastname', '$data->phone', 0)";
if($data->firstname != null){
$qry = mysqli_query($connection, $sql);
$qry2 = mysqli_query($connection, $sq);
    
    
$phone = $data->phone;
$maanta = date('m/d/Y', time());
$message = "Kusoo dhawoow amano system keenna maanta oo taariikhdu tahay {$maanta}";

testing($phone, $message); 
    
$public->history_up("Registered Account for {$data->firstname} {$data->lastname}", 0);
    
    
}
}else {
    $jaw = "no";
 echo json_encode($jaw);   
}





////include "db.php";
//$sql = "INSERT INTO amano (firstname, lastname, phone, r_balance)
//VALUES ('$data->firstname', '$data->lastname', '$data->phone', 0)";
//if($data->firstname != null){
//$qry = mysqli_query($connection, $sql);
//}
    

?>
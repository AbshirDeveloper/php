<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
require_once("history_update.php"); 

$dat = json_decode(file_get_contents("php://input"));
require_once("text.php");

//$id = $_GET['id'];

global $connection;


$sql_dayn_paid = "select sum(paid) as total from dayn where id = '$dat->id'";
$result_dayn_paid = mysqli_query($connection, $sql_dayn_paid);
while ($row_dayn_paid = mysqli_fetch_assoc($result_dayn_paid)){
    $sum_dayn_paid = $row_dayn_paid['total'];
}

$am = "select sum(amount) as total from dayn where id = '$dat->id'";
$result_am = mysqli_query($connection, $am);
while ($row_am = mysqli_fetch_assoc($result_am)){
    $sum_am = $row_am['total'];
}


$t = $sum_dayn_paid + $dat->paid;
$bal = $sum_am - $t;

$sql = "UPDATE dayn
SET paid=$t, balance=$bal
WHERE id=$dat->id limit 1";
$result = mysqli_query($connection, $sql);


$ph = "select * from dayn where id = '$dat->id'";
$ph_sq = mysqli_query($connection, $ph);

while($phon = mysqli_fetch_array($ph_sq)){
    $phone_number = $phon['phone'];
    $name = $phon['name'];
}

$tod = date('m/d/Y', time());
   
if($bal >= 0){
$phone = $phone_number;
$message = "Waxaad bixisay $".$dat->paid." maanta oo taariikhdu tahay {$tod}, waxaa kugu harsan $".$bal.", fadlan lasoco xisaabtaada";

testing($phone, $message); 
} else {
$phone = $phone_number;
$real_bal = $bal * (-1);
$message = "Waxaad bixisay $".$dat->paid." maanta oo taariikhdu tahay {$tod}, waxaa adiga haraa kuu ah $".$real_bal.", fadlan lasoco xisaabtaada";

testing($phone, $message); 
}

$public->history_up("{$name} Dayn Baxshay", $dat->paid);

//    


?>
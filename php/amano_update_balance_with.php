<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
$data = json_decode(file_get_contents("php://input"));
require_once("text.php");
require_once("history_update.php"); 
global $connection;
//include "db.php";


$sql="SELECT sum(balance) as total FROM amano where customer_id = $data->id";

$result = mysqli_query($connection, $sql);

while ($row = mysqli_fetch_assoc($result)){
    $sum = $row['total'];

if($sum === 0){
    $idbalance = $data->amount;
} else {
   $idbalance = $sum - $data->amount; 
}

  
    
$deposit = 0;
$balance = $deposit - $data->amount;
$maanta = time();


$sql = "INSERT INTO amano (date, description, debit, deposit, balance, idbalance, customer_id)
VALUES ('$maanta','$data->des', '$data->amount', '$deposit', $balance, $idbalance, $data->id)";
if($data->des != null){
$qry = mysqli_query($connection, $sql);
    
    
$sql = "UPDATE amano
SET r_balance = $idbalance
WHERE id=$data->id";
    
$query = mysqli_query($connection, $sql);    
    
    
$time = time();
    
    
$dir = "select * from amano where id = $data->id";
$kasoo = mysqli_query($connection, $dir);
while($helid = mysqli_fetch_array($kasoo)){
$phone = $helid['phone'];
$maanta = date('m/d/Y', time());
if($idbalance >= 0 ){
$message = "Waxaad isticmaashay $".$data->amount." maanta oo taariikhdu tahay {$maanta}. Haraaga akoonkaagu waa $".$idbalance.". Lasoco xisaabtaada";
} else {
$real_bal = $idbalance * (-1);
$message = "Waxaad isticmaashay $".$data->amount." maanta oo taariikhdu tahay {$maanta}. Waxaa adiga lagugu leeyahay $".$real_bal.". Lasoco xisaabtaada";   
}
testing($phone, $message);  
}


    
    
$waydiin = "select * from amano where id = $data->id";

$hel = mysqli_query($connection, $waydiin);

while($ibrahim = mysqli_fetch_array($hel)){
    $name_amano = $ibrahim['firstname']." ".$ibrahim['lastname']; 
}
    
    
    
$pertain = "Amano transaction with {$name_amano} (Withdraw)";
    
$public->history_up($pertain, $data->amount);   
    
    
}
    }

?>
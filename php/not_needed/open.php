<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");


//$connection = mysqli_connect('localhost', 'abshir', 'abshir26', 'xafiis');
$connection = mysqli_connect('localhost', 'myuser', 'abshir26', 'etawakalchi');

$dat = json_decode(file_get_contents("php://input"));

//$id = $_GET['id'];

global $connection;


$dayn = "select * from dayn where id=$dat";
    $results = mysqli_query($connection, $dayn);
while ($rows = mysqli_fetch_array($results)){
    
$unique = time();
$id = $unique;
$amount = -$rows['balance'];

$sql = "INSERT INTO amano (firstname, lastname, phone, r_balance, type)
VALUES ('{$rows['name']}', '', '{$rows['phone']}', $amount, '$id')";       
    
$qr = mysqli_query($connection, $sql);
    

$d = "select * from amano where phone='{$rows['phone']}'";
    $res = mysqli_query($connection, $d);
while ($ro = mysqli_fetch_array($res)){    

   
    
    
 $amano = "select * from amano where phone='{$rows['phone']}'";
    $result = mysqli_query($connection, $amano);
while ($row = mysqli_fetch_array($result)){   
    
    
$deposit = 0;
$balance = $deposit - $amount;
$maanta = time();


$sq = "INSERT INTO amano (date, description, debit, deposit, balance, idbalance, customer_id)
VALUES ('$maanta','Transfered', '$balance', '$deposit', $amount, $amount, {$row['id']})";    

$res = mysqli_query($connection, $sq);    
    
}  
    
if($qr){
$s = "update dayn set type = '{$ro['id']}' where id= $dat";
$res = mysqli_query($connection, $s);
}

//    
}
}
?>
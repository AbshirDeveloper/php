<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
require_once("history_update.php"); 
global $connection;


$data = array();

$yesterday = time() - 86400;
$lastweek = time() - 604800;
$lastmonth = time() - 4*604800;
    
$sql="SELECT sum(balance) as total FROM dayn where date > $yesterday";

$result = mysqli_query($connection, $sql);

while ($row = mysqli_fetch_assoc($result)){
    $sum = $row['total'];
}


$sq="SELECT sum(balance) as total FROM dayn where date > $lastweek";

$resul = mysqli_query($connection, $sq);

while ($ro = mysqli_fetch_assoc($resul)){
    $su = $ro['total'];
}


$s="SELECT sum(balance) as total FROM dayn where date > $lastmonth";

$resu = mysqli_query($connection, $s);

while ($r = mysqli_fetch_assoc($resu)){
    $s = $r['total'];
}



$data = [$sum, $su, $s];

echo json_encode($data);   





//    


?>
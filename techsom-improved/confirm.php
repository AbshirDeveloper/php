<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");


//$connection = mysqli_connect('localhost', 'abshir', 'abshir26', 'xafiis');
$connection = mysqli_connect('localhost', 'abshir', 'abshir26', 'etawakalchi');

global $connection;


$data = json_decode(file_get_contents("php://input"));

$sql = "select * from ready where id = $data";

$result = mysqli_query($connection, $sql);

while($abshir = mysqli_fetch_array($result)){

if($abshir['type'] == 'Cash'){
    
$unique = $abshir['uniq'];
$sql = "delete from cash where uniq = {$unique}";
$sq = "update ready set state = 'confirmed' where uniq = {$unique}";
    
$qry = mysqli_query($connection, $sql);
$qr = mysqli_query($connection, $sq);
} elseif ($abshir['type'] == 'Checks'){
$unique = $abshir['uniq'];
$sql = "delete from checks where uniq = {$unique}";
$sq = "update ready set state = 'confirmed' where uniq = {$unique}";
    
$qry = mysqli_query($connection, $sql);    
$qr = mysqli_query($connection, $sq);
}
    
}






//    


?>
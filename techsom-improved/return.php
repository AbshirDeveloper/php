<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
$data = json_decode(file_get_contents("php://input"));


//$connection = mysqli_connect('localhost', 'abshir', 'abshir26', 'xafiis');
$connection = mysqli_connect('localhost', 'abshir', 'abshir26', 'etawakalchi');

global $connection;

$test = "select * from return_item where barcode = $data";

$ans = mysqli_query($connection, $test);

$ja = mysqli_fetch_array($ans);

if(!$ja){

$sql = "select * from sales where barcode = $data limit 1";

$result = mysqli_query($connection, $sql);

//$dat = array();

while($abshir = mysqli_fetch_array($result)){
    
$cost = $abshir['total']/$abshir['quantity'];
$sql = "insert into return_item (description, barcode, quantity, due) values ('{$abshir['description']}', $data, 1, $cost)";
$qry = mysqli_query($connection, $sql);     
}
} else {
    $new = $ja['quantity'] + 1;
    $retail = $ja['due'] / $ja['quantity'];
    $total = $retail * $new;
    $up = "update return_item set quantity=$new, due=$total where barcode = $data";
    $time = mysqli_query($connection, $up);
} 
//    
?>
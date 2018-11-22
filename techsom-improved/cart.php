<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
$data = json_decode(file_get_contents("php://input"));


//$connection = mysqli_connect('localhost', 'abshir', 'abshir26', 'xafiis');
$connection = mysqli_connect('localhost', 'abshir', 'abshir26', 'etawakalchi');

global $connection;

$test = "select * from cart_angular where barcode = $data";

$ans = mysqli_query($connection, $test);

$ja = mysqli_fetch_array($ans);

if(!$ja){

$sql = "select * from product_list where barcode = $data";

$result = mysqli_query($connection, $sql);

//$dat = array();

while($abshir = mysqli_fetch_array($result)){
$sql = "insert into cart_angular (description, quantity, tax, total, barcode, cost) values ('{$abshir['description']}', 1, 0, {$abshir['retail_sale']}, {$abshir['barcode']},{$abshir['retail_sale']})";
$qry = mysqli_query($connection, $sql);   
}
} else {
    $new = $ja['quantity'] + 1;
    $total = $ja['cost'] * $new;
    $up = "update cart_angular set quantity=$new, total=$total where barcode = $data";
    $time = mysqli_query($connection, $up);
} 
//    
?>
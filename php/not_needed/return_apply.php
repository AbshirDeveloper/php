<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
$data = json_decode(file_get_contents("php://input"));


//$connection = mysqli_connect('localhost', 'abshir', 'abshir26', 'xafiis');
$connection = mysqli_connect('localhost', 'myuser', 'abshir26', 'etawakalchi');

global $connection;

$try = "select * from return_item";
$answer = mysqli_query($connection, $try);

while($get = mysqli_fetch_array($answer)){

$date = date('m/d/Y', time());
    
$al = "insert into sales (date, quantity, p_method, total, sub_id, barcode, description, status) values ('{$date}',{$get['quantity']}, 'cash', {$get['due']}, 0, {$get['barcode']}, '{$get['description']}', 'returned')";

$query = mysqli_query($connection, $al);
    
$another = "select * from product_list where barcode = '{$get['barcode']}' limit 1";
    
$re = mysqli_query($connection, $another);
while($tan = mysqli_fetch_array($re)){
$q = $tan['quantity'] + $get['quantity'];    
    
$change = "update product_list set quantity= $q where barcode = '{$tan['barcode']}'";
$worked = mysqli_query($connection, $change);
}    
}   

$s="truncate return_item";

$resu = mysqli_query($connection, $s);
?>
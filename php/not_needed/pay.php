<?php
$data = json_decode(file_get_contents("php://input"));
$connection = mysqli_connect('localhost', 'myuser', 'abshir26', 'etawakalchi');

//$s="SELECT sum(id) as total FROM cart_angular";
//
//$resu = mysqli_query($connection, $s);
//
//while ($r = mysqli_fetch_assoc($resu)){
//    $sa = $r['total'];
//}

//$tran_id = time() - 1512761182;
//$status = "Cash";
$date = date('m/d/Y', time());
//$sql="SELECT sum(quantity) as total FROM cart_angular";
//
//$result = mysqli_query($connection, $sql);
//
//while ($row = mysqli_fetch_assoc($result)){
//    $sum = $row['total'];
//}
//
//
//
//$an="SELECT sum(total) as total FROM cart_angular";
//
//$ja = mysqli_query($connection, $an);
//
//while ($ru = mysqli_fetch_assoc($ja)){
//    $sm = $ru['total'];
//}





//$sq="SELECT count(id) as total FROM cart_angular";
//
//$resul = mysqli_query($connection, $sq); 
//
//while ($ro = mysqli_fetch_assoc($resul)){
//    $su = $ro['total'];
//}
//
//$all = "insert into sales (date, tran_id, quantity, types, status, total) values ('$date', $tran_id, $sum, $su, '$status', $sm)";
//$qry = mysqli_query($connection, $all);


$try = "select * from cart_angular";
$answer = mysqli_query($connection, $try);

while($get = mysqli_fetch_array($answer)){
    
$al = "insert into sales (date, quantity, p_method, total, sub_id, barcode, description, status) values ('{$date}',{$get['quantity']}, 'cash', {$get['total']}, 0, {$get['barcode']}, '{$get['description']}', 'sold')";

$query = mysqli_query($connection, $al);
    
$another = "select * from product_list where barcode = '{$get['barcode']}' limit 1";
    
$re = mysqli_query($connection, $another);
while($tan = mysqli_fetch_array($re)){
$q = $tan['quantity'] - $get['quantity'];    
    
$change = "update product_list set quantity= $q where barcode = '{$tan['barcode']}'";
$worked = mysqli_query($connection, $change);
}
    
$s="truncate cart_angular";

$resu = mysqli_query($connection, $s);
    
}
?>



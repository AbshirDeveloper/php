<?php require_once("../data/combine.php");
$public->login(); 
if(isset($_POST['submit'])){ 
	$product_name = $_POST['product_name'];
	$barcode = $_POST['barcode'];
	$amount = $_POST['amount'];
	$price = $_POST['price'];
	$registerer = $_SESSION['first_name'];
	$date = date("Y/m/d", time());
} else {
	$product_name = null;
	$amount = null;
	$price = null;
	$registerer = null;
	$date = null;
}

$array = array(
	'product_name' 			=> $product_name,
	'product_amount' 		=> $amount,
	'barcode' 				=> $barcode,
	'product_actual_price'  => $price,
	'registerer' 			=> $registerer,
	'date'  				=> $date
);
$result = $public->insert($array, 'data');
header ("location: ../Web/inventory.php?page=0");
?>

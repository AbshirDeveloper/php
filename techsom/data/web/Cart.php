<?php require_once("../data/combine.php");
require_once("../../PHPMailer/PHPMailerAutoload.php");

if(isset($_POST['order'])){

$customer_name = $_SESSION['name'];
$product_name = $_POST['product_name'];
$product_store = $_POST['product_store'];
$memo = $_POST['memo'];
$date = date("m/d/Y", time());

$table_name = 'orders';

$array = array(
	'customer_name' => $customer_name,
	'product_name' => $product_name,
	'store_name' => $product_store,
	'date'  => $date,
	'note'  => $memo
	);

$product_update = $public->insert($array, $table_name);

$im = new PHPMailer;
$im->isSMTP();
$im->SMTPAuth = true;
// $im->SMTPDebug = 2;

$im->Host = 'smtpout.secureserver.net';
$im->Username = 'ajama26@techsom.info';
$im->Password = 'Abshir@26';
// $im->SMTPSecure = 'ssl';
$im->Port = 80;

$im->From = 'ajama26@techsom.info';
$im->FromName = 'customer';
$im->AddReplyTo('ajama26@techsom.info', 'Reply Address');
$im->addAddress('brotherabshir@gmail.com');

$im->Subject = 'Customer placed an order';
$im->Body = $product_name . "<br />" . $memo  ;
$im->AltBody = $memo;

$placed = $im->send();

if($placed){
?>

<html>
<head>
	<title>SomTrack</title>
	<link rel="stylesheet" type="text/css" href="../data/public.css">
</head>
<body>
<?php require_once("../pages/header.php"); ?>
<div id="navigation"><center><?php require_once("../pages/navigations.php"); ?></center></div>
<div id="page">
<div id="order">
<div id="ordering">
<a href="#" class="button">Order Successfully added to your cart</a>
<span>You can keep shopping and submit your orders once</span>
<form action="Cart.php" method="post">
<input id="order_name" type="text" name="product_name" placeholder="Product Name"><br />
<br />
<input id="order_name" type="text" name="product_store" placeholder="Store"><br />
<br />
<textarea id="order_name" rows="4" cols="50" name="memo" placeholder="Your Memo here....."></textarea><br />
<br />
<input id="order_button" type="submit" name="order" value="Place Order">
</form>
</div>
<div id="midier"></div>
<div id="tracking">
<a href="#" class="button">Track order</a>
<form>
	<input id="order_name" type="number" name="tracking" placeholder="Tracking #"><br />
	<br />
	<input id="order_button" type="submit" name="track" value="Track">
</form>
</div>
</div>
</div>	
<?php require_once("../pages/footer.php"); ?>

<?php
} else {
	echo "error occurred";
}
}

if(isset($_SESSION['name'])){
?>
<!DOCTYPE html>
<html>
<head>
	<title>SomTrack</title>
	<link rel="stylesheet" type="text/css" href="../data/public.css">
</head>
<body>
<?php require_once("../pages/header.php"); ?>
<div id="navigation"><center><?php require_once("../pages/navigations.php"); ?></center></div>
<div id="page">
<div id="order">
<div id="ordering">
<a href="#" class="button">Start Order</a>
<form action="Cart.php" method="post">
<input id="order_name" type="text" name="product_name" placeholder="Product Name"><br />
<br />
<input id="order_name" type="text" name="product_store" placeholder="Store"><br />
<br />
<textarea id="order_name" rows="4" cols="50" name="memo" placeholder="Your Memo here....."></textarea><br />
<br />
<input id="order_button" type="submit" name="order" value="Place Order">
</form>
</div>
<div id="midier"></div>
<div id="tracking">
<a href="#" class="button">Track order</a>
<form>
	<input id="order_name" type="number" name="tracking" placeholder="Tracking #"><br />
	<br />
	<input id="order_button" type="submit" name="track" value="Track">
</form>
</div>
</div>
</div>	
<?php require_once("../pages/footer.php"); ?>
<?php
}else {



// from here you not logged in



?>
<!DOCTYPE html>
<html>
<head>
	<title>DurDur</title>
	<link rel="stylesheet" type="text/css" href="../data/public.css">
</head>
<body>
<?php require_once("../pages/header.php"); ?>
<div id="navigation"><center><?php require_once("../pages/navigations.php"); ?></center></div>
<?php require_once("order.php"); ?>	
<?php require_once("../pages/footer.php"); ?>
<?php
}
?>
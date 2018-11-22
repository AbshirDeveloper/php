<?php require_once("../data/sessions.php"); ?>
<?php require_once("../data/database_connection.php"); ?>
<?php require_once("../data/functions.php"); ?>
<?php $public->login(); ?>	

<?php

if (isset($_GET['id']) && $_GET['id'] == 1){
	$cart = $public->select_all('cart');
	while($result = mysqli_fetch_array($cart)){
		$product_name = $result['name'];
		$cart2 = $public->select_where('data', 'product_name', $product_name);
		$amount = $cart2['product_amount'] + $result['amount'];
		$public->update_single('data', $amount, $product_name);
	}
	global $connection;
	$query = "truncate cart";
	mysqli_query($connection, $query);
	header("location: ../web/cart.php");
} 
?>
<htm>
<head>
<link rel="stylesheet" type="text/css" href="../data/public.css" />
</head>
<body>

</body>
</htm>

<form id="forme" action="register_success.php" method="post">
<p><span id="login"></span></p>
<center><h1> Payment </h1></center>
<?php 
//$query = "select * from dayn";
$result = $public->select_all('dayn');	
?>
Name <select name="name">
	<?php while ($array = mysqli_fetch_array($result)) {
	?>
	<option name="name"> <?php echo $array['name']; ?></option><?php  } ?></select> <br />
	<br />
Amount <input id="sad" type="number" name="amount" value=""> <br />
	<br />
<input type="submit" name="payment" value="PAID">
	
<input type="submit" name="cancelvalue" value="CANCEL"         
     onClick="self.close()">
</form>

<script> function event() {
	document.getElementById("forme").onsubmit = function() {
		
	if(document.getElementById("mid").value == "" || document.getElementById("labo").value == "" || document.getElementById("sadex").value == ""){
	document.getElementById("login").innerHTML = "Please provide the correct info";
	document.getElementById("login").style.color = "red";
	return false;
} else {
	document.getElementById("login").innerHTML = "";
	return true;
}
		};
}
	

window.onload = function() {
	event();
}</script>
<?php require_once("../data/combine.php");
$public->login(); 
if(isset($_POST['submit']) && $_POST['barcode'] == null){
	$name = $_POST['name'];
	$quantity = 1;
	$table = "data";
	$attribute = "product_name";
	$result = $public->select_where($table, $attribute, $name);
	if($result){
	$barcode = $result['barcode'];
	$total = $result['product_actual_price'] * $quantity;
	$products = array(
			'barcode' => $barcode,
			'name' => $name,
			'amount' => $quantity,
			'total' => $total
		);
	$public->insert($products, 'cart');
	$new_quantity = $result['product_amount'] - $quantity;
	$public->update_single('data', $new_quantity, $name);
	} else {
	?> 
		<script>
		window.alert("Ma haysid badeecadaan");
		</script>
	<?php
	}
	header("location: ../web/cart.php");
} elseif(isset($_POST['submit']) && $_POST['name'] == null){
	$barcode = $_POST['barcode'];
	$quantity = 1;
	$table = "data";
	$attribute = "barcode";
	$result = $public->select_where($table, $attribute, $barcode);
	if($result){
	$name = $result['product_name'];
	$total = $result['product_actual_price'] * $quantity;
	$products = array(
			'name'  => $name,
			'barcode' => $barcode,
			'amount' => $quantity,
			'total' => $total
		);
	$public->insert($products, 'cart');
	$new_quantity = $result['product_amount'] - $quantity;
	$public->update_single('data', $new_quantity, $name);
	} else {
	?> 
		<script>
		window.alert("badeecadaan ma haysid");
		</script>
	<?php
	}
	header("location: ../web/cart.php");
} 

?>

<div id="main">
<div id="page">
<h3>Your have successfully registered, please click <a href="login.php">here</a> to login with your new credentials </h3>
</div>
<div id="navigation">
</div>
</div>
<div id="footer"><h3>Chicago Office, <?php echo date("Y", time()); ?></h3></div>
</body>
</html>
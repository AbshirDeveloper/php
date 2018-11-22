
<?php require_once("database_connection.php"); ?>
<?php require_once("sessions.php"); ?>
<?php require_once("functions.php"); ?>
<?php $public->login(); ?>	

<?php
if(isset($_POST['submit'])){
	$_SESSION['product_name'] = $_POST['product_name'];
	$_SESSION['amount'] = $_POST['amount'];
	$array = $public->select_where('data', 'product_name', $_SESSION['product_name']); 	
	$product = $array['product_name'];
	$_SESSION['price'] = $array['product_actual_price'];
	$new_amount = $array['product_amount'] + $_POST['amount'];


		$array = array(
		'product_amount' => $new_amount
		);
		//$query = "update data set product_amount = {$new_amount} where product_name = '{$product}' ";
		$result = $public->update($array, 'data', 'product_name', $product);
		header("location: ../web/inventory.php");
		} elseif ($_POST['delete']) {
		$product_delete = $_POST['product_name'];
		//$query ="delete from data where product_name = '{$product_delete}'";
		$result = $public->delete('data', 'product_name', $product_delete);
		if (!$result) {
			printf("Error: %s\n", mysqli_error($connection));
			exit();
		} else {
			header ("location: ../web/inventory.php");
		}	
		}
?>

<html>
<head>
	
</head>
<body>

</body>
</html>

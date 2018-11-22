<?php 
require_once("../data/Database_connection.php"); 
require_once("../data/Functions.php");
require_once("../data/sessions.php");

if(isset($_GET['page'])){
		$id = $_GET['page'];
		$_SESSION['add_id'] = $id;
		global $connection;
		$sql = "select * from products where id_customer = {$id} limit 1";
		$result = mysqli_query($connection, $sql);
		while($customer = mysqli_fetch_array($result)){
			$_SESSION['add_awb'] = $customer['awb'];
			$_SESSION['add_sender'] = $customer['sender_name'];
			$_SESSION['add_sender_phone'] = $customer['sender_phone'];
			$_SESSION['add_per_kg'] = $customer['per_kg'];
		}
	header("location: Office_needs.php?page=0");
} elseif(isset($_GET['id'])){
		$id_two = $_GET['id'];
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

</body>
</html>

<?php
} elseif(isset($_GET['clean'])){
	unset($_SESSION['add_id']);
	unset($_SESSION['add_awb']);
	unset($_SESSION['add_sender']);
	unset($_SESSION['add_sender_phone']);
	unset($_SESSION['add_per_kg']);
	header("location: Office_needs.php?page=0");
}

 ?>

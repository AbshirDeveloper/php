<?php

require_once("../data/combine.php"); 

if(isset($_POST['email']) &&  isset($_POST['password'])){
		$value = $_POST['bussiness'];
		$attribute = "email = '{$_POST['email']}' and password = '{$_POST['password']}'";
		$result = $public->select_where_more('login', $attribute);
		if($result){
		$_SESSION['name'] = $result['first_name'];
		$_SESSION['id'] = $result['id'];
		$_SESSION['company_name'] = $result['company_name'];
		$_SESSION['company_email'] = $result['email'];
		$bussiness = $result['business'];
		$status = $result['status'];
		if($status == 'pending'){
		header("location: ../pending.php");
		}elseif($status == 'denied'){
		header("location: ../pending.php?page=denied");
		} elseif($status == 'confirming'){
		header("location: ../pending.php?con=1");
		} else {
		if($bussiness == 'Other'){
		header("location: Cart.php");
		} elseif ($bussiness == 'Hawala') {
		header("location: ../hawala.html");
		} elseif ($bussiness == 'Restaurant') {
		header("location: ../restaurant.html");
		} elseif ($bussiness == 'Shipment') {
		header("location: ../shipping/Web/Office_needs.php?page=0");
		} elseif ($bussiness == 'admin') {
		header("location: Cart.php");
		}
		}
	} else {
		header("location: ../wrong.html");
	}
} else {
	header("location: ../index.html");
}

?>
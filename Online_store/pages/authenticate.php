<?php
require_once("../data/combine.php");

if(isset($_POST['login']) && !isset($_SESSION['name'])){
	$sql = "select * from login where username = '{$_POST['username']}' and password = '{$_POST['password']}'";
	$result = $public->get_by_sql($sql);
	if($result){
	$sql = "select * from login";
	$result = $public->get_by_sql($sql);
	$_SESSION['name'] = $result['first_name'];
	header("location: ../web/home.php");
	} else {
		header("location: ../web/login.php?id=2");
	}
} else {
	header("location: ../web/home.php?id=3");
}
?>
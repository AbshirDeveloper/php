<?php
require_once("../data/combine.php");

if(isset($_POST['create'])){
	$table_name = 'login';
	$array = array(
		'first_name' => ucfirst($_POST['first_name']),
		'last_name' => ucfirst($_POST['last_name']),
		'username' => ucfirst($_POST['username']),
		'password' => ucfirst($_POST['password']),
		'email' => ucfirst($_POST['email'])
		);
	$public->insert($array, $table_name);
	header("location: ../web/home.php");
}
?>
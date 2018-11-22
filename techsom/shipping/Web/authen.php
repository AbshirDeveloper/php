<?php

require_once("../data/combine.php"); 

if(isset($_POST['username']) &&  isset($_POST['password'])){
		$attribute = "username = '{$_POST['username']}' and password = '{$_POST['password']}'";
		$result = $public->select_where_more('login', $attribute);
		if($result){
		$_SESSION['name'] = $result['first_name'];
		$_SESSION['id'] = $result['id'];
		header("location: Cart.php");
	} else {
		header("location: ../wrong.html");
	}
} else {
	header("location: ../index.html");
}

?>
<?php

require_once("../data/sessions.php"); 

if(isset($_POST['username']) &&  isset($_POST['password'])){
	if($_POST['username'] == 'abshir' && $_POST['password'] == 'abshir26'){
		$_SESSION['name'] = $_POST['username'];
		header("location: Cart.php");
	} else {
		header("location: ../wrong.html");
	}
}

?>
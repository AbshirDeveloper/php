<?php 
require_once("../data/combine.php");
if(isset($_GET['id']) && $_GET['id'] == 3){
?> 
<script>window.alert("Someone is already logged in, You can't sign in untill they logout");</script>
<?php
} elseif (isset($_GET['id']) && $_GET['id'] == 5){
?><script>window.alert("successfully logged out, see you soon"); </script>
<?php
} 
?>
<?php 
if(isset($_SESSION['name'])){
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
<div id="page"></div>	
<?php require_once("../pages/footer.php"); ?>
<?php




//from here, you are not logged in





} else {
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
<div id="page">
</div>	
<?php require_once("../pages/footer.php"); ?>
<?php
}
?>


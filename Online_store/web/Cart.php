<?php require_once("../data/combine.php");
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
<div id="page">
<div id="ordering">
<a href="#" class="button">Start Order</a>
</div>
<div id="Tracking">
<a href="#" class="button">Track order</a>
</div>
</div>	
<?php require_once("../pages/footer.php"); ?>
<?php
}else {



// from here you not logged in



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
<?php 
require_once("../data/sessions.php");
require_once("../data/Database_connection.php");
require_once("../data/Functions.php"); 

if(isset($_POST['delete_customer'])){
	global $connection;
    $id = $_POST['id'];
    $public->delete_customer($id);
    header("location: Office_needs.php?page=0");
} elseif(isset($_POST['delete_product'])){
	global $connection;
    $awb = $_POST['id'];
    $public->delete_product($awb);
    header("location: Office_needs.php?page=0");
}
?>
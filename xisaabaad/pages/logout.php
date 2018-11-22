<?php require_once("../data/combine.php");
$public->login(); 
session_unset(); 
header ("Location: ../web/login.php");
?>
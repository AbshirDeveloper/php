<?php require_once("combine.php"); 
$public->login();
$restult = $public->delete('dayn', 'balance', 0);
header ("location: ../web/xisaab.php");

?>

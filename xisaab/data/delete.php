<?php require_once("combine.php"); ?>
<?php $public->login(); ?>	
<?php

$restult = $public->delete('dayn', 'balance', 0);
header ("location: ../web/xisaab.php");

?>

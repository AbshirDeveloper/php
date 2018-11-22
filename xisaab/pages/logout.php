<?php require_once("../data/combine.php"); ?>
<?php $public->login(); ?>
<?php session_unset(); ?>

<?php

header ("Location: ../web/login.php");

?>
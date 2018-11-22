<?php
require_once("../data/sessions.php");


session_unset();

header("location: ../index.html");

?>
<?php
require_once("../data/sessions.php");
session_destroy();
header("location: ../web/home.php?id=5");
?>
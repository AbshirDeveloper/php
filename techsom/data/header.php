<?php require_once("sessions.php"); ?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../data/public.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>	
<title>Xisaab</title>
</head>
<body>
<div id="header">
<div id="header_inf">
<span>For help, please call <span id="contanct_colored">(312) 409-3514</span> or Email at: <span id="contanct_colored">ajama26@techsom.info</span> </span><br /><hr />
<span>Your are signed in as <span id="contanct_colored"><?php echo ucfirst($_SESSION['name']); ?></span> </span>	
</div>
</div>
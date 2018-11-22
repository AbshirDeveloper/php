<?php require_once("../data/sessions.php"); ?>
<?php require_once("../data/functions.php"); ?>
<?php $public->login(); ?>	
<htm>
<head>
<link rel="stylesheet" type="text/css" href="../data/public.css" />
</head>
<body>

</body>
</htm>

<form id="forme" action="register_success.php" method="post">
<p><span id="login"></span></p>
<center><h1> Register </h1></center>
Name <input id="labo" type="text" name="name" value=""> <br />
	<br />
Phone <input id="labo" type="number" name="phone" value=""> <br />
	<br />
Amount <input id="sadex" type="number" name="amount" value=""> <br />
	<br />
Days to pay <input id="sadex" type="number" name="days" value=""> <br />
	<br />
<input type="submit" name="register" value="Register">
	
<input type="submit" name="cancelvalue" value="CANCEL"         
     onClick="self.close()">
</form>

<script> function event() {
	document.getElementById("forme").onsubmit = function() {
		
	if(document.getElementById("mid").value == "" || document.getElementById("labo").value == "" || document.getElementById("sadex").value == ""){
	document.getElementById("login").innerHTML = "Please provide the correct info";
	document.getElementById("login").style.color = "red";
	return false;
} else {
	document.getElementById("login").innerHTML = "";
	return true;
}
		};
}
	

window.onload = function() {
	event();
}</script>
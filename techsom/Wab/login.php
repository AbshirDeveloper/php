<?php require_once("../data/combine.php"); 
require_once("../data/header.php"); ?>
<div id="main">
<div id="page">

<form id="form" action="../pages/login2.php" method="post">
	<p><span id="login"></span></p>
	<h3>Please login</h3>
	Username <input id="mid" type="text" name="username" value=""></br>
	</br>
	Password <input id="mid" type="password" name="password" value=""></br>
	</br>
	<input type="submit" name="submit" value="Submit">
</form>	
<script> 
function event() {
	document.getElementById("form").onsubmit = function() {
		
	if(document.getElementById("mid").value == ""){
	document.getElementById("login").innerHTML = "Please provide your login info";
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
</div>
<div id="navigation">
</div>
</div>
<?php require_once("../data/footer.php"); ?>
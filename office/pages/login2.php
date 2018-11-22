<?php require_once("../data/combine.php");
if(isset($_POST['submit'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	//$query = "select * from login where ";
	$attribute = "username = '{$username}' and password = '{$password}'";
	$result = $public->select_where_more('login', $attribute);
	if($result != null){
		$_SESSION['first_name'] = $result['first_name'];
		header ("location: ../web/cart.php");
		}
} else {
?>
<?php require_once("../data/header.php"); ?>
<div id="main">
<div id="page">

<form id="form" action="login2.php" method="post">
	<p><span id="login">Wrong password and username</span></p>
	<p><span id="login"></span></p>
	<h3>Please login</h3>
	Username <input id="mid" type="text" name="username" value=""></br>
	</br>
	Password <input id="mid" type="password" name="password" value=""></br>
	</br>
	<input type="submit" name="submit" value="Submit">
</form>	
<script> function event() {
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
<div id="footer"><h3>Chicago Office, <?php echo date("Y", time()); ?></h3></div>
</body>
</html>
<?php
}
?>
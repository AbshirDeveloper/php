<?php require_once("../data/combine.php"); ?>
<?php $public->login(); ?>

<div id="main">
<div id="page">
<form id="form" action="../data/check.php" method="post">
<p><span id="error"></span></p>
<h3>Please register</h3>
<table border="1">
First Name <input id="mid" type="text" name="first_name" value=""></br>
</br>	
Last Name <input id="labo" type="text" name="last_name" value=""></br>
</br>
Username <input id="sadex" type="text" name="username" value=""></br>
</br>
Password <input id="afar" type="password" name="password" value=""></br>
</br>
Confirm Password <input id="shan" type="password" name="confirm_password" value=""></br>
</br>
<input type="submit" name="submit" value="submit">

Already Registered? <a href="../web/login.php">Login</a>

<script type="text/javascript">

function event() {
					document.getElementById("form").onsubmit = function() {
					if(document.getElementById("mid").value == "" || document.getElementById("labo").value == "" || document.getElementById("sadex").value == "" || document.getElementById("afar").value == "" || document.getElementById("shan").value == ""|| document.getElementById("afar").value !== document.getElementById("shan").value){
					document.getElementById("error").innerHTML = "Please fill all the fields and make sure that your two passwords are equal";
					return false;
					} else {
					document.getElementById("error").innerHTML = "You have successfully registered";
					return true;
					}
					};
					}
	window.onload = function(){
		event();
	}

</script>
</table>
</form>
</div>	

<div id="navigation">
</div>
</div>
<?php require_once("../data/footer.php"); ?>
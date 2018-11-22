<?php require_once("../data/combine.php"); ?>
<?php require_once("../data/sessions.php"); ?>
<link rel="stylesheet" type="text/css" href="../data/public.css">
<div id="main">
<?php require_once("../data/header.php"); ?>
<div id="page">
<form id="form" action="../data/check.php" method="post">
<p><span id="error"></span></p>
<h3>Please register</h3>
<table border="1">
First Name <input id="mid" type="text" name="first_name" value=""></br>
</br>	
Last Name <input id="labo" type="text" name="last_name" value=""></br>
</br>
Company Name <input id="labo" type="text" name="name" value=""></br>
</br>
Company Phone <input id="labo" type="text" name="phone" value=""></br>
</br>
Company Address <input id="labo" type="text" name="address" value=""></br>
</br>
Username <input id="sadex" type="text" name="username" value=""></br>
</br>
Password <input id="afar" type="password" name="password" value=""></br>
</br>
Confirm Password <input id="shan" type="password" name="confirm_password" value=""></br>
</br>
<input type="submit" name="submit" value="submit">


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
	<script>
	function asking(){
		document.getElementById("black").onclick = function(){
			var sir = window.prompt("Fadlan gali numberkaaga sirta ah si aad isu qortid");
			if(sir){
				if(sir === '773'){
					return true;
				} else {
				window.alert("Waa khalad numberka aad galisay");
				return false;	
				}
			} else {
				return false;
			}
		}

		document.getElementById('logout').onclick = function(){
			var log = confirm('Click OK to logout or CANCEL to stay');
			if(log === true){
				return true;
			} else {
				return false;
			}
		}
	
	}

	</script>
	<ul id="kow">
	<a href="../Web/Cart.php"><button id="button"><h2>Cart</h2></button></a></br>
	<a href="../Web/inventory.php?page=0"><button id="button"><h2>Inventory</h2></button></a></br>
	<a href="../Web/calculations.php"><button id="button"><h2>Calculations</h2></button></a></br>
	<a href="../Web/Office_needs.php"><button id="button"><h2>Store needs</h2></button></a></br>
	<a href="../Web/Xisaab.php"><button id="button"><h2>Dayn</h2></button></a></br>
	<a href="../Web/staffschedule.php"><button id="button"><h2>Staff Schedule</h2></button></a></br>
	<a href="../Web/staffaccounts.php"><button id="button"><h2>Staff Accounts</h2></button></a></br>
	<a href="../Web/notes.php"><button id="button"><h2>Notes</h2></button></a></
	<hr />
	<h2 id="sagaal"><?php echo "if you are not " . "" . $_SESSION['name']. ", please "; ?> <a id="logout" href="../Web/logout.php">Logout</a></h2> <br/>


	Or <a id="black" href="../pages/register.php">Register</a>
	</ul>
</div>
</div>
<?php require_once("../data/footer.php"); ?>
	<?php require_once("sessions.php"); ?>
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


	document.getElementById("button.inv").onclick = function() {
	window.open('invoice.php', 'thePopup', 'width=900,height=900');
	}

	
	}


	</script>
	<ul id="kow">
	<a href="Cart.php"><button id="button"><h2>Cart</h2></button></a></br>
	<a href="inventory.php?page=0"><button id="button"><h2>Inventory</h2></button></a></br>
	<a href="calculations.php"><button id="button"><h2>Calculations</h2></button></a></br>
	<a href="Office_needs.php?page=0"><button id="button"><h2>Store needs</h2></button></a></br>
	<a href="Xisaab.php"><button id="button"><h2>Dayn</h2></button></a></br>
	<a href="staffschedule.php"><button id="button"><h2>Staff Schedule</h2></button></a></br>
	<a href="staffaccounts.php"><button id="button"><h2>Staff Accounts</h2></button></a></br>
	<a href="notes.php"><button id="button"><h2>Notes</h2></button></a>
	<a href="#" id="button.inv"><button id="button"><h2>Invoice</h2></button></a>
	<hr />
	<h2 id="sagaal"><?php echo "if you are not " . "" . $_SESSION['name']. ", please "; ?> <a id="logout" href="../Web/logout.php">Logout</a></h2> <br/>

	Or <a id="black" href="../pages/register.php">Register</a>
	</ul>

	
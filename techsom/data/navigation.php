	<?php require_once("sessions.php"); ?>
	<script>
	function asking(){

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
	<a href="Cart.php"><button class="cart" id="button"><h2>Cart</h2></button></a></br>
	<a href="inventory.php?page=0"><button class="inventory" id="button"><h2>Inventory</h2></button></a></br>
	<a href="calculations.php?page=0"><button class="sales" id="button"><h2>Sales History</h2></button></a></br>
	<!-- <a href="Office_needs.php?page=0"><button id="button"><h2>Store needs</h2></button></a></br> -->
	<a href="Xisaab.php?page=0"><button class="dayn" id="button"><h2>Dayn</h2></button></a></br>
	<a href="amano.php?page=0"><button class="amaano" id="button"><h2>Amaano</h2></button></a></br>
	<a href="balance.php"><button class="balance" id="button"><h2>Balance sheet</h2></button></a></br>
	<a href="notes.php?page=0"><button class="extended" id="button"><h2>Extended dayn</h2></button></a>
	<a href="#" id="button.inv"><button class="invoice" id="button"><h2>Invoice</h2></button></a>
	<?php if($_SESSION['company_email'] == 'ajama26@techsom.info'){
	?>
	<a href="../Web/admin.php"><button class="extended2" id="button"><h2>New Customers</h2></button></a>
<?php
} ?>
	<hr />
	<h2 id="sagaal"><?php echo "if you are not " . "" . $_SESSION['name']. ", please "; ?> <a id="logout" href="../Web/logout.php">Logout</a></h2> <br/>
	</ul>

	
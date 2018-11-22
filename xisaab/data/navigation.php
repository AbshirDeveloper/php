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
	<button id="button"><a href="Cart.php"><h2>Cart</h2></a></button>
	<button id="button"><a href="Inventory.php?page=1"><h2>Inventory</h2></a></button>
	<button id="button"><a href="Calculations.php"><h2>Calculations</h2></a></button>
	<button id="button"><a href="Office_needs.php"><h2>Store needs</h2></a></button>
	<button id="button"><a href="Xisaab.php"><h2>Dayn</h2></a></button>
	<button id="button"><a href="Notes.php"><h2>Notes</h2></a></button>
	</ul>

	
<?php 
require_once("../data/sessions.php");
require_once("../data/Functions.php"); 
$public->login();

require_once("../data/header.php");
?>
<link rel="stylesheet" type="text/css" href="../data/public.css">
<div id="main">
<div id="page">
<form id="forme" action="invoice.php" method="post">
<span><center>Fadlan Iska hubi inaad meel ku xaraysatid invoiceka aad samayn doontid. Waxaa dhici karta inaadan dib uhelin. invoice numberku isagaa automatic isu samaynaya waa numbero kala duwan. invoice walba oo cusub wuxuu yeelan doonaa invoice number cusub</center></center></span><br />
<br />
Customer Name <input id="labo" type="text" name="name"><br />
<br />
Item <input id="labo" type="text" name="item"><br />
<br />
Quantity <input id="labo" type="number" name="quantity"><br />
<br />
Description <input id="labo" type="text" name="description"><br />
<br />
Total Amount <input id="labo" type="number" name="total"><br />
<br />
Amount Paid <input id="labo" type="number" name="paid"><br />
<br />
<input type="submit" name="create" value="Create"><br />
<br />
<input type="submit" name="Send" value="Send to Email">
</form>
</div>
<div id="navigation">
<?php require_once("../data/navigation.php") ?>
<script>
window.onload = function(){
		asking();
	}
</script>
</div>
</div>
<?php require_once("../data/footer.php"); ?>
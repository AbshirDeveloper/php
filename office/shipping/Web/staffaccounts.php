<?php require_once("../data/header.php");
require_once("../data/sessions.php"); 
require_once("../data/Functions.php"); 
$public->login();
?>
<div id="main">
<div id="page"></div>
<div id="navigation">
<?php require_once('../data/navigation.php'); ?>
<script>
window.onload = function(){
		asking();
	}
</script>	
</div>
<?php require_once("../data/footer.php"); ?>
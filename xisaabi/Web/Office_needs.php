<?php require_once("../data/combine.php");
$public->login(); ?>
<?php require_once("../data/header.php"); ?>
<div id="main">
<div id="page">
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
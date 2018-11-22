<?php

require_once("../includes/initiate.php");
session::is_loged_in();
?>
<?php
$said = "";

if(isset($_GET['clear'])){
	$file = "../logs/log.txt";
	file_put_contents($file, "");
	$said = "file cleared by {$_SESSION['user_id']}";
}

?>

<?php include_layout_template('header.php');?>

	<div id="main">
	<h2>You've successfully loged in</h2>
		
	<a href="logfile.php?clear=true">Clear log file</a>
	<?php echo $said; ?>
	<hr />
		
	<?php $abshir = read_log();
	echo $abshir;
	?>
	</div>
<?php include_layout_template('header.php');?>
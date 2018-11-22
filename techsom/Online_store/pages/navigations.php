<?php require_once("../data/combine.php"); ?>
<link rel="stylesheet" type="text/css" href="../data/public.css">

<a href="home.php"><button id="button">Home</button></a>
<a href="about.php"><button id="button">About Us</button></a>
<a href="Cart.php"><button id="button">Order</button></a>
<a href="How_To.php"><button id="button">How To It Works</button></a>
<a href="partners.php"><button id="button">Our Partners</button></a>
<div class="dropdown">
<a href="membership.php"><button id="button">Members</button></a>
<?php if(!isset($_SESSION['name'])){
?>
<!-- <div class="dropdown-content">
	<a href="membership.php">About Membership</a>
	<a href="login.php">Login</a>
	<a href="register.php">Register</a>
</div> -->
<?php } else {
?>
<!-- <div class="dropdown-content">
	<a href="membership.php">About Membership</a>
	<a href="../pages/logout.php">Logout <span id="login_name"><?php if(isset($_SESSION['name'])) { echo ucfirst($_SESSION['name']); } ?></span></a>
</div> -->
<?php
 } ?>
</div>

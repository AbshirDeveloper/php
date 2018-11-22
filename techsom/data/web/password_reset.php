<?php

require_once("../data/combine.php");


if(isset($_GET['id'])){

$id = $_GET['id'];

global $conneciton;

$sql = "select * from customer_login where reset = '{$id}'";
$reseting = mysqli_query($connection, $sql);
$reset = mysqli_fetch_array($reseting);
$reset_id = $reset['id'];
$_SESSION['id_reseting'] = $reset_id;

if($reset){
?>
<html>
<head>
  <title>SomTrack</title>
</head>
<body>
<?php require_once("../pages/header.php"); ?>
<div id="navigation"><center><?php require_once("../pages/navigations.php"); ?></center></div>
<div id="page">

<div class="login-page">
  <div class="form">
  <span id="green">Reset Your password</span>
    <form id="class" class="login-form" action="password_reset.php" method="post">
    <span id="red"></span>
    <br/>
    <br/>
      <input id="kow" type="password" name="new_password" placeholder="New Password"/>
      <input id="labo" type="password" name="confirmed_password" placeholder="Confirm New Password"/>
      <input id="green" type="submit" name="update" value="UPDATE">
      <p class="message">OR <a href="login.php">LOGIN</a></p>
      <script type="text/javascript" src="../data/js.js"></script>
    </form>
  </div>
</div>
</div>
<?php require_once("../pages/footer.php"); ?>
</body>
</html>
<?php
}else{
?>
<html>
<head>
  <title>SomTrack</title>
</head>
<body>
<?php require_once("../pages/header.php"); ?>
<div id="navigation"><center><?php require_once("../pages/navigations.php"); ?></center></div>
<div id="page">
<div class="login-page">
 <div class="form">
  <span id="green"></span>
    <form id="class" class="login-form" action="forgot.php" method="post">
    <span id="red">This Link Doesn't exist, please check if it wasn't expired</span>
    <br/>
    <br/>
      <script type="text/javascript" src="../data/js.js"></script>
    </form>
  </div>
</div>
</div>
<?php require_once("../pages/footer.php"); ?>
</body>
</html>

<?php
}

}elseif(isset($_POST['update'])){

$password = $_POST['new_password'];

global $connection;

$sql3 = "update customer_login set password = '{$password}' where id = {$_SESSION['id_reseting']}";
$done = mysqli_query($connection, $sql3);

$sql4 = "UPDATE customer_login SET reset = NULL WHERE id = {$_SESSION['id_reseting']}";
$done4 = mysqli_query($connection, $sql4);
?>
<html>
<head>
  <title>SomTrack</title>
</head>
<body>
<?php require_once("../pages/header.php"); ?>
<div id="navigation"><center><?php require_once("../pages/navigations.php"); ?></center></div>
<div id="page">
<div class="login-page">
 <div class="form">
  <span id="green"></span>
    <form id="class" class="login-form" action="forgot.php" method="post">
    <span id="green">You have successfully reseted your password, click <a href="login.php">Here</a> to login</span>
    <br/>
    <br/>
      <script type="text/javascript" src="../data/js.js"></script>
    </form>
  </div>
</div>
</div>
<?php require_once("../pages/footer.php"); ?>
</body>
</html>
<?
}else {
	header("location: login.php");
}


?>
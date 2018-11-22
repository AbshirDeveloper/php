<?php
if(isset($_GET['id']) && $_GET['id'] == 2){
?>
<link rel="stylesheet" type="text/css" href="../data/public.css">
<!DOCTYPE html>
<html>
<head>
	<title>SomTrack</title>
  <script type="text/javascript" src="../data/js.js"></script>
</head>
<body>
<?php require_once("../pages/header.php"); ?>
<div id="navigation"><center><?php require_once("../pages/navigations.php"); ?></center></div>
<div id="page">
<div class="login-page">
  <div class="form">
    <form id="class" class="login-form" action="../pages/authenticate.php" method="post">
    <span id="red"><b>Wrong username and password!</b>  please try again</span>
    <br/>
    <br/>
      <input id="labo" type="text" name="username" placeholder="Username"/>
      <input id="labo" type="password" name="password" placeholder="Password"/>
      <input id="green" type="submit" name="login" value="LOGIN">
      <p class="message">Not registered? <a href="register.php">Create an account</a></p>
      <p class="message">Fogot password? <a href="forgot.php">Click here</a>
      <script type="text/javascript" src="../data/js.js"></script>
    </form>
  </div>
</div>
</div>
<?php require_once("../pages/footer.php"); ?>
</body>
</html>
<?php
} else {
?>
<link rel="stylesheet" type="text/css" href="../data/public.css">
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <script type="text/javascript" src="../data/js.js"></script>
</head>
<body>
<?php require_once("../pages/header.php"); ?>
<div id="navigation"><center><?php require_once("../pages/navigations.php"); ?></center></div>
<div id="page">
<div class="login-page">
  <div class="form">
    <form id="class" class="login-form" action="../pages/authenticate.php" method="post">
    <span id="red"></span>
    <br/>
    <br/>
      <input id="labo" type="text" name="username" placeholder="Username"/>
      <input id="labo" type="password" name="password" placeholder="Password"/>
      <input id="green" type="submit" name="login" value="LOGIN">
      <p class="message">Not registered? <a href="register.php">Create an account</a></p>
      <p class="message">Fogot password? <a href="forgot.php">Click here</a>
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
?>
	

<?php
require_once("../data/combine.php");

if(isset($_POST['retreive'])){
  $name = $_POST['first_name'];
  $email = $_POST['email'];

  $attribute = "first_name = '{$name}' and email = '{$email}'";
  $table_name = 'customer_login';

  $retreive = $public->select_where_more($table_name, $attribute);

if($retreive){

require_once("../../PHPMailer/PHPMailerAutoload.php");
$column_to_update = 'reset';
$new_value = time() - 456743;
$corresponding_column = 'email';
$name_column = $name; 
$table_name = 'customer_login';

// $password = $public->update_single($table_nam, $column_to_update, $new_value, $corresponding_column, $name_column);

global $connection;

$sql = "update customer_login set reset = '{$new_value}' where email = '{$email}' limit 1";
$password = mysqli_query($connection, $sql);

if($password){

$message = "Your Reset code is: ".$new_value;
$message2 = "Please click on this link http://somtruck.techsom.info/web/password_reset.php?id={$new_value}";
} else {
  echo "failed";
}

$im = new PHPMailer;
$im->isSMTP();
$im->SMTPAuth = true;
// $im->SMTPDebug = 2;

$im->Host = 'smtpout.secureserver.net';
$im->Username = 'ajama26@techsom.info';
$im->Password = 'Abshir@26';
// $im->SMTPSecure = 'ssl';
$im->Port = 80;

$im->From = 'ajama26@techsom.info';
$im->FromName = 'Somtruck';
$im->AddReplyTo('ajama26@techsom.info', 'Reply Address');
$im->addAddress($email);

$im->Subject = 'Somtruck Account password resset';
$im->Body = $message . "<br />" . $message2;
$im->AltBody = $message;

$placed = $im->send();

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
  <span id="green">We have successfully found your information and emailed you a confirmation code</span>
    <form id="class" class="login-form" action="forgot.php" method="post">
    <span id="red"></span>
    <br/>
    <br/>
      <input id="kow" type="text" name="first_name" placeholder="First name"/>
      <input id="labo" type="text" name="email" placeholder="Email address"/>
      <input id="green" type="submit" name="retreive" value="RETREIVE">
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
  } else {
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
  <span id="red">We couldn't find your information, please try again</span>
    <form id="class" class="login-form" action="forgot.php" method="post">
    <span id="red"></span>
    <br/>
    <br/>
      <input id="kow" type="text" name="first_name" placeholder="First name"/>
      <input id="labo" type="text" name="email" placeholder="Email address"/>
      <input id="green" type="submit" name="retreive" value="RETREIVE">
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
  }
} else {
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
    <form id="class" class="login-form" action="forgot.php" method="post">
    <span id="red"></span>
    <br/>
    <br/>
      <input id="kow" type="text" name="first_name" placeholder="First name"/>
      <input id="labo" type="text" name="email" placeholder="Email address"/>
      <input id="green" type="submit" name="retreive" value="RETREIVE">
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
}
?>
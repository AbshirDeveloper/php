<?php require_once("data/combine.php"); ?>

<?php 
if(isset($_GET['page'])){
	$text = "Your account has been denied. Please contact customer support at 3124093514 for further explanation. Thank you";
?>
<style>
	#labo {
		color: red;
	}
</style>
<?php
} elseif(isset($_GET['con'])){
	$text = "We have sent you a confirmation email. Please click the link in the email to confirm your registration. Thank you";
?>
<style>
	#labo {
		color: green;
	}
</style>
<?php	
} elseif(isset($_GET['confirm'])){
	$id = $_GET['confirm'];
	global $connection;
	$query = "update login set status = 'pending' where id = {$id}";
	$result = mysqli_query($connection, $query);
	$text = "Thank you for confirming your email. Your account is still pending to be accepted. Within 24 hours you will be able to enjoy with our service. Thank you";
	
	require_once("PHPMailer/PHPMailerAutoload.php");
	
	$ask = "select * from login where id = {$id}";
	$answer = mysqli_query($connection, $ask);
	$res = mysqli_fetch_array($answer);
	
	$email = $res['email'];
	$name = $res['first_name'];

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
$im->FromName = 'Techsom';
$im->AddReplyTo('ajama26@techsom.info', 'Reply Address');
$im->addAddress($email);

global $connection;
	
$query = "select * from login where email = '{$email}'";
$result = mysqli_query($connection, $query);

$array = mysqli_fetch_array($result);

$im->Subject = 'Techsom New Account Confirmation';
$im->Body = "Hi {$name}, we have successfuly approved your techsom account. You can now go ahead and login to enjoy using our service. We are looking forward to seeing you";
$im->AltBody = "Hi {$name}, we have successfuly approved your techsom account. You can now go ahead and login to enjoy using our service. We are looking forward to seeing you";

$placed = $im->send();

?>
<style>
	#labo {
		color: black;
	}
</style>
<?php

}else {
	$text = "Your account is still pending to be accepted. Within 24 hours you will be able to enjoy with our service. Thank you";

?>
<style>
	#labo {
		color: blue;
	}
</style>
<?php

}
?>
<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="keywords" content="">
    <meta name="description" content="">

  <!-- stylesheets css -->
  <link rel="stylesheet" href="css/bootstrap.min.css">

    <link rel="stylesheet" href="css/magnific-popup.css">

  <link rel="stylesheet" href="css/animate.min.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">

    <link rel="stylesheet" href="css/nivo-lightbox.css">
    <link rel="stylesheet" href="css/nivo_themes/default/default.css">

    <link rel="stylesheet" href="css/hover-min.css">
    <link rel="stylesheet" href="css/flexslider.css">

  <link rel="stylesheet" href="css/style.css">


    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,600' rel='stylesheet' type='text/css'>

</head>
<body>

<!-- Preloader section -->
<div class="preloader">
  <div class="sk-spinner sk-spinner-pulse"></div>
</div>


<!-- Home section -->
<section id="home" class="parallax-section">
  <div class="gradient-overlay"></div>
 
      

          <div class="col-md-offset-2 col-md-8 col-sm-12">
              <a href="index.html"><h1 class="wow fadeInUp" data-wow-delay="0.6s">Techsom</h1></a>
              <p class="wow fadeInUp" data-wow-delay="1.0s">Xisaabiyahaaga Gaarka Ah</p>
<style>

.login-page {
  width: 360px;
  padding: 8% 0 0;
  margin: auto;

}
.form {
  position: relative;
  z-index: 1;
  background: #FFFFFF;
  max-width: 360px;
  margin: 0 auto 100px;
  padding: 45px;
  text-align: center;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}
.form input {
  font-family: "Roboto", sans-serif;
  outline: 0;
  background: #f2f2f2;
  width: 100%;
  border: 0;
  margin: 0 0 15px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
}
.form button {
  font-family: "Roboto", sans-serif;
  text-transform: uppercase;
  outline: 0;
  background: #4CAF50;
  width: 100%;
  border: 0;
  padding: 15px;
  color: #FFFFFF;
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
}
.form button:hover,.form button:active,.form button:focus {
  background: #43A047;
}
.form .message {
  margin: 15px 0 0;
  color: #b3b3b3;
  font-size: 12px;
}
.form .message a {
  color: #4CAF50;
  text-decoration: none;
}
.form .register-form {
  display: none;
}
.container {
  position: relative;
  z-index: 1;
  max-width: 300px;
  margin: 0 auto;
}
.container:before, .container:after {
  content: "";
  display: block;
  clear: both;
}
.container .info {
  margin: 50px auto;
  text-align: center;
}
.container .info h1 {
  margin: 0 0 15px;
  padding: 0;
  font-size: 36px;
  font-weight: 300;
  color: #1a1a1a;
}
.container .info span {
  color: #4d4d4d;
  font-size: 12px;
}
.container .info span a {
  color: #000000;
  text-decoration: none;
}
.container .info span .fa {
  color: #EF3B3A;
}
#login_header{
  float: right;
  margin-right: 20px;
  margin-top: 50px;
  background-color: 
}
#page {
  background-color: 
  width: 100%;
  height: 100%;
  margin-top: 0px;
}
.dropbtn {
    background-color: lightyellow;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}

.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: lightgreen;
    min-width: 180px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown-content a:hover {background-color: #f1f1f1}

.dropdown:hover .dropdown-content {
    display: block;
}

.dropdown:hover .dropbtn {
    background-color: green;
}
#login_name {
  color: blue;
}

#green {
  background-color: lightgreen;
}
#customer {
  width: 300px;
  float: right;
  background-color: lightpurple;
  text-align: right;
}
#red {
  color: red;
}
#sawir {
  height: 150px;
  width: 300px;
}
#magac {
  color: red;
}
#referal {
  background-color: lightgreen;
}
#order {
  color: green;
  width: 200px;
  height: 100px;
}


a.button {
  font-family: 'PT Sans', arial, serif;
  color:#ffffff;
  text-align:center;
  font-size:24px;
  font-weight:bold;
  padding:10px;
  
  text-shadow: /* Simulating Text Stroke */
        -1px -1px 0 #000, 
        1px -1px 0 #000, 
        -1px 1px 0 #000, 
        1px 1px 0 #000;
  
  border: 1px solid rgba(0,0,0,0.5);
  border-bottom: 3px solid rgba(0,0,0,0.5);
  
  -webkit-border-radius: 3px;
  -moz-border-radius: 3px;
  border-radius: 3px;
  
  background: rgba(0,0,0,0.25);

    -o-box-shadow: 
        0 2px 8px rgba(0,0,0,0.5),
        inset 0 1px rgba(255,255,255,0.3),
        inset 0 10px rgba(255,255,255,0.2),
        inset 0 10px 20px rgba(255,255,255,0.25),
        inset 0 -15px 30px rgba(0,0,0,0.3);

    -webkit-box-shadow: 
        0 2px 8px rgba(0,0,0,0.5),
        inset 0 1px rgba(255,255,255,0.3),
        inset 0 10px rgba(255,255,255,0.2),
        inset 0 10px 20px rgba(255,255,255,0.25),
        inset 0 -15px 30px rgba(0,0,0,0.3);

    -moz-box-shadow:
        0 2px 8px rgba(0,0,0,0.5),
        inset 0 1px rgba(255,255,255,0.3),
        inset 0 10px rgba(255,255,255,0.2),
        inset 0 10px 20px rgba(255,255,255,0.25),
        inset 0 -15px 30px rgba(0,0,0,0.3);
  
  box-shadow: 
        0 2px 8px rgba(0,0,0,0.5), /* Exterior Shadow */
        inset 0 1px rgba(255,255,255,0.3), /* Top light Line */
        inset 0 10px rgba(255,255,255,0.2), /* Top Light Shadow */
        inset 0 10px 20px rgba(255,255,255,0.25), /* Sides Light Shadow */
        inset 0 -15px 30px rgba(0,0,0,0.3); /* Dark Background */

  margin: 40px;
  display: inline-block;
  text-decoration: none;
}

#kow {
  background-color: 
}

#header { 
  height: 190px; 
  margin: 0; padding: 0; text-align: left;
  background-image: url(data/logo.png);
  background-size: 610px 150px;
  background-repeat: no-repeat;
  background-color: 
}
#pose {
  margin-top: 0px;
  float: right;
  height: 150px;
  width: 300px;
}
#all {
  width: 900px;
  margin-left: 190px;
  height: 100px;
  background-color: grey;

}
#footer {
  height: 70px;
}

#box {
  width: 350px;
  height: 50px;
  background-color: yellow;
}

#qoral {
  font-size: 250%;
}
</style>
<div class="login-page">
  <div class="form">
<span id="labo"><?php echo $text; ?></span>
  </div>
</div>
          </div>

      </div>
    </div>
</section>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>

<script src="js/jquery.magnific-popup.min.js"></script>

<script src="js/jquery.sticky.js"></script>
<script src="js/jquery.backstretch.min.js"></script>

<script src="js/isotope.js"></script>
<script src="js/imagesloaded.min.js"></script>
<script src="js/nivo-lightbox.min.js"></script>

<script src="js/jquery.flexslider-min.js"></script>

<script src="js/jquery.parallax.js"></script>
<script src="js/smoothscroll.js"></script>
<script src="js/wow.min.js"></script>

<script src="js/custom.js"></script>
      <script> 
function event() {
  document.getElementById("class").onsubmit = function() {
    
  if(document.getElementById("labo").value == ""){
  document.getElementById("red").innerHTML = "Please provide your login info";
  return false;
} else {
  document.getElementById("red").innerHTML = "";
  return true;
}
    };
}
  

window.onload = function() {
  event();
}</script>

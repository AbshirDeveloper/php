<?php

require_once("../includes/initiate.php");
session::is_loged_in();


?>
<?php

if(isset($_POST['submit'])) {
$username = $_POST['username'];
$password = $_POST['password'];	
$ibrahim = user::authenticate($username, $password);


$message = $ibrahim->first_name;
$logged = "logged in as: ";
log_action($logged, $message);
	
if($ibrahim){
	session::login($ibrahim);
	redirect_to("index.php");
} else {
	$message =  "you have entered the wrong password and username";
}
} else {
$username = "";
$password = "";
}

?>

<?php include_layout_template('header.php');?>
	<div id="main">
		<h2>Staff Login</h2>
		<form action="login.php" method="post">
			<input type="text" name="username" value=""></br>
		<input type="password" name="password" value=""></br>
		<input type="submit" name="submit" value="Submit">
		</form>
	</div>
<?php include_layout_template('footer.php');?>
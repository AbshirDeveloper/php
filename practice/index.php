<?php
if(isset($_POST['password'])){
		$test = $_POST['password'];
		$password = "abshir";
		$hash_format = "$2y$10$";
		$salt = "Salt22charactersormore";
		$format_and_salt = $hash_format . $salt;
		$hash = crypt($test, $format_and_salt);
	
		echo $hash;	
}
?>
<html>
<head>
	
	</head>
<body>
	
	<div>
	<form action="index.php" method="post">
		<input type="password" name="password" value="">
		<input type="submit" name="submit" value="submit">
 		
		</form>
	
	</div>
	
	</body>
</html>
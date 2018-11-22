<?php
// See the password_hash() example to see where this came from.
if(isset($_POST['submit'])){
$password = $_POST['submit'];
$hashed_password = password_hash($password, PASSWORD_BCRYPT);
$hash = '$2y$07$BCryptRequires22Chrcte/VlQH0piJtjXl.0t1XkA8pw9dMXTpOq';

if (password_verify('rasmuslerdorf', $hashed_password)) {
    echo 'Password is valid!';
} else {
    echo 'Invalid password.';
}
}
?>

<html>
<head>
</head>
<body>

<div>

<form action="example.php" method="post">
<input type="password" name="password" value="">
<input type="submit" name="submit" value="submit">
	
</form>
</div>
	
</body>

</html>
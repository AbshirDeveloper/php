<?php
$dbhost = "localhost";
$dbuser   = "cosmetic_exp";
$dbpass = "abshir26";
$dbname = "cosmetics";

$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
?>
<?php
if (!empty ($_POST['username']) && !empty($_POST['password'] )) {
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $query = "select * from admin where username = '$user' and password = '$pass'";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_array($result);
    if($row) {
     header("location: home.php");   
    } else {
        header("location: login.php");
    }
    } else {
    $user = null;
    $pass = null;
    echo "no emptyness";
}          
?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="public.css">
</head>
<body>
<div id="main">
</div>    
</body>


</html>
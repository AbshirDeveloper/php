<?php require_once("db_connection.php"); ?>
<?php require_once("session.php"); ?>
<?php require_once("functions.php"); ?>

<?php
if (!empty ($_POST['username']) && !empty($_POST['password'] )) {
    $user = $_POST['username'];
    $pass = $_POST['password'];
    
   $password = hashed_pass($pass);
    
    $query = "select * from admin where username = '$user' and password = '$password'";
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
<?php $_SESSION['id'] = $row['id']; ?>

</html>


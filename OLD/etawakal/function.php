<?php require_once("db_connection.php"); ?>

<?php
if (isset($_POST['product']) && isset($_POST['quantity'])) {
    $product = $_POST['product'];
    $quantity = $_POST['quantity'];
} else {
    $product = null;
    $quantity = null;
} 
?>
<?php
$check = "select * from cosmetic where product_name = '$product'";
$jawab = mysqli_query ($connection, $check);
while ($real = mysqli_fetch_assoc($jawab)) {
   $actual = $real['quantity'] - $quantity; 
}

?>
<?php
$query = "update cosmetic set quantity = $actual where product_name ='$product'";
$result = mysqli_query($connection, $query);
if($result) {
   echo "Successfully Updated, to go back to the page, Please click"; ?> <a href="home.php"> Here </a> <?php
} else {
    echo mysqli_error($connection);
}
?>
<?php
?>

<html>
<head>
<title>Etawakal Cosmetics</title>
<link rel="stylesheet" type="text/css" href="public.css">
    
</head>
<body>
    

</body>


</html>
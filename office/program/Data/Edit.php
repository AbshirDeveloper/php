<?php require_once("database_connection.php"); ?>

<?php
if($_GET['id'] = 1){
    
    function products(){
    global $connection;
    $query = "truncate products";
    $result = mysqli_query($connection, $query); 
    } 
    
    function customer(){
    global $connection;
    $query1 = "truncate customer";
    $result1 = mysqli_query($connection, $query1);
    }
    
    products();
    customer();
    header ("location: ../pages/home.php"); 
}
?>
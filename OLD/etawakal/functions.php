<?php require_once("session.php"); ?>

<?php
function logged_in(){
    return isset($_SESSION['id']);
}

function confirm_logged_in(){
    if(!logged_in()){
    header ("Location: login.php");
    } 
}
?>
<?php

function logout() {
   $_SESSION['id'] = null;
   $_SESSION['username'] = null;
}

?>

<?php 

function hashed_pass($pass){
    $hashed_pass = "$2y$10$";
    $salt = "makeit22charactersormore";
    $hashed_salted = $hashed_pass . $salt;
    $password = crypt($pass, $hashed_salted);
    return $password;
}

?>
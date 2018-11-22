<?php require_once("db_connection.php"); ?>
<?php require_once("db_session.php"); ?>

<?php 
if ($_GET['page']) {
    $page_id = $_GET['page'];
}

$query = "select * from pages where id = $page_id";
$result = mysqli_query($connection, $query);
$kow = mysqli_fetch_assoc($result);


if($kow) {
    $labo = $kow['page_name'] . "." . "php";
    header("Location: $labo");
}
?>


<?php require_once("db_connection.php"); ?>
<?php require_once("db_session.php"); ?>

<?php 
    $query_sub = "select * from subjects";
    
    $result_sub = mysqli_query($connection, $query_sub);

?>
<?php 
if ($_POST['xisaab']) {
    $_SESSION['amount'] = $_POST['xisaab'];
    $ali = $_SESSION['amount'];
    $query1 = "truncate xisaab";
    $result = mysqli_query($connection, $query1);
    $query = "insert into xisaab (balance) values ($ali)";
    $result = mysqli_query($connection, $query);
} else {
    $_SESSION['$amount'] = false;
    header("Xisaab Guud.php");
}
?>
<html>
<head>
    <title>New Page</title>
    <link rel="stylesheet" type="text/css" href="style.css" >
</head>
<body>
<div id="header">
<h1>Etawakal</h1>
</div>
<div id="content">
<div id="nav">
<ul><?php 
    while ($subject = mysqli_fetch_assoc($result_sub)) {
        ?>
    <li>
        <b><?php echo $subject['subject_name']; ?></b>
    </li>
    <?php 
        $idi = $subject['id'];
        $query_pag = "select * from pages where page_id = $idi";
        $result_pag = mysqli_query($connection, $query_pag);
        while ($page = mysqli_fetch_assoc($result_pag)) {
            ?>
        <li id="indent">
        <a href="operator.php?page=<?php echo $page['id'];?>"><?php echo $page['page_name']; ?>
        </a></li>
        <?php
        } ?>
    <?php
    }
    ?>
</ul>
</div>
<div id="main">
<h3> Drop here </h3>
<form action="Xisaab Guud.php" method="post">
<input type="number" name="xisaab" value="">
<input type="submit" name="submit" value="Submit">
</form>
</div>
<div id="sidebar">
<h3> Balance </h3>
<?php 
$query = "select * from xisaab";
$result = mysqli_query($connection, $query);
$real = mysqli_fetch_assoc($result);
$_SESSION['one'] = $real['balance'];
echo $_SESSION['one'];
?>
</div>
<div id="footer">
<h4> Waa web cusub </h4>
</div>
</div>

</body>
    
</html>
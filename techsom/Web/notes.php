<?php require_once("../data/header.php");
require_once("../data/sessions.php"); 
require_once("../data/Functions.php"); 
$public->login();
if(isset($_POST['post'])){
	$array = array(
	'name' => $_POST['name'],
	'title' => $_POST['title'],
	'message' => $_POST['note'],
	'time' => date("m/d/Y h:m:s", time())
	);
	$result = $public->insert($array, 'note');
	if($result){
	header("location: notes.php");
	} else {
	return false;
}
} elseif (isset($_GET['id'])) {
	$id = $_GET['id'];
	$result = $public->delete('note', 'id', $id);
	header ("location: notes.php");
} elseif (isset($_POST['send'])){
	// mostly the same variables as before
	// ($to_name & $from_name are new, $headers was omitted) 
	$to_name = 'Important';
	$to = 'brotherabshir@gmail.com';
	$subject = $_POST['title'];
	$message = $_POST['note'];
	$from_name = 'Abshir Jama';
	$from = 'brotherabshir@gmail.com';
	
	// PHPMailer's Object-oriented approach
	$mail = new PHPMailer();
		

	if(isset($_POST['cc'])){
		$cc = $_POST['cc'];
		$name = $_POST['name'];
		$mail->AddCC($cc, $name);
	}
	
	$mail->AddReplyTo('brotherabshir@gmail.com', 'Abshir Jama');
	//$mail->AltBody = "This is the body in plain text for non-HTML mail clients";

	// Can use SMTP
	// comment out this section and it will use PHP mail() instead
	$mail->IsSMTP();
	$mail->Host     = 'techsom.info';
	$mail->Port     = 25;
	$mail->SMTPAuth = false;
	$mail->Username = 'brotherabshir@gmail.com';
	$mail->Password = 'Abshir55';
	
	// Could assign strings directly to these, I only used the 
	// former variables to illustrate how similar the two approaches are.
	$mail->FromName = $from_name;
	$mail->From     = $from;
	$mail->AddAddress($to, $to_name);
	$mail->Subject  = $subject;
	$mail->Body     = $message;

	$mail->AddAttachment($_FILES['file_upload']['tmp_name'],
                         $_FILES['file_upload']['name']);      // attachment
	$mail->Send();
	
}elseif(isset($_GET['page'])){
    global $page; 
    $page = $_GET['page'];
    $_SESSION['page'] = $page;
    $offset = $page * 30;
    global $mid; 
    $mid = $public->offset_dayn_late($offset);
}
require_once("../data/header.php"); ?>
<div id="main">
<style>
	#kow .extended {
		background-color: blue;
		color: white;
	}
	#pagination {
		width: 690px;
	}
</style>
<div id="page">
<table>
<h2><center>Xisaab Daahday</center></h2>
<tr>
	<td id="table">Expected</td>
	<td id="name">Name</td>
	<td id="phone">Phone</td>
	<td id="x_amount">Amount</td>
	<td id="paid">Paid</td>
	<td id="bal">Balance</td>
</tr>
<?php 
$today = time();
$query = "select * from dayn where due_date<=$today and id_customer = {$_SESSION['id']} ORDER BY id DESC";
$result = mysqli_query($connection, $query);
while ($array = mysqli_fetch_array($mid)) {
?>
<tr>
	<td id="date_d"><?php echo date("m/d/Y", $array['due_date']); ?></td>
	<td id="name_d"><?php echo $array['name']; ?></td>
	<td id="phone_d"><a href="../text.php?page=<?php echo $array['phone']; ?>"><?php echo $array['phone']; ?></a></td>
	<td id="x_amount_d"><?php echo "$" . $array['amount']; ?></td>
	<td id="paid_d"><?php echo "$" . $array['paid']; ?></td>
	<td id="bal_d"><?php echo "$" . $array['balance']; ?></td>
</tr>
<?php } ?>
</table>
<br/>
<br/>
<!-- <hr /> -->
<?php 
//$query = "select * from note";
$result = $public->select_all('note');
while($array = mysqli_fetch_array($result)){
	echo "<br />";
	echo "Title: <b>{$array['title']}</b>" . "  " . "  " . "  " . $array['time']. "  " . " " . $array['name'];  ?> <a href="notes.php?id=<?php echo $array['id']; ?>">Delete</a> <?php
	echo "<br />";
	echo "<br />";
	echo "Message: " . " " . $array['message'];
	echo "<br />";
}
	
?>
<!-- <form action="" method="post">
Drop Balance Here: <br/><input type="number" name="balance" value=""><br />
<input type="submit" name="submit" value="Submit">
</form>	 -->

<!-- <hr /> -->
<!-- <form id="dir" action="index.php" method="post">
	<label>Title: <br/><input id="title" type="text" name="title" value=""></label><br />
	<label>Name: <br/><input id="name" type="text" name="name" value=""></label><br />
	<label>Cc: <br/><input type="text" name="cc" value=""></label><br />
	<label>Message: <br/> <textarea id="message" cols="35" rows="5" name="note" value=""></textarea></label><br/>
	<input type="file" name="file_upload" value=""><br />
<input id="hey" type="submit" name="post" value="Post">
<input id="hey" type="submit" name="Send" value="Send">
</form> -->
<script type="text/javascript">
	function hubi(){
		document.getElementById("phone_d").onclick = function (){
			window.alert("You've successfully sent a reminder to this person");
		}
	}
	
	window.onload = function(){
		hubi();
	}
</script>
<div id="pagination">
<a id="backward" href="notes.php?page=<?php 
$result = $public->select_count_late('dayn');
$page = $_SESSION['page'];
$real_page = $result;
if($page > 0){
echo $_SESSION['page']-1;
} else {
echo 0;
}

?>">Previous Page</a>
<a id="forward" href="notes.php?page=<?php 
$result = $public->select_count_late('dayn');
$page = $_SESSION['page'];
$real_page = $result/30;
$new_page = $real_page - 1;
if($page < $new_page && $real_page > 1){
echo $_SESSION['page']+1; 
} else {
    echo 0;
}
?>">Next Page</a>

</div>
</div>
<div id="navigation">
<?php require_once("../data/navigation.php") ?>
<script>
window.onload = function(){
		asking();
		hubi();
	}
</script>
</div>
</div>
<?php require_once("../data/footer.php"); ?>

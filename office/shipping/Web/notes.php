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
	
} 
require_once("../data/header.php"); ?>
<div id="main">
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
$query = "select * from dayn where due_date<=$today";
$result = mysqli_query($connection, $query);
while ($array = mysqli_fetch_array($result)) {
?>
<tr>
	<td id="date_d"><?php echo date("m/d/Y", $array['due_date']); ?></td>
	<td id="name_d"><?php echo $array['name']; ?></td>
	<td id="phone_d"><?php echo $array['phone']; ?></td>
	<td id="x_amount_d"><?php echo "$" . $array['amount']; ?></td>
	<td id="paid_d"><?php echo "$" . $array['paid']; ?></td>
	<td id="bal_d"><?php echo "$" . $array['balance']; ?></td>
</tr>
<?php } ?>
</table>
<br/>
<br/>
<hr />
<?php 
//$query = "select * from note";
$result = $public->select_all('note');
while($array = mysqli_fetch_array($result)){
	echo "<br />";
	echo "Title: <b>{$array['title']}</b>" . "  " . "  " . "  " . $array['time']. "  " . " " . $array['name'];  ?> <a href="notes.php?id=<?php echo $array['id']; ?>">Delete</a> <?php
	echo "<br />";
	echo "<br />";
	echo "Message: " . " " . $array['message'];
	echo "<br /> <hr />";
}
	
?>
<form action="" method="post">
Drop Balance Here: <br/><input type="number" name="balance" value=""><br />
<input type="submit" name="submit" value="Submit">
</form>	

<hr />
<form id="dir" action="notes.php" enctype="multipart/form-data" method="post">
	<label>Title: <br/><input id="title" type="text" name="title" value=""></label><br />
	<label>Name: <br/><input id="name" type="text" name="name" value=""></label><br />
	<label>Cc: <br/><input type="text" name="cc" value=""></label><br />
	<label>Message: <br/> <textarea id="message" cols="35" rows="5" name="note" value=""></textarea></label><br/>
	<input type="file" name="file_upload" value=""><br />
<input id="hey" type="submit" name="post" value="Post">
<input id="hey" type="submit" name="Send" value="Send">
</form>
<script type="text/javascript">
	function hubi(){
		document.getElementById("dir").onsubmit = function (){
			if(document.getElementById("title").value === ""){
				window.alert("Please give title and message before you send or post");
				return false;
			} else {
				return true;
			}
		}
	}
	
</script>

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

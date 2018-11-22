<?php require_once("../data/header.php"); 
require_once("../data/sessions.php");
require_once("../data/Functions.php"); 
//require_once("../PHPExcel/Classes/PHPExcel.php");
$public->login();

if(isset($_POST['submit']) && $_POST['first_name'] !== ""){
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $phone = $_POST['phone'];
    $destination = $_POST['destination'];
    $remarks = $_POST['remarks'];
    $date = date("m/d/Y", time());
    
    $query = "insert into customer (first_name, last_name, phone, destination, remarks, date) values ('{$first_name}', '{$last_name}', $phone, '{$destination}', '{$remarks}', '{$date}')";
    global $connection;
    mysqli_query($connection, $query);
    header("location: Office_needs.php?page=0");
}elseif(isset($_POST['edit'])){
	echo "you are now in good shape";

} elseif (isset($_POST['register']) && $_POST['id'] !== ""){
    $id_customer = $_POST['id'];
    $query = "select * from customer where id = {$id_customer}";
    $result = mysqli_query($connection, $query);
    $array = mysqli_fetch_array($result);
    if($array){
    $awb = $_POST['awb'];
    $length = $_POST['length'];
    $width = $_POST['width'];
    $height = $_POST['height'];
    $quantity = $_POST['quantity'];
    $sender_name = $_POST['name'];
    $sender_phone = $_POST['phone'];
    $kg = $_POST['kg'];
    // $lb = $_POST['lb'];
    $actual_weight = $_POST['actual_weight'];
    $actual_kg = $actual_weight / 2.2;
    $vol_weight = $length * $width * $height * $quantity / 139;
    $vol_kg = $vol_weight / 2.2;
    if($actual_kg > $vol_kg){
        if($actual_kg > 20){
        $weight = $actual_kg;    
        } else {
            $weight = 20;
        }    
    } elseif($actual_kg < $vol_kg){
        if($vol_kg > 20){
            $weight = $vol_kg;
    }else{
            $weight = 20;
    }
    }
    $usd = $kg * $weight;
    $query = "insert into products (id_customer, awb, length, width, height, quantity, vol_weight, vol_kg, actual_weight, actual_kg, weight, sender_name, sender_phone, per_kg, total_usd) values ({$id_customer}, {$awb}, {$length}, {$width}, {$height}, {$quantity}, {$vol_weight}, {$vol_kg}, {$actual_weight}, {$actual_kg}, {$weight}, '{$sender_name}', '{$sender_phone}', {$kg}, {$usd})";
    
    $result = mysqli_query($connection, $query);
    unset($_SESSION['add_id']);
	unset($_SESSION['add_awb']);
	unset($_SESSION['add_sender']);
	unset($_SESSION['add_sender_phone']);
	unset($_SESSION['add_per_kg']);
    } else {
?> <script>window.alert("please enter valid customer id");</script> 
<?php
    }
    header("location: Office_needs.php?page=0");
}elseif(isset($_GET['page'])){
    global $page; 
    $page = $_GET['page'];
    $_SESSION['page'] = $page;
    $offset = $page * 20;
    global $mid; 
    $mid = $public->offseta($offset);
}

?>
<div id="main">
<link rel="stylesheet" type="text/css" href="../data/public.css">
<div id="page">
<div id="fore_list">
<a href="pdf.php"><button>Download All in PDF</button></a>
<form action="pdf.php" method="post">
ID's less than 10 without separation: <input type="array" name="ids" placeholder="1,2,3,4,5....">
<input type="submit" name="create" value="Create PDF">
</form>
<table id="ilaali" border="0">
<tr>
    <td id="shipe">AP</td>
    <td id="shipe">ID</td>
    <td id="shipe">Customer Name</td>
    <td id="shipe">Edit</td>
    <td id="shipe">Action</td>
</tr>
<?php
//$all = $public->select_all('customer');
while($customer = mysqli_fetch_array($mid)){
?>
<tr>
	<td id="ship"><a href="customer_update.php?page=<?php echo $customer['id']; ?>">...</a></td>
    <td id="ship"><?php echo $customer['id']; ?></td>
    <td id="ship"><?php echo ucfirst($customer['first_name']); ?></td>
    <td id="ship"><a href="#">Edit</a></td>
    <td id="ship"><a href="pdf.php?page=<?php echo $customer['id']; ?>">.PDF</a></td>
</tr>
<?php
}
?>    
</table>
</div>
<div id="for">
<br />
<form id="" action="update.php" method="post">
    <input type="number" name="id" value=""><br />
    <input type="submit" name="delete_product" value="Delete Product"><input type="submit" name="delete_customer" value="Delete Customer">
</form>
<br />
<br />
<br />
<form id="" action="Office_needs.php" method="post">
Customer ID: <input id="labo" type="number" name="id" value="<?php if(isset($_SESSION['add_id'])){ echo $_SESSION['add_id']; } ?>"><br />
    <br /> 
AWB: <input id="labo" type="text" name="awb" value="<?php if(isset($_SESSION['add_awb'])){ echo $_SESSION['add_awb']; } ?>"><br />
    <br />
Length: <input id="labo" type="number" name="length" value=""><br />
    <br />
Width: <input id="labo" type="number" name="width" value=""><br />
    <br />
height: <input id="labo" type="number" name="height" value=""><br />
    <br />
Quantity: <input id="labo" type="number" name="quantity" value=""><br />
    <br />
Actual Weight: <input id="labo" type="number" name="actual_weight" value=""><br />
    <br />
Sender Name: <input id="labo" type="text" name="name" value="<?php if(isset($_SESSION['add_sender'])){ echo $_SESSION['add_sender']; } ?>"><br />
    <br />
Sender Phone: <input id="labo" type="number" name="phone" value="<?php if(isset($_SESSION['add_sender_phone'])){ echo $_SESSION['add_sender_phone']; } ?>"><br />
    <br />
Per KG: <input id="labo" type="number" name="kg" value="<?php if(isset($_SESSION['add_per_kg'])){ echo $_SESSION['add_per_kg']; } ?>"><br />
    <br />
<!-- LB: <input id="labo" type="number" name="lb" value=""><br />
    <br />
Total USD: <input id="labo" type="number" name="usd" value=""><br />
    <br /> -->
<input type="submit" name="register" value="Submit"><br />
</form>
<a href="customer_update.php?clean=3"><button>Clear autofill</button></a><br />
<br />
<form id="" action="Office_needs.php" method="post">
First Name: <input id="labo" type="text" name="first_name" value=""><br />
    <br />
Last Name: <input id="labo" type="text" name="last_name" value=""><br />
    <br />
Phone: <input id="labo" type="number" name="phone" value=""><br />
    <br />
Destination: <input id="labo" type="text" name="destination" value=""><br />
    <br />
Remarks: <input id="labo" type="text" name="remarks" value=""><br />
    <br />
<input type="submit" name="submit" value="Submit">
<input type="submit" name="edit" value="Edit"><br />
<br />
<br />
</form>

</div>
<br/>
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<div id="pagination">
<a id="backward" href="Office_needs.php?page=<?php 
$result = $public->select_count('customer');
$page = $_SESSION['page'];
$real_page = $result/1;
if($page > 0){
echo $_SESSION['page']-1;
} else {
echo 0;
}

?>">Previous Page</a>
<a id="forward" href="Office_needs.php?page=<?php 
$result = $public->select_count('customer');
$page = $_SESSION['page'];
$real_page = $result/1;
if($page < $real_page - 1){
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
	}
</script>
</div>
</div>
<?php require_once("../data/footer.php"); ?>
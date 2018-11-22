<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");


//$connection = mysqli_connect('localhost', 'abshir', 'abshir26', 'xafiis');
$connection = mysqli_connect('localhost', 'abshir', 'abshir26', 'etawakalchi');

//$dat = json_decode(file_get_contents("php://input"));

if(isset($_GET['id']) && $_GET['id'] == 4359){
    


require_once("fpdf/fpdf.php");



$sql_amano = "select sum(r_balance) as total from amano where type='normal'";
    $result_amano = mysqli_query($connection, $sql_amano);
while ($row_amano = mysqli_fetch_assoc($result_amano)){
    $sum_amano = $row_amano['total'];

}

$sql_amano_office = "select sum(r_balance) as total from amano where type='office'";
    $result_amano_office = mysqli_query($connection, $sql_amano_office);
while ($row_amano_office = mysqli_fetch_assoc($result_amano_office)){
    $sum_amano_office = $row_amano_office['total'];

}

$sql_dayn = "select sum(balance) as total from dayn";
    $result_dayn = mysqli_query($connection, $sql_dayn);
while ($row_dayn = mysqli_fetch_assoc($result_dayn)){
    $sum_dayn = $row_dayn['total'];

}


$sql_cash = "select sum(amount) as total from cash where status != 'Approved'";
    $result_cash = mysqli_query($connection, $sql_cash);
while ($row_cash = mysqli_fetch_assoc($result_cash)){
    $sum_cash = $row_cash['total'];

}

$sql_initial = "select sum(amount) as total from initial";
    $result_initial = mysqli_query($connection, $sql_initial);
while ($row_initial = mysqli_fetch_assoc($result_initial)){
    $sum_initial = $row_initial['total'];

}

$sql_drop = "select sum(amount) as total from drope";
    $result_drop = mysqli_query($connection, $sql_drop);
while ($row_drop = mysqli_fetch_assoc($result_drop)){
    $sum_drop = $row_drop['total'];

}


$sql_check_pending = "select sum(amount) as total from checks where status != 'Approved'";
    $result_check_pending = mysqli_query($connection, $sql_check_pending);
while ($row_check_pending = mysqli_fetch_assoc($result_check_pending)){
    $sum_check_pending = $row_check_pending['total'];

}

$sql_check_approved = "select sum(amount) as total from checks where status = 'Approved'";
    $result_check_approved = mysqli_query($connection, $sql_check_approved);
while ($row_check_approved = mysqli_fetch_assoc($result_check_approved)){
    $sum_check_approved = $row_check_approved['total'];

}

$sql_check_deposited = "select sum(amount) as total from checks where status = 'Deposited'";
    $result_check_deposited = mysqli_query($connection, $sql_check_deposited);
while ($row_check_deposited = mysqli_fetch_assoc($result_check_deposited)){
    $sum_check_deposited = $row_check_deposited['total'];

}

$total = -$sum_initial + $sum_dayn + $sum_drop - $sum_amano -$sum_amano_office + $sum_cash + $sum_check_pending;
$data = [$sum_initial, $sum_dayn, $sum_drop, $sum_amano, $sum_cash, $sum_check_pending, $sum_check_deposited ,$sum_check_approved, $total, $sum_amano_office];


$total_checks = sum_check_pending + $sum_check_deposited;

global $connection;
$sql = "select * from login";

$customer = mysqli_query($connection, $sql);

$pdf = new FPDF();

$pdf->AddPage();
$pdf->SetFont("Arial","B",11);
$pdf->Cell(25,5,"Tawakal Express Chicago",0,1,D);
$pdf->Cell(39,5,"4359 N Elston ave, Chicago, IL 60641",0,1,D);


//Balance sheet ------->

$pdf->SetFont("Arial","U",11);
$pdf->SetTextColor(25, 12, 110);
$pdf->Cell(50,5,"",0,1,D);
$pdf->Cell(50,5,"",0,1,D);
$pdf->Cell(10,7,"Balance Sheet",0,1,D);

$today = date("m/d/Y h:m:s", time());
	
$pdf->SetFont("Arial","B",6);	
$pdf->SetTextColor(350, 44, 810);
$pdf->Cell(23,5,"Date and Time",4,0,D);
$pdf->SetTextColor(25, 12, 110);
$pdf->Cell(23,5,"{$today}",4,1,D);
$pdf->SetTextColor(350, 44, 810);
$pdf->Cell(23,5,"Total Cash",4,0,D);
$pdf->SetTextColor(25, 12, 110);
$pdf->Cell(23,5,"$"."{$sum_cash}",0,1,D);
$pdf->SetTextColor(350, 44, 810);
$pdf->Cell(23,5,"Checks In Hand",4,0,D);
$pdf->SetTextColor(25, 12, 110);
$pdf->Cell(23,5,"$"."{$total_checks}",0,1,D);
$pdf->SetTextColor(350, 44, 810);
$pdf->Cell(23,5,"Total Dayn:",0,0,D);
$pdf->SetTextColor(25, 12, 110);
$pdf->Cell(23,5,"$"."{$sum_dayn}",0,1,D);
$pdf->SetTextColor(350, 44, 810);
$pdf->Cell(23,5,"Total Amaano",0,0,D);
$pdf->SetTextColor(25, 12, 110);
$pdf->Cell(23,5,"$"."{$sum_amano}",0,1,D);
$pdf->SetTextColor(350, 44, 810);
$pdf->Cell(23,5,"Total Expenses",0,0,D);
$pdf->SetTextColor(25, 12, 110);
$pdf->Cell(23,5,"$"."{$sum_amano_office}",0,1,D);
$pdf->SetTextColor(350, 44, 810);
$pdf->Cell(23,5,"Hawala Balance",0,0,D);
$pdf->SetTextColor(25, 12, 110);
$pdf->Cell(23,5,"$"."{$total} ...*(Make sure that this number is zero before you save this file)",0,1,D);

$pdf->SetTextColor(25, 12, 110);
	








//dayn ------------->

$pdf->SetFont("Arial","U",11);
$pdf->SetTextColor(25, 12, 110);
$pdf->Cell(50,5,"",0,1,D);
$pdf->Cell(50,5,"",0,1,D);
$pdf->Cell(10,7,"Dayn",0,1,D);
	
$pdf->SetFont("Arial","B",6);	
$pdf->SetTextColor(350, 44, 810);
$pdf->Cell(23,5,"Date",1,0,D);
$pdf->Cell(23,5,"Due Date",1,0,D);
$pdf->Cell(46,5,"Full Name",1,0,D);
$pdf->Cell(23,5,"Phone:",1,0,D);
//$pdf->Cell(13,5,"Dayn",1,0,D);
//$pdf->Cell(13,5,"Baxshay",1,0,D);
$pdf->Cell(13,5,"Baaqi",1,1,D);

global $connection;

$sql = "select * from dayn";
$query = mysqli_query($connection, $sql);
while($ship = mysqli_fetch_array($query)){
$name = ucfirst($ship['name']);
$date = date("m/d/Y", $ship['date']);
$due_date = date("m/d/Y", $ship['due_date']);
//$dayn = $ship['amount'];
//$baxshay = $ship['paid'];
$baaqi = $ship['balance'];

$pdf->SetTextColor(25, 12, 110);
	
$pdf->Cell(23,5,"{$date}",1,0,D);
$pdf->Cell(23,5,"{$due_date}",1,0,D);
$pdf->Cell(46,5,"{$name}",1,0,D);
$pdf->Cell(23,5,"{$ship['phone']}",1,0,D);
//$pdf->Cell(13,5,"$"."{$dayn}",1,0,D);
//$pdf->Cell(13,5,"$"."{$baxshay}",1,0,D);
$pdf->Cell(13,5,"$"."{$baaqi}",1,1,D);
}

// amaano ---------->


$pdf->SetFont("Arial","U",11);
$pdf->SetTextColor(25, 12, 110);
$pdf->Cell(50,5,"",0,1,D);
$pdf->Cell(50,5,"",0,1,D);
$pdf->Cell(10,7,"Amaano",0,1,D);

	
$pdf->SetFont("Arial","B",6);	
$pdf->SetTextColor(350, 44, 810);
//$pdf->Cell(23,5,"Date",1,0,D);
$pdf->Cell(23,5,"First Name",1,0,D);
$pdf->Cell(23,5,"Last Name",1,0,D);
$pdf->Cell(23,5,"Phone:",1,0,D);
//$pdf->Cell(13,5,"Dhigtay",1,0,D);
//$pdf->Cell(13,5,"Isticmaalay",1,0,D);
$pdf->Cell(13,5,"Baaqi",1,1,D);

global $connection;

$sql = "select * from amano where type = 'normal'";
$query = mysqli_query($connection, $sql);
while($ship = mysqli_fetch_array($query)){
$name = ucfirst($ship['firstname']);
//$date = date("m/d/Y", $ship['date']);
$id = $ship['id'];
//$due_date = date("m/d/Y", $ship['due_date']);
//$dhigtay = $public->select_sum_pdf('deposit', $id);
//$isticmaalay = $public->select_sum_pdf('debit', $id);
$baaqi = $ship['r_balance'];

$pdf->SetTextColor(25, 12, 110);
	
//$pdf->Cell(23,5,"{$date}",1,0,D);
$pdf->Cell(23,5,"{$ship['firstname']}",1,0,D);
$pdf->Cell(23,5,"{$ship['lastname']}",1,0,D);
$pdf->Cell(23,5,"{$ship['phone']}",1,0,D);
//$pdf->Cell(13,5,"$"."{$dhigtay}",1,0,D);
//$pdf->Cell(13,5,"$"."{$isticmaalay}",1,0,D);
$pdf->Cell(13,5,"$"."{$baaqi}",1,1,D);
}

// OFFICE EXPENSES ---------->


$pdf->SetFont("Arial","U",11);
$pdf->SetTextColor(25, 12, 110);
$pdf->Cell(50,5,"",0,1,D);
$pdf->Cell(50,5,"",0,1,D);
$pdf->Cell(10,7,"Office Expenses",0,1,D);

	
$pdf->SetFont("Arial","B",6);	
$pdf->SetTextColor(350, 44, 810);
//$pdf->Cell(23,5,"Date",1,0,D);
$pdf->Cell(23,5,"Description",1,0,D);
//$pdf->Cell(23,5,"Last Name",1,0,D);
//$pdf->Cell(23,5,"Phone:",1,0,D);
//$pdf->Cell(13,5,"Dhigtay",1,0,D);
//$pdf->Cell(13,5,"Isticmaalay",1,0,D);
$pdf->Cell(13,5,"Baaqi",1,1,D);

global $connection;

$sql = "select * from amano where type='office'";
$query = mysqli_query($connection, $sql);
while($ship = mysqli_fetch_array($query)){
$name = ucfirst($ship['firstname']);
$date = date('m/d/Y', $ship['date']);
$id = $ship['id'];
//$due_date = date("m/d/Y", $ship['due_date']);
//$dhigtay = $public->select_sum_pdf('deposit', $id);
//$isticmaalay = $public->select_sum_pdf('debit', $id);
$baaqi = $ship['r_balance'];

$pdf->SetTextColor(25, 12, 110);
	
//$pdf->Cell(23,5,"{$date}",1,0,D);
$pdf->Cell(23,5,"{$ship['firstname']}",1,0,D);
//$pdf->Cell(23,5,"{$ship['last_name']}",1,0,D);
//$pdf->Cell(23,5,"{$ship['phone']}",1,0,D);
//$pdf->Cell(13,5,"$"."{$dhigtay}",1,0,D);
//$pdf->Cell(13,5,"$"."{$isticmaalay}",1,0,D);
$pdf->Cell(13,5,"$"."{$baaqi}",1,1,D);
}

$pdf->output();	
} else {
    echo "you are not signed in to view this page";
}

?>
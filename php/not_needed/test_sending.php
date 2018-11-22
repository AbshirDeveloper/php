<?php 
$connection = mysqli_connect('localhost', 'myuser', 'abshir26', 'etawakalchi');

//dayn


$query = "select * from dayn";

$result = mysqli_query($connection, $query);
$today = date("m-d-Y", time());

$file = "files/({$today} Dayn).csv";

$handler = fopen($file, 'w');
if($handler == true){
$array_expense_l = array("", "", "");
fputcsv($handler, $array_expense_l);  
$array_header = array("","", "", "Dayn", "", "", "", "","","", "Expenses", "", "","", "", "Amano", "","","Summary", "");
    
$array = array("","Date", "Due Date", "Name", "Phone", "Amount", "Paid", "Balance","","Date", "Description", "Balance", "","Name", "Phone", "Balance", "Status","","Description", "Amount");
fputcsv($handler, $array_header);
fputcsv($handler, $array);	
}



//expenses
    
$query_expense = "select * from expenses where description != 'NULL' ";

$result_expense = mysqli_query($connection, $query_expense);

$file_expense = "files/({$today} Expenses).csv";

$handler_expense = fopen($file_expense, 'w');
if($handler_expense == true){
$array_expense_l = array("", "", "");
fputcsv($handler_expense, $array_expense_l);    
    
$array_expense = array("","Date", "Description", "Balance");
fputcsv($handler_expense, $array_expense);	
    
}


    
//amano

$query_amano = "select * from amano where firstname != 'NULL'";

$result_amano = mysqli_query($connection, $query_amano);

$file_amano = "files/({$today} Amano).csv";

$handler_amano = fopen($file_amano, 'w');
if($handler_amano == true){
$array_expense_l = array("", "", "");
fputcsv($handler_amano, $array_expense_l);  
$array_amano = array("","Name", "Phone", "Balance", "Status");
fputcsv($handler_amano, $array_amano);	
 
}


    
//summary or overall


//$data = array();
//
//$sql_amano = "select sum(r_balance) as total from amano";
//    $result_amano = mysqli_query($connection, $sql_amano);
//while ($row_amano = mysqli_fetch_assoc($result_amano)){
//    $sum_amano = $row_amano['total'];
//
//}
//
//$sql_amano_office = "select sum(r_balance) as total from amano where type='office'";
//    $result_amano_office = mysqli_query($connection, $sql_amano_office);
//while ($row_amano_office = mysqli_fetch_assoc($result_amano_office)){
//    $sum_amano_office = $row_amano_office['total'];
//
//}
//
//$sql_dayn = "select sum(balance) as total from dayn";
//    $result_dayn = mysqli_query($connection, $sql_dayn);
//while ($row_dayn = mysqli_fetch_assoc($result_dayn)){
//    $sum_dayn = $row_dayn['total'];
//
//}
//
//
//$sql_cash = "select sum(amount) as total from cash where status != 'Approved'";
//    $result_cash = mysqli_query($connection, $sql_cash);
//while ($row_cash = mysqli_fetch_assoc($result_cash)){
//    $sum_cash = $row_cash['total'];
//
//}
//
//$sql_initial = "select sum(amount) as total from initial";
//    $result_initial = mysqli_query($connection, $sql_initial);
//while ($row_initial = mysqli_fetch_assoc($result_initial)){
//    $sum_initial = $row_initial['total'];
//
//}
//
//$sql_drop = "select sum(amount) as total from drope";
//    $result_drop = mysqli_query($connection, $sql_drop);
//while ($row_drop = mysqli_fetch_assoc($result_drop)){
//    $sum_drop = $row_drop['total'];
//
//}
//
//
//$sql_check_pending = "select sum(amount) as total from checks where status = 'Pending'";
//    $result_check_pending = mysqli_query($connection, $sql_check_pending);
//while ($row_check_pending = mysqli_fetch_assoc($result_check_pending)){
//    $sum_check_pending = $row_check_pending['total'];
//
//}
//
//$sql_check_approved = "select sum(amount) as total from checks where status = 'Approved'";
//    $result_check_approved = mysqli_query($connection, $sql_check_approved);
//while ($row_check_approved = mysqli_fetch_assoc($result_check_approved)){
//    $sum_check_approved = $row_check_approved['total'];
//
//}
//
//$sql_check_deposited = "select sum(amount) as total from checks where status = 'staged'";
//    $result_check_deposited = mysqli_query($connection, $sql_check_deposited);
//while ($row_check_deposited = mysqli_fetch_assoc($result_check_deposited)){
//    $sum_check_deposited = $row_check_deposited['total'];
//
//}
//
//
//$sql_expenses = "select sum(r_balance) as total from expenses";
//    $result_expenses = mysqli_query($connection, $sql_expenses);
//while ($row_expenses = mysqli_fetch_assoc($result_expenses)){
//    $sum_expenses = $row_expenses['total'];
//
//}
//
//
//$total = -$sum_initial + $sum_dayn + $sum_drop - $sum_amano - $sum_amano_office + $sum_cash + $sum_check_pending + $sum_check_deposited - $sum_check_approved + $sum_expenses;
//
//$file_overall = "files/({$today} Overall).csv";
//
//$handler_overall = fopen($file_overall, 'w');
//if($handler_overall == true){
//    
//$array_expense_l = array("", "", "");
//fputcsv($handler_overall, $array_expense_l);  
//    
//$array_overall = array("","Description", "Amount");
//    
//}
    
    
    
    
    
    
//functions 

//dayn

while ($abshir_amano = mysqli_fetch_array($result_amano)){
	$date = date("m/d/Y", $abshir['date']);
	$due_date = date("m/d/Y", $abshir['due_date']);
    
    
    
    
	while ($abshir_expense = mysqli_fetch_array($result_expense)){
        
    while ($abshir = mysqli_fetch_array($result)){
    $full_name = $abshir_amano['firstname']." ".$abshir_amano['lastname'];
        $idbalance = "$".$abshir_amano['r_balance'];
        
        if($idbalance >= 0){
        $status = 'Ok';
        } else {
            $status = 'Negative';
        } 
       
//    $overall = array('Initial', $sum_initial, 'Dayn', $sum_dayn, 'Amano', )
	$date = date("m/d/Y", $abshir_expense['date']);
    $list = array ("",$date, $due_date, $abshir['name'], $abshir['phone'], "$".$abshir['amount'], "$".$abshir['paid'], "$".$abshir['balance'],"",$date, $abshir_expense['description'], "$".$abshir_expense['r_balance'], "",$full_name, $abshir_amano['phone'], $idbalance, $status, "", "amano", "3");
    fputcsv($handler, $list);
    }
    }
}



//expenses






    
    
    



//amano



//overall


    
//$array_first = array("","Initial", "$".$sum_initial); 
//$array_second = array("","Dayn", "$".$sum_dayn); 
//$array_third = array("","Amano", "$".$sum_amano); 
//$array_forth = array("","From hawala", "$".$sum_drop); 
//$array_fifth = array("","Cash", "$".$sum_cash); 
//$array_sixth = array("","Expenses", "$".$sum_expenses);
//$array_seventh = array("","Pending Checks", "$".$sum_check_pending); 
//$array_eighth = array("","Deposited Checks", "$".$sum_check_deposited); 
//$array_ninth = array("","Overall balance", "$".$total);
//    
//    
//    
//fputcsv($handler_overall, $array_overall);
//fputcsv($handler_overall, $array_first);
//fputcsv($handler_overall, $array_second);
//fputcsv($handler_overall, $array_third);
//fputcsv($handler_overall, $array_forth);
//fputcsv($handler_overall, $array_fifth);
//fputcsv($handler_overall, $array_sixth);
//fputcsv($handler_overall, $array_seventh);
//fputcsv($handler_overall, $array_eighth);
//fputcsv($handler_overall, $array_ninth);




require_once("PHPMailer/PHPMailerAutoload.php");
 
$im = new PHPMailer;
$im->isSMTP();
$im->SMTPAuth = true;
// $im->SMTPDebug = 2;

$im->Host = 'smtpout.secureserver.net';
$im->Username = 'ajama26@techsom.info';
$im->Password = 'Abshir@26';
//$im->SMTPSecure = 'SSL';
$im->Port = 80;

$im->From = 'etawakalchi@gmail.com';
$im->FromName = 'Tawakal Chicago';
$im->AddReplyTo('etawakalchi@gmail.com', 'Reply Address');
//$im->AddAttachment($file_amano);
$im->AddAttachment($file);
//$im->AddAttachment($file_expense);
//$im->AddAttachment($file_overall);
$im->addAddress('brotherabshir@gmail.com');

$im->Subject = "{$today} Daily Summary";
$im->Body = 'Waa daynta iyo amanada listigooda';
//$im->AltBody = "Final Test";

$placed = $im->send(); 


$final = "update settings set sent_email = '$today' where id = 1";
$final_query = mysqli_query($connection, $final);

?>
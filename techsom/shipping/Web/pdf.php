<?php

require_once("../data/combine.php");

require_once("../fpdf/fpdf.php");

if(isset($_GET['page'])){
global $connection;
$sql = "select * from customer where id = {$_GET['page']}";


$customer = mysqli_query($connection, $sql);

$pdf = new FPDF();

$pdf->AddPage();

$pdf->SetFont("Arial","B",11);
$pdf->Cell(25,5,"SOMTRUCK LLC",0,1,C);
$pdf->Cell(39,5,"2454 W PETERSON AVE",0,1,C);
$pdf->Cell(30,5,"CHICAGO, IL 60659",0,1,C);
$pdf->Cell(20,5,"(773) 441 8318",0,1,C);
$pdf->SetFont("Arial","U",11);
$pdf->SetTextColor(25, 12, 110);
$pdf->Cell(0,10,"Shipment Calculations",0,1,C);
$pdf->Cell(50,5,"",0,1,C);
while($ship = mysqli_fetch_array($customer)){
$first = ucfirst($ship['first_name']);
$last = ucfirst($ship['last_name']);
$pdf->SetFont("Arial","B",6);
$pdf->SetTextColor(350, 44, 810);
$pdf->Cell(23,5,"First Name",1,0,D);
$pdf->Cell(30,5,"{$first}",1,1,D);
$pdf->Cell(23,5,"Last Name",1,0,D);
$pdf->Cell(30,5,"{$last}",1,1,D);
$pdf->Cell(23,5,"Phone:",1,0,D);
$pdf->Cell(30,5,"{$ship['phone']}",1,1,D);
$pdf->Cell(23,5,"Destination:",1,0,D);
$pdf->Cell(30,5,"{$ship['destination']}",1,1,D);
$pdf->Cell(23,5,"Remarks:",1,0,D);
$pdf->Cell(30,5,"{$ship['remarks']}",1,1,D);
$pdf->Cell(23,5,"Date:",1,0,D);
$pdf->Cell(30,5,"{$ship['date']}",1,1,D);
$pdf->SetFont("Arial","B",1);
$pdf->SetFont("Arial","B",6);
$pdf->SetTextColor(25, 12, 110);
global $connection;
$sql = "select * from products where id_customer = {$ship['id']}";
$products = mysqli_query($connection, $sql);
// $pdf->Cell(10,5,"",0,0,D);
$pdf->Cell(23,5,"Sender Name",1,0,C);
$pdf->Cell(23,5,"Sender Phone",1,0,C);
$pdf->Cell(20,5,"AWB",1,0,C);
$pdf->Cell(10,5,"Length",1,0,D);
$pdf->Cell(10,5,"Width",1,0,D);
$pdf->Cell(10,5,"Height",1,0,D);
$pdf->Cell(10,5,"Quantity",1,0,D);
$pdf->Cell(10,5,"Per KG",1,0,D);
$pdf->Cell(10,5,"DMN LB",1,0,C);
$pdf->Cell(12,5,"Actual LB",1,0,C);
$pdf->Cell(10,5,"DMN KG",1,0,C);
$pdf->Cell(12,5,"Actual KG",1,0,C);
$pdf->Cell(10,5,"Final KG",1,0,C);
$pdf->Cell(12,5,"Total $$",1,1,C);
while($shiping = mysqli_fetch_array($products)){
// $pdf->Cell(10,5,"",0,0,D);
$pdf->Cell(23,5,"{$shiping['sender_name']}",1,0,C);
$pdf->Cell(23,5,"{$shiping['sender_phone']}",1,0,C);
$pdf->Cell(20,5,"{$shiping['awb']}",1,0,C);
$pdf->Cell(10,5,"{$shiping['length']}",1,0,D);
$pdf->Cell(10,5,"{$shiping['width']}",1,0,D);
$pdf->Cell(10,5,"{$shiping['height']}",1,0,D);
$pdf->Cell(10,5,"{$shiping['quantity']}",1,0,D);
$pdf->Cell(10,5,"$"."{$shiping['per_kg']}",1,0,D);
$pdf->Cell(10,5,"{$shiping['vol_weight']}"." LB",1,0,C);
$pdf->Cell(12,5,"{$shiping['actual_weight']}"." LB",1,0,C);
$pdf->Cell(10,5,"{$shiping['vol_kg']}"." KG",1,0,C);
$pdf->Cell(12,5,"{$shiping['actual_kg']}"." KG",1,0,C);
$pdf->Cell(10,5,"{$shiping['weight']}"." KG",1,0,C);
$pdf->Cell(12,5,"$"."{$shiping['total_usd']}",1,1,C);
}

$table = "products";
$id = $ship['id'];
$length = $public->select_sum_column_where($table, 'length', $id);
$width = $public->select_sum_column_where($table, 'width', $id);
$height = $public->select_sum_column_where($table, 'height', $id);
$quantity = $public->select_sum_column_where($table, 'quantity', $id);
$kg = $public->select_sum_column_where($table, 'per_kg', $id);
$vol_weight = $public->select_sum_column_where($table, 'vol_weight', $id);
$actual_weight = $public->select_sum_column_where($table, 'actual_weight', $id);
$weight = $public->select_sum_column_where($table, 'weight', $id);
$usd = $public->select_sum_column_where($table, 'total_usd', $id);
$actual_kg = $public->select_sum_column_where($table, 'actual_kg', $id);
$vol_kg = $public->select_sum_column_where($table, 'vol_kg', $id);

// $pdf->Cell(10,5,"",0,0,D);
$pdf->Cell(23,5,"",1,0,C);
$pdf->SetTextColor(253, 12, 120);
$pdf->Cell(23,5,"",1,0,C);
$pdf->Cell(20,5,"Total",1,0,C);
$pdf->Cell(10,5,"{$length}",1,0,D);
$pdf->Cell(10,5,"{$width}",1,0,D);
$pdf->Cell(10,5,"{$height}",1,0,D);
$pdf->Cell(10,5,"{$quantity}",1,0,D);
$pdf->Cell(10,5,"$"."{$kg}",1,0,D);
$pdf->Cell(10,5,"{$vol_weight}",1,0,C);
$pdf->Cell(12,5,"{$actual_weight}",1,0,C);
$pdf->Cell(10,5,"{$vol_kg}",1,0,C);
$pdf->Cell(12,5,"{$actual_kg}",1,0,C);
$pdf->Cell(10,5,"{$weight}",1,0,C);
$pdf->Cell(12,5,"$"."{$usd}",1,1,C);
$pdf->Cell(15,5,"",0,1,D);
}
$pdf->output();
} else {

global $connection;
$sql = "select * from customer";

$customer = mysqli_query($connection, $sql);

$pdf = new FPDF();

$pdf->AddPage();
$pdf->SetFont("Arial","B",11);
$pdf->Cell(25,5,"SOMTRUCK LLC",0,1,C);
$pdf->Cell(39,5,"2454 W PETERSON AVE",0,1,C);
$pdf->Cell(30,5,"CHICAGO, IL 60659",0,1,C);
$pdf->Cell(20,5,"(773) 441 8318",0,1,C);
$pdf->SetFont("Arial","U",11);
$pdf->SetTextColor(25, 12, 110);
$pdf->Cell(0,10,"Shipment Calculations",0,1,C);
$pdf->Cell(50,5,"",0,1,C);
while($ship = mysqli_fetch_array($customer)){
$first = ucfirst($ship['first_name']);
$last = ucfirst($ship['last_name']);
$pdf->SetFont("Arial","B",6);
$pdf->SetTextColor(350, 44, 810);
$pdf->Cell(23,5,"First Name",1,0,D);
$pdf->Cell(30,5,"{$first}",1,1,D);
$pdf->Cell(23,5,"Last Name",1,0,D);
$pdf->Cell(30,5,"{$last}",1,1,D);
$pdf->Cell(23,5,"Phone:",1,0,D);
$pdf->Cell(30,5,"{$ship['phone']}",1,1,D);
$pdf->Cell(23,5,"Destination:",1,0,D);
$pdf->Cell(30,5,"{$ship['destination']}",1,1,D);
$pdf->Cell(23,5,"Remarks:",1,0,D);
$pdf->Cell(30,5,"{$ship['remarks']}",1,1,D);
$pdf->Cell(23,5,"Date:",1,0,D);
$pdf->Cell(30,5,"{$ship['date']}",1,1,D);
$pdf->SetFont("Arial","B",1);
$pdf->SetFont("Arial","B",6);
$pdf->SetTextColor(25, 12, 110);
global $connection;
$sql = "select * from products where id_customer = {$ship['id']}";
$products = mysqli_query($connection, $sql);
// $pdf->Cell(10,5,"",0,0,D);
$pdf->Cell(23,5,"Sender Name",1,0,C);
$pdf->Cell(23,5,"Sender Phone",1,0,C);
$pdf->Cell(20,5,"AWB",1,0,C);
$pdf->Cell(10,5,"Length",1,0,D);
$pdf->Cell(10,5,"Width",1,0,D);
$pdf->Cell(10,5,"Height",1,0,D);
$pdf->Cell(10,5,"Quantity",1,0,D);
$pdf->Cell(10,5,"Per KG",1,0,D);
$pdf->Cell(10,5,"DMN LB",1,0,C);
$pdf->Cell(12,5,"Actual LB",1,0,C);
$pdf->Cell(10,5,"DMN KG",1,0,C);
$pdf->Cell(12,5,"Actual KG",1,0,C);
$pdf->Cell(10,5,"Final KG",1,0,C);
$pdf->Cell(12,5,"Total $$",1,1,C);
while($shiping = mysqli_fetch_array($products)){
// $pdf->Cell(10,5,"",0,0,D);
$pdf->Cell(23,5,"{$shiping['sender_name']}",1,0,C);
$pdf->Cell(23,5,"{$shiping['sender_phone']}",1,0,C);
$pdf->Cell(20,5,"{$shiping['awb']}",1,0,C);
$pdf->Cell(10,5,"{$shiping['length']}",1,0,D);
$pdf->Cell(10,5,"{$shiping['width']}",1,0,D);
$pdf->Cell(10,5,"{$shiping['height']}",1,0,D);
$pdf->Cell(10,5,"{$shiping['quantity']}",1,0,D);
$pdf->Cell(10,5,"$"."{$shiping['per_kg']}",1,0,D);
$pdf->Cell(10,5,"{$shiping['vol_weight']}"." LB",1,0,C);
$pdf->Cell(12,5,"{$shiping['actual_weight']}"." LB",1,0,C);
$pdf->Cell(10,5,"{$shiping['vol_kg']}"." KG",1,0,C);
$pdf->Cell(12,5,"{$shiping['actual_kg']}"." KG",1,0,C);
$pdf->Cell(10,5,"{$shiping['weight']}"." KG",1,0,C);
$pdf->Cell(12,5,"$"."{$shiping['total_usd']}",1,1,C);
}

$table = "products";
$id = $ship['id'];
$length = $public->select_sum_column_where($table, 'length', $id);
$width = $public->select_sum_column_where($table, 'width', $id);
$height = $public->select_sum_column_where($table, 'height', $id);
$quantity = $public->select_sum_column_where($table, 'quantity', $id);
$kg = $public->select_sum_column_where($table, 'per_kg', $id);
$vol_weight = $public->select_sum_column_where($table, 'vol_weight', $id);
$actual_weight = $public->select_sum_column_where($table, 'actual_weight', $id);
$weight = $public->select_sum_column_where($table, 'weight', $id);
$usd = $public->select_sum_column_where($table, 'total_usd', $id);
$actual_kg = $public->select_sum_column_where($table, 'actual_kg', $id);
$vol_kg = $public->select_sum_column_where($table, 'vol_kg', $id);

// $pdf->Cell(10,5,"",0,0,D);
$pdf->Cell(23,5,"",1,0,C);
$pdf->SetTextColor(253, 12, 120);
$pdf->Cell(23,5,"",1,0,C);
$pdf->Cell(20,5,"Total",1,0,C);
$pdf->Cell(10,5,"{$length}",1,0,D);
$pdf->Cell(10,5,"{$width}",1,0,D);
$pdf->Cell(10,5,"{$height}",1,0,D);
$pdf->Cell(10,5,"{$quantity}",1,0,D);
$pdf->Cell(10,5,"$"."{$kg}",1,0,D);
$pdf->Cell(10,5,"{$vol_weight}",1,0,C);
$pdf->Cell(12,5,"{$actual_weight}",1,0,C);
$pdf->Cell(10,5,"{$vol_kg}",1,0,C);
$pdf->Cell(12,5,"{$actual_kg}",1,0,C);
$pdf->Cell(10,5,"{$weight}",1,0,C);
$pdf->Cell(12,5,"$"."{$usd}",1,1,C);
$pdf->Cell(15,5,"",0,1,D);
}
$pdf->output();
} 

?>
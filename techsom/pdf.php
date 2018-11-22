<?php

require_once("data/combine.php");

require_once("fpdf/fpdf.php");

global $connection;
$sql = "select * from customer";

$customer = mysqli_query($connection, $sql);

$pdf = new FPDF();

$pdf->AddPage();
$pdf->SetFont("Arial","B",11);
$pdf->Cell(0,10,"Shipment Calculations",1,1,C);
$pdf->Cell(50,5,"",0,1,C);
while($ship = mysqli_fetch_array($customer)){
$first = ucfirst($ship['first_name']);
$last = ucfirst($ship['last_name']);
$pdf->SetFont("Arial","B",6);
$pdf->SetTextColor(int, r);
$pdf->Cell(20,5,"First Name",1,0,D);
$pdf->Cell(20,5,"{$first}",1,1,D);
$pdf->Cell(20,5,"Last Name",1,0,D);
$pdf->Cell(20,5,"{$last}",1,1,D);
$pdf->Cell(20,5,"Phone:",1,0,D);
$pdf->Cell(20,5,"{$ship['phone']}",1,1,D);
$pdf->Cell(20,5,"Destination:",1,0,D);
$pdf->Cell(20,5,"{$ship['destination']}",1,1,D);
$pdf->Cell(20,5,"Remarks:",1,0,D);
$pdf->Cell(80,5,"{$ship['remarks']}",1,1,D);
$pdf->Cell(20,5,"Date:",1,0,D);
$pdf->Cell(20,5,"{$ship['date']}",1,1,D);
$pdf->SetFont("Arial","B",1);
$pdf->SetFont("Arial","B",6);
global $connection;
$sql = "select * from products where id_customer = {$ship['id']}";
$products = mysqli_query($connection, $sql);
$pdf->Cell(10,5,"",0,0,D);
$pdf->Cell(28,5,"Sender Name",1,0,C);
$pdf->Cell(28,5,"Sender Phone",1,0,C);
$pdf->Cell(20,5,"AWB",1,0,C);
$pdf->Cell(10,5,"Length",1,0,D);
$pdf->Cell(10,5,"Width",1,0,D);
$pdf->Cell(10,5,"Height",1,0,D);
$pdf->Cell(10,5,"Quantity",1,0,D);
$pdf->Cell(10,5,"Per KG",1,0,D);
$pdf->Cell(20,5,"Volume Weight",1,0,C);
$pdf->Cell(20,5,"Actual Weight",1,0,C);
$pdf->Cell(20,5,"Final Weight",1,1,C);
while($shiping = mysqli_fetch_array($products)){
$pdf->Cell(10,5,"",0,0,D);
$pdf->Cell(28,5,"{$shiping['sender_name']}",1,0,C);
$pdf->Cell(28,5,"{$shiping['sender_phone']}",1,0,C);
$pdf->Cell(20,5,"{$shiping['awb']}",1,0,C);
$pdf->Cell(10,5,"{$shiping['length']}",1,0,D);
$pdf->Cell(10,5,"{$shiping['width']}",1,0,D);
$pdf->Cell(10,5,"{$shiping['height']}",1,0,D);
$pdf->Cell(10,5,"{$shiping['quantity']}",1,0,D);
$pdf->Cell(10,5,"{$shiping['per_kg']}",1,0,D);
$pdf->Cell(20,5,"{$shiping['vol_weight']}",1,0,C);
$pdf->Cell(20,5,"{$shiping['actual_weight']}",1,0,C);
$pdf->Cell(20,5,"{$shiping['weight']}",1,1,C);
}
$pdf->Cell(10,5,"",0,1,D);
}
$pdf->output();

?>
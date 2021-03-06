<?php require_once("../data/combine.php");
$public->login();

$sql = "select * from login where id = '{$_SESSION['id']}'";
global $real;

$real = $public->get_by_sql($sql);
 ?>

 <?php

if(isset($_POST['create'])){
	$_SESSION['customer_name'] = $_POST['name'];
	$_SESSION['item'] = $_POST['item'];
	$_SESSION['quantity'] = $_POST['quantity'];
	$_SESSION['total'] = $_POST['total'];
	$_SESSION['description'] = $_POST['description'];
	$_SESSION['paid'] = $_POST['paid'];

	header("location: invoice_directory.php?id=65");
}

  ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
	
	<title>Editable Invoice</title>
	
	<link rel='stylesheet' type='text/css' href='css/style.css' />
	<link rel='stylesheet' type='text/css' href='css/print.css' media="print" />
	<script type='text/javascript' src='js/jquery-1.3.2.min.js'></script>
	<script type='text/javascript' src='js/example.js'></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script src="http://files.codepedia.info/uploads/iScripts/html2canvas.js"></script>

</head>

<body>

	<div id="html-content-holder" style="background-color: #F0F0F1; width: 850px;
        padding-left: 25px; padding-right: 45px; padding-top: 10px;">

		<textarea id="header">INVOICE</textarea>
		
		<div id="identity">
		
           <span><?php echo ucfirst($real['company_name']);?></span><br /><span><?php echo $real['address']; ?></span><br /><span> <?php echo $real['phone']; ?></span><hr />



            <div id="logo">

              <div id="logoctr">
                <a href="javascript:;" id="change-logo" title="Change logo">Change Logo</a>
                <a href="javascript:;" id="save-logo" title="Save changes">Save</a>
                |
                <a href="javascript:;" id="delete-logo" title="Delete logo">Delete Logo</a>
                <a href="javascript:;" id="cancel-logo" title="Cancel changes">Cancel</a>
              </div>

              <div id="logohelp">
                <input id="imageloc" type="text" size="50" value="" /><br />
                (max width: 540px, max height: 100px)
              </div>
            
            </div>
		
		</div>
		
		<div style="clear:both"></div>
		
		<a onclick="myFunction()">.....</a>

		<script>
		function myFunction() {
			window.print();
		}
		</script>
		<div id="customer">
            <textarea id="customer-title"><?php echo $_SESSION['customer_name']; ?></textarea>

            <table id="meta">
                <tr>
                    <td class="meta-head">Invoice #</td>
                    <td><textarea><?php echo time() - 1490548000; ?></textarea></td>
                </tr>
                <tr>

                    <td class="meta-head">Date</td>
                    <td><textarea id="date"><?php echo date("m/d/Y", time()); ?></textarea></td>
                </tr>
                <tr>
                    <td class="meta-head">Amount Due</td>
                    <td><div class="due"></div></td>
                </tr>

            </table>
		
		</div>
		
		<table id="items">
		
		  <tr>
		      <th>Item</th>
		      <th>Description</th>
		      <th>Unit Cost</th>
		      <th>Quantity</th>
		      <th>Price</th>
		  </tr>
		  
		  <tr class="item-row">
		      <td class="item-name"><div class="delete-wpr"><textarea></textarea><a class="delete" href="javascript:;" title="Remove row">X</a></div></td>
		      <td class="description"><textarea></textarea></td>
		      <td><textarea class="cost"></textarea></td>
		      <td><textarea class="qty"></textarea></td>
		      <td><span class="price"></span></td>
		  </tr>
		  
		  <tr class="item-row">
		      <td class="item-name"><div class="delete-wpr"><textarea></textarea><a class="delete" href="javascript:;" title="Remove row">X</a></div></td>

		      <td class="description"><textarea></textarea></td>
		      <td><textarea class="cost"></textarea></td>
		      <td><textarea class="qty"></textarea></td>
		      <td><span class="price"></span></td>
		  </tr>
		  
		  <tr id="hiderow">
		    <td colspan="5"><a id="addrow" href="javascript:;" title="Add a row">Add a row</a></td>
		  </tr>
		  
		  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line">Subtotal</td>
		      <td class="total-value"><div id="subtotal"></div></td>
		  </tr>
		  <tr>

		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line">Total</td>
		      <td class="total-value"><div id="total"></div></td>
		  </tr>
		  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line">Amount Paid</td>

		      <td class="total-value"><textarea id="paid"></textarea></td>
		  </tr>
		  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line balance">Balance Due</td>
		      <td class="total-value balance"><div class="due"></div></td>
		  </tr>
		
		</table>
		
		<div id="terms">
		  <h5>Terms</h5>
		  <textarea></textarea>
		</div>
	
	</div>
	<input id="btn-Preview-Image" type="button" value="Save"/>
    <a id="btn-Convert-Html2Image" href="#">Download</a>
<script>
$(document).ready(function(){

	
var element = $("#html-content-holder"); // global variable
var getCanvas; // global variable
 
    $("#btn-Preview-Image").on('click', function () {
         html2canvas(element, {
         onrendered: function (canvas) {
                $("#previewImage").append(canvas);
                getCanvas = canvas;
             }
         });
    });

	$("#btn-Convert-Html2Image").on('click', function () {
    var imgageData = getCanvas.toDataURL("image/png");
    // Now browser starts downloading it instead of just showing it
    var newData = imgageData.replace(/^data:image\/png/, "data:application/octet-stream");
    $("#btn-Convert-Html2Image").attr("download", "your_pic_name.png").attr("href", newData);
	});

});

</script>	
</body>

</html>
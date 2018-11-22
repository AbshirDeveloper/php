<?php
require_once("../data/Database_connection.php");
if(isset($_GET['id']) && $_GET['id'] == 1){
$query_customer = "select * from customer";
$result_customer = mysqli_query($connection, $query_customer);
$today = date("m-d-Y", time());

$file = "../excel/calculations({$today}).csv";

$handler = fopen($file, 'w');
if($handler == true){  
					
					
                    //fputcsv($handler, ""\t", Calculations");	
					while ($abshir = mysqli_fetch_array($result_customer)){
                    $array = array("Customer ID", "Name", "Phone number");
                    $name = $abshir['first_name']. " " . $abshir['last_name'];
                    //$list = array ($abshir['id'], $name, $abshir['phone']);
                    $id = array($array[0], $abshir['id']);
                    $name = array($array[1], $name);
                    $phone = array($array[2], $abshir['phone']);
					fputcsv($handler, $id);
                    fputcsv($handler, $name);
                    fputcsv($handler, $phone);
                    $array2 = array("\t",".","AWB", "Length", "Width", "Height", "Quantity", "V-Weight", "A-Weight", "F-Weight");
                    fputcsv($handler, $array2);
                    $query_product = "select * from products where id_customer = '{$abshir['id']}'";
                    global $connection;
                    $result_product = mysqli_query($connection, $query_product);
                        while($jama = mysqli_fetch_array($result_product)){
                          $array3 = array("\t",".", $jama['awb'], $jama['length'], $jama['width'], $jama['height'], $jama['quantity'], $jama['vol_weight'], $jama['actual_weight'], $jama['weight']);
                          fputcsv($handler, $array3);     
                        }
                    if($row){ $row++; continue; }
					}
	?>
<script>	
	window.alert("Successfully Exported <?php echo $file ?>"); 
			document.location.href = "home.php";
</script>
<?php 
} else {
?>
<script>   
       window.alert("You've already Exported <?php echo "Dayn(".date("m-d-Y", time()).")"; ?>");
       //document.location.href = "home.php";
  
</script>
<?php
}
}
?>
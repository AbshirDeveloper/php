<?php

//class Database {
//public $connection;
//    
//function __construct(){
//    $this->connection = new mysqli('localhost', 'myuser', 'abshir26', 'etawakal');
//}
//    
//public function query($sql){
//    $result = $this->connection->query($sql);
//    return $result;
//}
//}
//
//$database = new Database;
//
//class Functions {
//    public static function get_all(){
//    global $database;
//        
//    $sql = "select * from ".static::$table;
//        
//    $result = $database->query($sql);
//        
//    foreach ($result as $result){
//        echo $result[static::$table_column];
//        echo "<br />";
//    }
//    }
//}
//
//class dayn extends Functions {
//    protected static $table = "dayn";
//    protected static $table_column = "name";
//}
//
//dayn::get_all();

$connection = mysqli_connect('localhost', 'myuser', 'abshir26', 'webtomed');

global $connection;

?>

<html>
<head>
<style>
#customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#customers td, #customers th {
    border: 1px solid #ddd;
    padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4CAF50;
    color: white;
}
</style>
</head>
<body>
<div id="main">
    
    <form id="form" action="oop.php" method="post">
    <select name="product_name">
    <?php 
    $sql = "select * from test_products";
    $result = mysqli_query($connection, $sql);
        
    while($list = mysqli_fetch_array($result)){
    ?>
    <option><?php echo $list['product_name']; ?></option>
    <?php
    }
    ?>
    </select>
    <input type="submit" value="Submit" name="submit" />
    </form>
    
<?php 
  if(isset($_POST['submit'])){

global $connection;
$product = $_POST['product_name'];
$sql = "select * from test_products where product_name = '$product'";
$result = mysqli_query($connection, $sql);
while ($new_list = mysqli_fetch_array($result)){
    
$product_id =  $new_list['cat_id'];  
    
$sql = "SELECT * FROM test_categories WHERE cat_id=$product_id LIMIT 1";
$result = mysqli_query($connection, $sql);
//get first category
while ($cat = mysqli_fetch_array($result)){
$cat_name_second = $cat['cat_name'];
$cat_parent_id = $cat['cat_parent_id'];

//get product second category 
$sql3 = "SELECT * FROM test_categories WHERE cat_id=$cat_parent_id LIMIT 1";
$result3 = mysqli_query($connection, $sql3);
while ($cat2 = mysqli_fetch_array($result3)){
 $cat_name_first = $cat2['cat_name'];
}   
}

if(isset($cat_name_first) && isset($cat_name_second)){
echo "All Cars->".$cat_name_first."->".$cat_name_second."->".$product;
}
}
?>
<?php
}  
    
?>
    
<table id="customers">
  <tr>
    <th>Product Name</th>
    <th>Product Option</th>
  </tr>
  
<?php
$sql = "select * from test_products where product_id < 6";
$result = mysqli_query($connection, $sql);
while($product_list = mysqli_fetch_array($result)){
?>  <tr>
    <td><?php echo $product_list['product_name']; ?></td>
    <td><select>
    <?php $sql = "select * from test_assign_option_product where product_id = {$product_list['product_id']}";
    $result = mysqli_query($connection, $sql);
    while($lists = mysqli_fetch_array($result)){   
        $sql2 = "select * from test_options where option_id = {$lists['option_id']}";
        $result2 = mysqli_query($connection, $sql2);
        while($lists2 = mysqli_fetch_array($result2)){
    ?>
        <option><?php echo $lists2['option_name']; ?></option>
       <?php
    }
    } 
                                                                                            
?>
        </select>

      </td>
    </tr>
<?php
                                                  }
      ?>
    

    </table>
</div>    
</body>

</html>
<?php 

class qaacido {
    public static function select_sum_column($table, $column, $id){
        global $connection;
        $query = "select sum($column) from {$table} where id_customer = {$id}";
        $result = mysqli_query($connection, $query);
        $result2 = mysqli_fetch_object($result);
        foreach($result2 as $value){
            return $value;
        }
    }
    
     public static function select_sum($table, $column){
        global $connection;
        $query = "select sum($column) from {$table} limit 1";
        $result = mysqli_query($connection, $query);
        $result2 = mysqli_fetch_object($result);
        foreach($result2 as $value){
            return $value;
        }
    }
    
    public static function delete_product($awb){
        global $connection;
        $query = "delete from products where awb = {$awb} limit 1";
        $result = mysqli_query($connection, $query);
    }
    
    public static function delete_customer($id){
        global $connection;
        $query = "delete from customer where id = {$id} limit 1";
        $result = mysqli_query($connection, $query);
    }
}
$public = new qaacido();

?>
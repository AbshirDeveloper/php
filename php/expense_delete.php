<?php
$data = json_decode(file_get_contents("php://input"));
require_once("history_update.php"); 

$jawaab_celing = $public->get_by_id('expenses', 'id', $data);
$nam_description = $jawaab_celing['description'];
$amount = $jawaab_celing['r_balance'];

$sql = "delete from expenses where id = '$data'";
$sql2 = "delete from expenses where id_customer = '$data'";

$public->delete_both($sql, $sql2);

$pertain = "delete complete (".$nam_description.") expense";
$public->history_up($pertain, $amount);
?>
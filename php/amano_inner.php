<?php
$data = json_decode(file_get_contents("php://input"));
require_once("history_update.php"); 

$jawaab_celing = $public->get_by_id('amano', 'id', $data);
$name = $jawaab_celing['firstname']." ".$jawaab_celing['lastname'];
$jawaab = $public->get_by_id('amano', 'customer_id', $data);
$amount = $jawaab['balance'];
$id_needed = $jawaab['id'];


$pertain = "deleted from {$name} account";
$public->history_up($pertain, $amount);


$sql = "delete from amano where id = '$id_needed'";

$public->delete($sql);
?>
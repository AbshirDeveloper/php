
<?php
$abshir = "";
$one_day = 60*60*24;
$due_date = 60*60*24*4;

$today = time();
$due = $today + $due_date;
$days_left = $due_date / $one_day;
$remaining = $due - $today;
$remaining_days = $remaining / $one_day;

echo $remaining_days;
?>



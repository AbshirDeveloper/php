<?php
$file = 'abshir.php';
$handle = fopen($file, 'wb');

if($handle){
	echo "success";
} else {
	echo "denied";
}

?>
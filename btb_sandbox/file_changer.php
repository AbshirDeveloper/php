<?php


$file = ".";

if(is_dir($file)){
	$abshir = opendir($file);
	while($ibrahim = readdir($abshir)){
		echo "filename:" . $ibrahim . "<br/>";
	}
	closedir($abshir);
}


?>
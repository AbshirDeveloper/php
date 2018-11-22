<html>
<head>
    <title>basic</title>
</head>
<body>
	
<?php
$isniintiihore = strtotime('last monday');
	
$modified = strftime("*%m/*%d/*%y", $isniintiihore);
	
function remove($kabixid) {
	$cleared = str_replace("*0", "", $kabixid);
	$deepen = str_replace("*", "", $cleared);
	return $deepen;
}
	
$abshir = remove($modified);
	
echo $abshir;

	
	
?>
	
</body>
</html>
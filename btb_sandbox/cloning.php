<html>
<head>
    <title>basic</title>
</head>
<body>
	
<?php
class tijabo {
	public $somalia;
}
	
$a = new tijabo();
$a->somalia = "isbadalay";
$b = $a;
$b->somalia = "waa midkale";



	
$c = clone $a;
	
$c->somalia = "hadana";
echo $a->somalia;
	echo "</br>";
echo $c->somalia;

	


?>
	

</body>
</html>
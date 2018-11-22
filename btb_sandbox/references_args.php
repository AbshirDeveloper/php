<html>
<head>
    <title>basic</title>
</head>
<body>
	

<?php 
// similar exmaple that you created
function abshir(&$var) {
	$var++;
	return $var;
}	
	
$a = 0;
	
abshir($a);
	
echo $a;
	
echo "</br>";
	
?>
	
<?php
	
	//you are referencing the argument to the value that you will provide

	function ref_args(&$var) {
		$var = $var * 2;	
	};
	//this $a variable is referenced to the function. the function multiplies the whatever variable that i't passed in to 2
	$a = 10;
	//here it is, you passed that a into this function which is the referecing and then you echoed just the $a
	ref_args($a);
	
	//this echo will not return just the $a value, but it will return the $a value multiplied by 2 as the function would do. 
	echo $a
?>
	
</body>
</html>
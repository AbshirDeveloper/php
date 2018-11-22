<html>
<head>
    <title>basic</title>
</head>
<body>
	<?php
	$numbers = array(1,2,3,4,5,6);
	
	print_r($numbers);
	echo "</br>" . "</br>";
	
	//this array_shift function removes the first position value of the array 
	$a = array_shift($numbers);
	echo "a: " . $a . "</br>";
	print_r($numbers);
	echo "</br>" . "</br>";
	
	print_r($numbers);
	echo "</br>" . "</br>";
	
	// this array_unshift adds to the first position of the array 
	$b = array_unshift($numbers, 'first');
	echo "b: " . $b . "</br>";
	print_r($numbers);
	echo "</br>" . "</br>";
	
	
	echo "<hr />";
	
	print_r($numbers);
	echo "</br>" . "</br>";
	
	//this array_pop function removes the value of the last position of the array 
	$a = array_pop($numbers);
	echo "a: " . $a . "</br>";
	print_r($numbers);
	echo "</br>" . "</br>";
	
	print_r($numbers);
	echo "</br>" . "</br>";
	
	//this array_push add to the las the position of the array  
	$b = array_push($numbers, 'last');
	echo "b: " . $b . "</br>";
	print_r($numbers);
	echo "</br>" . "</br>";
	

	
	
	?>
	
</body>
</html>
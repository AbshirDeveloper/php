<html>
<head>
    <title>basic</title>
</head>
<body>
	
<?php
	//for this to happen you need to have the amber sand infront of the function name so that it's not just returning the value
	function &ref_args() {
		global $a;
		$a = $a * 2;
		return $a;
	};
	
	$a = 15;
	// in here, since you added that amber sand infront of the function name, the variable is being returned by the ref_args()
	$b =& ref_args();
	
	echo ("a:" . $a . "b:" . $b);
?>
	
</body>
</html>
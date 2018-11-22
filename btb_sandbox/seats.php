<html>
<head>
    <title>basic</title>
</head>
<body>
<?php

	/* loooook, this is even better exampole, the array that is creating down here contains letters that will be used to determine their respective variables. the variables listed here are named as letters. those letter will be matched with the ones in the array by using that $$ doubel dollar signs. i hope you got it */
	
	$a = "kevin";
	$b = "abshir";
	$c = "ahmed";
	$e = "ali";
	$f = "ibrahim";
	
	
	$students = array('a', 'c', 'f');
	
	foreach ($students as $geedi) {
		echo $$geedi . "</br>";
	};

?>
</body>
</html>
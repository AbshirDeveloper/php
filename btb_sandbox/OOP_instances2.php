<html>
<head>
    <title>basic</title>
</head>
<body>
	
<?php

class Person {
	var $first_name;
	var $last_name;
	
	var $leg_count = 2;
	var $arm_count = 2;
	
	function full_name() {
		return $this->first_name . " " . $this->last_name;
	}
}
	
$person = new Person();
	
$person->first_name = "abshir";
$person->last_name = "jama";
	
$ahmed = new Person();
	
$ahmed->first_name = "ahmed";
$ahmed->last_name = "jama";

	
echo $person->full_name() . "</br>";
echo $ahmed->full_name();
?>
	

</body>
</html>
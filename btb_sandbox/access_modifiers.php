<html>
<head>
    <title>basic</title>
</head>
<body>
	
<?php

class Person {
	//this is public you call it from everywhere
	public $first_name = "abshir";
	//this is protected you can only call it from inside the class or the subclass
	protected $last_name = "jama";
	//this is private and it can only by called from inside the class
	private $surname = "kow";

	function labo() {
		echo $this->surname;
	}
	
	}

// in this subclass, you can only access the protected and the public from the parent class	
class abshir extends Person {
	function siciid() {
		echo $this->first_name . "</br>";
		echo $this->last_name . "</br>";
		echo $this->surname . "</br>";
	
}
}
	
echo "</hr>";

// in here we created an instance of the parent class and we were able to call the private property

$ibrahim = new Person();
$ahmed = new abshir();
	
echo $ibrahim->labo();


?>
	

</body>
</html>
<html>
<head>
    <title>basic</title>
</head>
<body>
	
<?php
class A {
	static $number = 1;
	
	static function getthis() {
		return self::$number + 10;
		
	}
	
	 function youknow(){
		echo "hello . </br>";
	}
}
	
class b extends A {
	static function kow() {
		echo parent::$number;
	}
	static function labo() {
		echo parent::getthis();
	}
	//we created this function and the other one in class a to determine how useful is parent instead of $this, be adviced  
	function test() {
		echo parent::youknow();
	}
	}
	


echo b::$number . "</br>";
echo b::getthis() . "</br>";
	
echo b::kow() . "</br>";
echo b::labo() . "</br>";
	
echo "</hr>";

$brand = new b();
	
echo $brand->test();

?>
	

</body>
</html>
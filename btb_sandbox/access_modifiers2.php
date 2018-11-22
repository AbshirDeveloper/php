<html>
<head>
    <title>basic</title>
</head>
<body>
	
<?php
class SettersGetters {
	private $a = 3 ;
	
	public function geter() {
		return $this->a;
	}
	
	public function setter($value) {
		$this->a = $value;
	}
}

$example = new SettersGetters();
	
echo $example->geter() . "</br>";
echo $example->setter(4) . "</br>";
echo $example->geter();

?>
	

</body>
</html>
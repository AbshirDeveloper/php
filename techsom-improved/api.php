<?php
$json = json_decode(file_get_contents("https://api.coinmarketcap.com/v1/ticker/"));


foreach($json as $abshir){
	
	if($abshir->name == 'Bitcoin'){
	echo $abshir->symbol. "<br />";
	}
}

?>
<?php require_once("../includes/initiate.php"); ?>
<?php



function stript_zeros_from_date($date) {
	$after = str_replace("*0", "", $date);
	$later = str_replace("*", "", $after);
	return $later;
}

function redirect_to($location = NULL) {
	if($location != NULL) {
		header ("Location: {$location}");
		exit;
	}
}

function output_message($message="") {
	if(!emtpy($message)) {
		return "<p class=\"message\"> {$message} </p>";
	} else {
		return "";
	}
}

function __autoload($class_name){
	$class_name = strtolower($class_name);
	$path = "../includes/{$class_name}.php";
	if (file_exists($path)){
		require_once($path);
	} else {
		echo ("the file {$class_name}.php could not be found");
	}
}

function include_layout_template($template) {
	include(SITE_ROOT.DS.'includes'.DS.'layout'.DS.$template);
}

function log_action($action, $message){
	$dir = "../logs";
	$dir_exist = is_dir($dir) ? true : false;
	if ($dir_exist = false){
		mkdir($dir);
		chdir($logs);
		$file = "log.txt";
		$handler = fopen($file, 'w');
		$content = $action . $message;
		fwrite($handler, $content);
	} else {
		chdir($dir);
		$file = "log.txt";
		$handler = fopen($file, 'a');
		$time = date("m/d/Y h:m:s", time());
		$content ="{$time} | {$action}: {$message}\n";
		fwrite($handler, $content);
	}
}

function clear_log() {
	$file = "../logs/log.txt";
	$handler = fopen($file, 'w');
	fwrite($handler, '');
}

function read_log(){
	$file = "../logs/log.txt";
	$handler = fopen($file, 'r');
	while(!feof($handler)) {
		$entry = fgets($handler);
		echo "<li>{$entry}</li>"  . "<br />";
	}
}
?>
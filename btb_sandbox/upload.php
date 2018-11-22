<?php require_once("initiate.php"); ?>

<?php
if(isset($_POST['upload'])){
	$file = $_FILES['file_upload']['tmp_name'];
	$file_name = basename($_FILES['file_upload']['tmp_name']);
	$file_dir = "upload";
	if(move_uploaded_file($file, $file_dir."/".$file_name)){
	$message =  $_FILES['file_upload']['error'];
	}
}
?>

<html>
<head>

	
</head>
<body>
<?php
$error = array(
			UPLOAD_ERR_OK 			=> "Uploaded successfully",
			UPLOAD_ERR_INI_SIZE 	=> "The uploaded file exceeds the upload_max_filesize directive in php.ini",
            UPLOAD_ERR_FORM_SIZE 	=> "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form", 
            UPLOAD_ERR_PARTIAL      => "The uploaded file was only partially uploaded",
            UPLOAD_ERR_NO_FILE      => "No file was uploaded",
            UPLOAD_ERR_NO_TMP_DIR   => "Missing a temporary folder",
            UPLOAD_ERR_CANT_WRITE   => "Failed to write file to disk",
            UPLOAD_ERR_EXTENSION    => "File upload stopped by extension"
        );
?>
<?php if(isset($message)){
	$abshir = $error[$message]; 
	echo $abshir;
	echo "<hr />";	
	}
?>
<form action="upload.php" enctype="multipart/form-data" method="post">
	<input type="hidden" name="max_file_upload" value="1000000">
	<input type="file" name="file_upload" /> 
	<input type="submit" name="upload" value="Upload">
</form>	

</body>
</html>
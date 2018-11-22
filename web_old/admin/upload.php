<?php
 require_once('connect.php');



if(isset($_POST["home"])){
$image = basename($_FILES["fileToUpload"]["name"]);
if($image){

$target_dir = "../images/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
$uploadOk = 1;
$date = time();
	$title = $_POST['title'];
	$body = $_POST['body'];
	$content_id = $_POST['content_id'];
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
		return false;
    }

// Check if file already exists
if (file_exists($target_file)) {
	$date = time();
	global $connection;
		$sql2 = "insert into home (title, body, date, content_id, image) values ('{$title}','{$body}', {$date}, '{$content_id}', '{$image}')";
		$result2 = mysqli_query($connection, $sql2);
		header("location: home.php");
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
	return false;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
	return false;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
	return false;
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
		global $connection;
		$sql = "insert into home (title, body, date, content_id, image) values ('{$title}','{$body}', {$date}, '{$content_id}', '{$image}')";
		$result = mysqli_query($connection, $sql);
//        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
		header("location: home.php");
    } else {
        echo "Sorry, there was an error uploading your file.";
		return false;
    }
}
}elseif(isset($_POST["home"])){
	$title = $_POST['title'];
	$body = $_POST['body'];
	$content_id = $_POST['content_id'];
	$image = basename($_FILES["fileToUpload"]["name"]);
	$date = time();
	global $connection;
				$sql = "select * from home where content_id = '{$content_id}' ORDER BY id DESC limit 1";
				$query = mysqli_query($connection, $sql);
				$result = mysqli_fetch_array($query);
		$image = $result['image'];
		$sql2 = "insert into home (title, body, date, content_id, image) values ('{$title}','{$body}', {$date}, '{$content_id}', '{$image}')";
		$result2 = mysqli_query($connection, $sql2);
		header("location: home.php");
}
	}



//about

if(isset($_POST["about"])){
$image = basename($_FILES["fileToUpload"]["name"]);
if($image){

$target_dir = "../images/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
$uploadOk = 1;
$date = time();
	$title = $_POST['title'];
	$body = $_POST['body'];
	$content_id = $_POST['content_id'];
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
		return false;
    }

// Check if file already exists
if (file_exists($target_file)) {
	$date = time();
	global $connection;
		$sql2 = "insert into about (title, body, date, content_id, image) values ('{$title}','{$body}', {$date}, '{$content_id}', '{$image}')";
		$result2 = mysqli_query($connection, $sql2);
		header("location: about.php");
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
	return false;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
	return false;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
	return false;
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
		global $connection;
		$sql = "insert into about (title, body, date, content_id, image) values ('{$title}','{$body}', {$date}, '{$content_id}', '{$image}')";
		$result = mysqli_query($connection, $sql);
//        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
		header("location: about.php");
    } else {
        echo "Sorry, there was an error uploading your file.";
		return false;
    }
}
}elseif(isset($_POST["about"])){
	$title = $_POST['title'];
	$body = $_POST['body'];
	$content_id = $_POST['content_id'];
	$image = basename($_FILES["fileToUpload"]["name"]);
	$date = time();
	global $connection;
				$sql = "select * from about where content_id = '{$content_id}' ORDER BY id DESC limit 1";
				$query = mysqli_query($connection, $sql);
				$result = mysqli_fetch_array($query);
		$image = $result['image'];
		$sql2 = "insert into about (title, body, date, content_id, image) values ('{$title}','{$body}', {$date}, '{$content_id}', '{$image}')";
		$result2 = mysqli_query($connection, $sql2);
		header("location: about.php");
}
	}



//objectives

if(isset($_POST["objectives"])){
$image = basename($_FILES["fileToUpload"]["name"]);
if($image){

$target_dir = "../images/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
$uploadOk = 1;
$date = time();
	$title = $_POST['title'];
	$body = $_POST['body'];
	$content_id = $_POST['content_id'];
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
		return false;
    }

// Check if file already exists
if (file_exists($target_file)) {
	$date = time();
	global $connection;
		$sql2 = "insert into objectives (title, body, date, content_id, image) values ('{$title}','{$body}', {$date}, '{$content_id}', '{$image}')";
		$result2 = mysqli_query($connection, $sql2);
		header("location: objectives.php");
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
	return false;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
	return false;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
	return false;
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
		global $connection;
		$sql = "insert into objectives (title, body, date, content_id, image) values ('{$title}','{$body}', {$date}, '{$content_id}', '{$image}')";
		$result = mysqli_query($connection, $sql);
//        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
		header("location: objectives.php");
    } else {
        echo "Sorry, there was an error uploading your file.";
		return false;
    }
}
}elseif(isset($_POST["objectives"])){
	$title = $_POST['title'];
	$body = $_POST['body'];
	$content_id = $_POST['content_id'];
	$image = basename($_FILES["fileToUpload"]["name"]);
	$date = time();
	global $connection;
				$sql = "select * from objectives where content_id = '{$content_id}' ORDER BY id DESC limit 1";
				$query = mysqli_query($connection, $sql);
				$result = mysqli_fetch_array($query);
		$image = $result['image'];
		$sql2 = "insert into objectives (title, body, date, content_id, image) values ('{$title}','{$body}', {$date}, '{$content_id}', '{$image}')";
		$result2 = mysqli_query($connection, $sql2);
		header("location: objectives.php");
}
	}


//vision

if(isset($_POST["vision"])){
$image = basename($_FILES["fileToUpload"]["name"]);
if($image){

$target_dir = "../images/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
$uploadOk = 1;
$date = time();
	$title = $_POST['title'];
	$body = $_POST['body'];
	$content_id = $_POST['content_id'];
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
		return false;
    }

// Check if file already exists
if (file_exists($target_file)) {
	$date = time();
	global $connection;
		$sql2 = "insert into vision (title, body, date, content_id, image) values ('{$title}','{$body}', {$date}, '{$content_id}', '{$image}')";
		$result2 = mysqli_query($connection, $sql2);
		header("location: vision.php");
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
	return false;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
	return false;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
	return false;
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
		global $connection;
		$sql = "insert into vision (title, body, date, content_id, image) values ('{$title}','{$body}', {$date}, '{$content_id}', '{$image}')";
		$result = mysqli_query($connection, $sql);
//        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
		header("location: vision.php");
    } else {
        echo "Sorry, there was an error uploading your file.";
		return false;
    }
}
}elseif(isset($_POST["vision"])){
	$title = $_POST['title'];
	$body = $_POST['body'];
	$content_id = $_POST['content_id'];
	$image = basename($_FILES["fileToUpload"]["name"]);
	$date = time();
	global $connection;
				$sql = "select * from vision where content_id = '{$content_id}' ORDER BY id DESC limit 1";
				$query = mysqli_query($connection, $sql);
				$result = mysqli_fetch_array($query);
		$image = $result['image'];
		$sql2 = "insert into vision (title, body, date, content_id, image) values ('{$title}','{$body}', {$date}, '{$content_id}', '{$image}')";
		$result2 = mysqli_query($connection, $sql2);
		header("location: vision.php");
}
	}


//contact

if(isset($_POST["contact"])){
	$address = $_POST['address'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$f_link = $_POST['facebook'];
	$t_link = $_POST['twitter'];
	$y_link = $_POST['youtube'];
	global $connection;
		$sql2 = "insert into contact (address, phone, email, f_link, t_link, y_link) values ('{$address}', '{$phone}', '{$email}', '{$f_link}', '{$t_link}', '{$y_link}')";
		$result2 = mysqli_query($connection, $sql2);
		header("location: contact.php");
}

//slider

if(isset($_POST['slider'])){
$image = basename($_FILES["fileToUpload"]["name"]);
if($image){
$target_dir = "../images/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
$uploadOk = 1;
$date = time();
	$title = $_POST['title'];
	$body = $_POST['body'];
	$content_id = $_POST['content_id'];
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
		return false;
    }

// Check if file already exists
if (file_exists($target_file)) {
	$date = time();
	global $connection;
		$sql2 = "insert into slider (picture_name) values ('{$image}')";
		$result2 = mysqli_query($connection, $sql2);
		header("location: home.php");
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
	return false;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
	return false;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
	return false;
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
		global $connection;
		$sql = "insert into slider (picture_name) values ('{$image}')";
		$result = mysqli_query($connection, $sql);
//        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
		header("location: home.php");
    } else {
        echo "Sorry, there was an error uploading your file.";
		return false;
    }
}
}else{
	echo "no image";
}
	
}

<?php 

if(isset($_POST['upload'])){
//    $first_name = $_POST['first'];
//    $last_name = $_POST['last'];
//    $phone = $_POST['phone'];
//    $email = $_POST['email'];
//    $psw = $_POST['psw'];
//    $psw_repeat = $_POST['psw_repeat'];
    
    $id = $_POST['id'];
    
    $name = $_FILES['file']['name'];
    $tmp_name = $_FILES['file']['tmp_name'];
    
//    $location = 'uploads';
//    $directory = "$location/$id";
    
// chdir("uploads");   
    
      $oldmask = umask(0);
      mkdir($id, 0777);
      umask($oldmask);
    
//if(file_exists($id)){
   
//    if(copy($tmp_name, "$id/$name")){
//        header("location: http://noortaxservice.com/customers?success=1");
//    } else {
//        echo "failed";
//    }
    
//} else {  
//      if(copy($tmp_name, "$id/$name")){
//        header("location: http://noortaxservice.com/customers?success=1");
//    } else {
//        echo "failed";
//    }    
//}
}

?>
<form action="try.php" method="post" enctype="multipart/form-data">
    <select name="id"><option>377</option></select>
    <input type="file" name="file" />
    <input type="submit" value="Upload" name="upload" />  
</form>
<?php
error_reporting(E_ALL);
// error_reporting(0);
ini_set('display_errors',1);
if (!isset($_SESSION)) {
  session_start();
}
  
 include '../config/dbconnect.php';
//  include '../views/register.php';



  if($_SERVER["REQUEST_METHOD"] == "POST")  {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $useremail = $_POST['useremail'];
    $phoneno = $_POST['userphone'];
    // $userprofile = $_POST['userprofile'];
    $useraddress = $_POST['useraddress'];
    $userpwd =md5($_POST['userpwd']);
    $cpassword =md5($_POST['cpassword']);
    // $_SESSION['useremail']=$useremail;
    $select="SELECT * from register where useremail='$useremail'";
    $result=mysqli_query($conn,$select);
      if(mysqli_num_rows($result)>0){
          echo 'email already exists';
      }
      if($userpwd != $cpassword){
        echo "passwords doesn't match";
      }
      // profile upload
      $target_dir = "../../src/uploads/";
      $target_dir_link = "http://localhost/corephp_mvc";
      $target_file = $target_dir . basename($_FILES["userprofile"]["name"]);
      $uploadOk = 1;
      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
      
      // Check if image file is a actual image or fake image
      
        $check = getimagesize($_FILES["userprofile"]["tmp_name"]);
        if($check !== false) {
          echo "File is an image - " . $check["mime"] . ".";
          $uploadOk = 1;
        } else {
          echo "File is not an image.";
          $uploadOk = 0;
        }
      
      // Check if file already exists
      if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
      }
      
      // Check file size
      if ($_FILES["userprofile"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
      }
      
      // Allow certain file formats
      if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
      && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
      }
      
      if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
      // if everything is ok, try to upload file
      } else {
        if (move_uploaded_file($_FILES["userprofile"]["tmp_name"], $target_file)) {
          $target_dir_con = $target_dir_link . $target_dir;
          echo  $target_dir_con;
          echo "The file ". htmlspecialchars( basename( $_FILES["userprofile"]["name"])). " has been uploaded.";
        } else {
          echo "Sorry, there was an error uploading your file.";
        }
      }

          $register="INSERT into register(firstname,lastname,username,useremail,phone,profile,address,userpwd) values('$firstname','$lastname','$username','$useremail','$phoneno','$target_dir_con','$useraddress','$userpwd')";
          $result = mysqli_query($conn,$register);
          if($result){
            echo "User Created Successfully.";
        }
  }
     
  else{          
    echo "login failed";
  }
?>  
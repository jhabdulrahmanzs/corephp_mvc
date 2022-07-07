<?php
error_reporting(E_ALL);
ini_set('display_errors',1);
  session_start();
  
 include '../config/dbconnect.php';
 include '../views/register.php';

 $nameErr = $emailErr = "";


//  function submit(){

  if(isset($_POST['reg_submit']))  {
    $username = $_POST['username'];
    $useremail = $_POST['useremail'];
    $_SESSION['useremail']=$useremail;
    $userpwd =md5($_POST['userpwd']);
    $cpassword =md5($_POST['cpassword']);
    $select="SELECT * from register where useremail='$useremail'";
    $result=mysqli_query($conn,$select);
    if(mysqli_num_rows($result)>0)
    {
        echo 'email already exists';
    }
    elseif($_SERVER["REQUEST_METHOD"] == "POST") {
      if (empty($_POST["username"])) {
        $nameErr = "Name is required";
      } else {
        $name = test_input($_POST["username"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
          $nameErr = "Only letters and white space allowed";
        }
      }

      if (empty($_POST["useremail"])) {
        $emailErr = "Email is required";
      } else {
        $email = test_input($_POST["useremail"]);
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $emailErr = "Invalid email format";
        }
      }
    }
    elseif($userpwd != $cpassword){
         echo "passwords doesn't match";
    }  
    
  }
  else{
    $register="INSERT into register(username,useremail,userpwd) values('$username','$useremail','$userpwd')";
        $result = mysqli_query($conn,$register);
        if($result){
           echo "User Created Successfully.";
        }
  }

  function test_input($data) {
    $data = trim($data);
    $data = htmlspecialchars($data);
    return $data;
  }
?>  
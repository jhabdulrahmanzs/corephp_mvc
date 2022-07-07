<?php
// error_reporting(E_ALL);
// ini_set('display_errors',1);
if (!isset($_SESSION)) {
  session_start();
}
  
 include '../config/dbconnect.php';
 include '../views/register.php';

//  $nameErr = $emailErr = "";


//  function submit(){

  if(isset($_POST['reg_submit']))  {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $useremail = $_POST['useremail'];
    $phoneno = $_POST['userphone'];
    $userprofile = $_POST['userprofile'];
    $useraddress = $_POST['useraddress'];
    $userpwd =md5($_POST['userpwd']);
    $cpassword =md5($_POST['cpassword']);
    // $_SESSION['useremail']=$useremail;
    $select="SELECT * from register where useremail='$useremail'";
    $result=mysqli_query($conn,$select);
    if(mysqli_num_rows($result)>0)
    {
        echo 'email already exists';
    }
    elseif($userpwd != $cpassword){
             echo "passwords doesn't match";
        }
  //   elseif(isset($required)){

  // $required = array('firstname', 'lastname', 'username', 'useremail', 'userphone', 'userprofile','useraddress','userpwd','cpassword');

  // $error = false;
  // foreach($required as $field) {
  //   if (empty($_POST[$field])) {
  //     $error = true;
  //   }
  // }

  // if ($error) {
  //   echo "All fields are required.";
  // } else {
  //   echo "Proceed...";
  // }
  //   }  

    else{
    
      $register="INSERT into register(firstname,lastname,username,useremail,phone,profile,address,userpwd) values('$firstname','$lastname','$username','$useremail','$phoneno','$userprofile','$useraddress','$userpwd')";
          $result = mysqli_query($conn,$register);
          if($result){
            echo "User Created Successfully.";
          }
    }
}

?>  
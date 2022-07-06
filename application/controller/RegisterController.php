<?php
  session_start();
  
 include '../config/dbconnect.php';
 include '../views/register.php';




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
      echo"<script>alert('email is already taken')</script>";
      echo"<script>windows.open('register.php')</script>";
    }
    else
    {
      $register="INSERT into register(username,useremail,userpwd,cpassword) values('$username','$useremail','$userpwd','$cpassword')";
    if(mysqli_query($conn, $register)){
      header("Location: http://localhost/corephp_mvc/application/views/home.php");
 
      exit;
    }
    else{
        echo "Error:". $sql. "". mysqli_errors($conn);
    }
    mysqli_close($conn);
  }
  }
?>  
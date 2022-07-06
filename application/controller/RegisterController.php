<?php
 
 include('../config/dbconnect.php');
 include('../views/register.php');

 
//  function submit(){

  if(isset($_POST['reg_submit']))  {
    $username = $_POST['username'];
    $useremail = $_POST['useremail'];
    $userpwd = $_POST['userpwd'];
    $sql = 'insert into register(username,useremail,userpwd) values("'.$username.'","'.$useremail.'","'.$userpwd.'")';
    if(mysqli_query($conn, $sql)){
      header("Location: http://localhost/corephp_mvc/application/views/home.php");
 
      exit;
    }
    else{
        echo "Error:". $sql. "". mysqli_errors($conn);
    }
    mysqli_close($conn);
  }

?>  
<?php
 
 include '../config/dbconnect.php';
 include '../views/register.php';

 session_start();


//  function submit(){

  if(isset($_POST['reg_submit']))  {
    $username = $_POST['username'];
    $useremail = $_POST['useremail'];
    $userpwd = $_POST['userpwd'];
    $_SESSION['username'] = $username;
    $sql = 'insert into register(username,useremail,userpwd) values("'.$username.'","'.$useremail.'","'.$userpwd.'")';
    

    // $uname = $_POST ["username"];  
    // if (!preg_match ("/^[a-zA-z]*$/", $uname) ) {  
    //     $ErrMsg = "Only alphabets and whitespace are allowed.";  
    //             echo $ErrMsg;  
    // } else {  
    //     echo $uname;  
    // }  

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
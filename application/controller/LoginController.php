<?php
    include('../config/dbconnect.php');
    session_start();
    if(isset($_POST['submit']))  {
        $useremail = $_POST['useremail'];
        $userpwd = $_POST['password'];
        $sql = "select * from register where useremail='$useremail' AND password ='$userpwd'";
        if(mysqli_query($conn, $sql)){
            echo "welcome guest";
        }
        else{
            echo(print_r());
        }
        mysqli_close($conn);
      }
?>
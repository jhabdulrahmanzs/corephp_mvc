<?php
session_start();

include '../config/dbconnect.php';
include '../views/login.php';
//$regex="/^(?=\P{Ll}*\p{Ll})(?=\P{Lu}*\p{Lu})(?=\P{N}*\p{N})(?=[\p{L}\p{N}]*[^\p{L}\p{N}])[\s\S]{8,}$/";
if(isset($_POST['Login']))
{
    $useremail=$_POST['useremail'];
    $_SESSION['useremail']=$useremail;
    $userpwd=md5($_POST['userpwd']);
    $useremail=filter_var($useremail,FILTER_SANITIZE_EMAIL);
    if(filter_var($useremail,FILTER_VALIDATE_EMAIL))
    {
        echo "valid email format";
        $query=" SELECT * from register where   useremail='$useremail' AND userpwd='$userpwd'";
        // print_r($query);
         $connect=mysqli_query($conn,$query);
         $result=mysqli_num_rows($connect);
         // print_r($result);
         if($result==0)
         {
             echo"<script>alert('password or email is wrong')</script>";
             exit();
         }
         else{
             echo"<script>alert('you have loggied in successfully')</script>";
             echo"<script>window.open('http://localhost/corephp_mvc/application/views/home.php','_self')</script>";
         }
    }
    else
    {
        echo "Invalid eg:example@gmail.com";
    }
}

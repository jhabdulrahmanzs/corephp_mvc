<?php
session_start();

include '../config/dbconnect.php';
include '../views/login.php';
if(isset($_POST['Login']))
{
    // $username=$_POST['username'];
    // $_SESSION['username'] = $username;
    $useremail=$_POST['useremail'];
    $_SESSION['useremail']=$useremail;
    // print_r($username);
    $userpwd=$_POST['userpwd'];
    // print_r($userpwd);
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

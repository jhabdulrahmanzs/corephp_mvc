<?php
session_start();

include '../config/dbconnect.php';
include '../views/login.php';
if(isset($_POST['Login']))
{
    // $username=$_POST['username'];
    // $_SESSION['username'] = $username;
    $useremail=$_POST['useremail'];
    // if (preg_match("/^(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){255,})(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){65,}@)(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22))(?:\.(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-[a-z0-9]+)*\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-[a-z0-9]+)*)|(?:\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\]))$/iD", strtolower($useremail))) {
    //     echo "valid email";
    // }
    // else
    // {
    //     echo "Invalid email";
    // }
    $_SESSION['useremail']=$useremail;
    // print_r($username);
    $userpwd=md5($_POST['userpwd']);
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

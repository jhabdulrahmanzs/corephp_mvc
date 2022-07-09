<?php
session_start();
include ('../config/dbconnect.php');
if (isset($_POST['useremail']) && isset($_POST['userpwd'])) {
    $useremail=$_POST['useremail'];
    $userpwd=md5($_POST['userpwd']);
    $query = " SELECT * from register where  useremail='$useremail' AND userpwd='$userpwd'";
    // print_r($query);
    $connect = mysqli_query($conn, $query);
    $result = mysqli_num_rows($connect);
    // print_r($result);
    if ($result == 0) {
        echo "<script>alert('password or email is wrong')</script>";
        echo "<script>window.open('http://localhost/corephp_mvc/application/views/logout.php','_self')</script>";
    } else {
        echo "<script>alert('you have loggied in successfully')</script>";

        $_SESSION['useremail'] = $useremail;
        echo "<script>window.open('http://localhost/corephp_mvc/application/views/home.php','_self')</script>";
    }
}
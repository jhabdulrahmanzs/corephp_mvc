<?php
session_start();
$email = $_SESSION['useremail'];
include('../config/dbconnect.php');
if (isset($_POST['Update'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $useremail = $_POST['useremail'];
    $phone = $_POST['phone'];
    $target_dir_link = "http://localhost/corephp_mvc/src/uploads/";
    $profile = $_FILES['profile']['name'];
    $profile_temp=$_FILES['profile']['tmp_name'];

    move_uploaded_file($profile_temp , "../../src/uploads/$profile");
    
    $address = $_POST['address'];
    $profileURL=$target_dir_link.$profile;
    $sql = "UPDATE register set firstname='$firstname',lastname='$lastname',username='$username',useremail='$useremail',
    phone ='$phone',profile='$profileURL',address='$address' where useremail='$email'";
    $query = mysqli_query($conn, $sql);
    if ($query) {
        echo "<script>alert('User Has Been Updated successfully ')</script>";

        echo "<script>window.open('http://localhost/corephp_mvc/application/views/home.php','_self')</script>";
    }
}

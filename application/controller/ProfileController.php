<?php
include('../config/dbconnect.php');
if (isset($_POST['Update'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $useremail = $_POST['useremail'];
    $userphone = $_POST['phone'];
    $userprofile = $_POST['profile'];
    $useraddress = $_POST['address'];

    $sql = "UPDATE register set firstname='$firstname',lastname='$lastname',username='$username',useremail='$useremail',
    userphone ='$userphone',userprofile='$userprofile',useraddress='$useraddress',userpwd ='$userpwd '";
    $query = mysqli_query($conn, $sql);
    if ($query) {
        echo "<script>alert('User Has Been Updated successfully ')</script>";

        echo "<script>window.open(home.php','_self')</script>";
    }
}

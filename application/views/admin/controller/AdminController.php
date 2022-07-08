<?php
session_start();
include '../../../config/dbconnect.php';
if (isset($_POST['Login'])) {
    $admin_email = $_POST['admin_email'];
    $admin_pass = $_POST['admin_pass'];
    // print_r($admin_email);
    // print_r($admin_pass);
    if ($admin_email == "" && $admin_pass == "") {
        echo "<script>alert('Please the MailId and Password , the filed is Empty!')</script>";
        echo "<script>window.open('http://localhost/corephp_mvc/application/views/admin/views/login.php','_self')</script>";
    } else {
        if ($admin_email && $admin_pass == "") {
            echo "<script>alert('Please type the password')</script>";
            echo "<script>window.open('http://localhost/corephp_mvc/application/views/admin/views/login.php','_self')</script>";
        }
        if ($admin_email and $admin_pass) {
            // print_r($admin_email);
            // print_r($admin_pass);
            $admin_email = filter_var($admin_email, FILTER_SANITIZE_EMAIL);
            if (filter_var($admin_email, FILTER_VALIDATE_EMAIL)) {
                if (strlen($admin_pass <= 6)) {
                    echo "<script>alert('Password is Invalid Must be Greater than 8')</script>";
                    echo "<script>window.open('http://localhost/corephp_mvc/application/views/admin/views/login.php','_self')</script>";
                } elseif (!preg_match("#[0-9]+#", $admin_pass)) {
                    echo "<script>alert('Atleast contain Numbers 0-9')</script>";
                    echo "<script>window.open('http://localhost/corephp_mvc/application/views/admin/views/login.php','_self')</script>";
                } else {
                    // echo "valid email format";    
                    $query = " SELECT * from admin where admin_email='$admin_email' AND admin_pass='$admin_pass'";
                    // print_r($query);
                    $connect = mysqli_query($conn, $query);
                    $result = mysqli_num_rows($connect);
                    // print_r($result);
                    if ($result == 0) {
                        echo "<script>alert('password or email is wrong')</script>";
                        echo "<script>window.open('http://localhost/corephp_mvc/application/views/admin/views/login.php','_self')</script>";
                    } else {
                        echo "<script>alert('you have loggied in successfully')</script>";
                        echo "<script>window.open('http://localhost/corephp_mvc/application/views/admin/views/dashboard.php','_self')</script>";
                    }
                }
            }
            // }elseif (!preg_match("#[0-9]+#", $admin_pass)) {
            //     echo "<script>alert('Password is Invalid Must contain Numbers 0-9')</script>";
            // echo "<script>window.open('http://localhost/corephp_mvc/application/views/admin/views/login.php','_self')</script>";
            // } elseif (!preg_match("#[A-Z]+#", $admin_pass)) {
            //     $passwordErr = "Your Password Must Contain At Least 1 Capital Letter!";
            // } elseif (!preg_match("#[a-z]+#", $admin_pass)) {
            //     $passwordErr = "Your Password Must Contain At Least 1 Lowercase Letter!";
            // } 
            else {
                echo "<script>alert('your MailId is Invalid eg:example@gmail.com')</script>";
                echo "<script>window.open('http://localhost/corephp_mvc/application/views/admin/views/login.php','_self')</script>";
            }
        }
    }
}

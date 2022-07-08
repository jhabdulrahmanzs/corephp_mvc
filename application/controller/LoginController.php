<?php
session_start();

include '../config/dbconnect.php';
if (isset($_POST['Login'])) 
{
    $useremail = $_POST['useremail'];
    $_SESSION['useremail'] = $useremail;
    $userpwd = md5($_POST['userpwd']);
    if ($useremail == "" && $userpwd == "") 
    {
        echo "<script>alert('Please the MailId and Password , the filed is Empty!')</script>";
        echo "<script>window.open('http://localhost/corephp_mvc/application/views/logout.php','_self')</script>";
    } 
    else 
    {
        if ($useremail && $userpwd == "") 
        {
            echo "<script>alert('Password can't be Empty')</script>";
            echo "<script>window.open('http://localhost/corephp_mvc/application/views/logout.php','_self')</script>";
        }
        if ($useremail && $userpwd) 
        {
            $useremail = filter_var($useremail, FILTER_SANITIZE_EMAIL);
            if (filter_var($useremail, FILTER_VALIDATE_EMAIL)) 
            {
                if (strlen($userpwd <= 6)) {
                    echo "<script>alert('Password is Invalid Must be Greater than 6')</script>";
                    echo "<script>window.open('http://localhost/corephp_mvc/application/views/admin/views/login.php','_self')</script>";
                } elseif (!preg_match("#[0-9]+#", $userpwd)) {
                    echo "<script>alert('Atleast contain Numbers 0-9')</script>";
                    echo "<script>window.open('http://localhost/corephp_mvc/application/views/admin/views/login.php','_self')</script>";
                } else {
                    // echo "valid email format";    
                    $query = " SELECT * from register where   useremail='$useremail' AND userpwd='$userpwd'";
                    // print_r($query);
                    $connect = mysqli_query($conn, $query);
                    $result = mysqli_num_rows($connect);
                    // print_r($result);
                    if ($result == 0) {
                        echo "<script>alert('password or email is wrong')</script>";
                        echo "<script>window.open('http://localhost/corephp_mvc/application/views/logout.php','_self')</script>";
                    } else {
                        echo "<script>alert('you have loggied in successfully')</script>";
                        echo "<script>window.open('http://localhost/corephp_mvc/application/views/home.php','_self')</script>";
                    }
                }
            } else 
            {
                echo "<script>alert('your MailId is Invalid eg:example@gmail.com')</script>";
                echo "<script>window.open('http://localhost/corephp_mvc/application/views/logout.php','_self')</script>";
            }
        }
    }
}

<?php
session_start();

include '../config/dbconnect.php';
include '../views/login.php';
if (isset($_POST['Login'])) 
{
    $useremail = $_POST['useremail'];
    $userpwd = md5($_POST['userpwd']);
    if ($useremail == "" && $userpwd == "") 
    {
        echo "<script>alert('Please the MailId and Password , the filed is Empty!')</script>";
        echo "<script>window.open('http://localhost/corephp_mvc/application/views/logout.php','_self')</script>";
    } 
    else 
    {
        // if ($useremail && $userpwd == "") 
        // {
        //     echo "<script>alert('Password can't be Empty')</script>";
        //     echo "<script>window.open('http://localhost/corephp_mvc/application/views/logout.php','_self')</script>";
        // }
        if ($useremail && $userpwd)  {
            $useremail = filter_var($useremail, FILTER_SANITIZE_EMAIL);
            if (filter_var($useremail, FILTER_VALIDATE_EMAIL)) {
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
                        
                        $_SESSION['useremail'] = $useremail;
                        echo "<script>window.open('http://localhost/corephp_mvc/application/views/home.php','_self')</script>";
                    }
                
            }
        } else  {
                echo "<script>alert('your MailId is Invalid eg:example@gmail.com')</script>";
                echo "<script>window.open('http://localhost/corephp_mvc/application/views/logout.php','_self')</script>";
            }
        }
   
}

<?php
session_start();
include '../../../config/dbconnect.php';
if(isset($_POST['Login']))
{
    $admin_email=$_POST['admin_email'];
    $admin_pass=$_POST['admin_pass'];
    $useremail=filter_var($useremail,FILTER_SANITIZE_EMAIL);
    if(filter_var($useremail,FILTER_VALIDATE_EMAIL))
    {
       // echo "valid email format";    
        $query=" SELECT * from admin where admin_email='$admin_email' AND admin_pass='$admin_pass'";
        // print_r($query);
         $connect=mysqli_query($conn,$query);
         $result=mysqli_num_rows($connect);
         // print_r($result);
         if($result==0)
         {
             echo"<script>alert('password or email is wrong')</script>";
             echo"<script>window.open('http://localhost/corephp_mvc/application/views/admin/views/login.php','_self')</script>";
         }
         else{
             echo"<script>alert('you have loggied in successfully')</script>";
             echo"<script>window.open('http://localhost/corephp_mvc/application/views/admin/views/dashboard.php','_self')</script>";
         }
    }
    else
    {
        echo"<script>alert('your MailId is Invalid eg:example@gmail.com')</script>";
        echo"<script>window.open('http://localhost/corephp_mvc/application/views/admin/views/login.php','_self')</script>";
    }

}

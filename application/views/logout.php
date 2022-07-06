<?php
session_start();

session_destroy();
echo "<script>window.open('http://localhost/corephp_mvc/application/views/login.php','_self')</script>";

?>
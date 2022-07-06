<?php
session_start();

session_destroy();
header('Location: http://localhost/corephp_mvc/application/views/login.php');

?>
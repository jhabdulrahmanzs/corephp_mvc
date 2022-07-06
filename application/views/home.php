<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home page</title>
</head>
<body>
<?php
session_start();
if(!isset($_SESSION['useremail']) || empty($_SESSION['useremail'])) {
    echo 'Welcome Guest.';
} else {
    echo 'Welcome ' . $_SESSION['useremail'];
}
?>
    <h1>You will see something great soon</h1>
    
    <p><a href="logout.php">Logout</a></p>
</body>
</html>
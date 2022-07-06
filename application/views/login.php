<?php 
session_start();

// error_reporting(0);
if(isset($_SESSION['useremail'])){
    header('Location: http://localhost/corephp_mvc/application/views/home.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">

    <link href="../../src/css/login.css" rel="stylesheet" type="text/css">
</head>
<title>login</title>

<body>
    <div class="login">
        <form action="http://localhost/corephp_mvc/application/controller/LoginController.php" method="post">
            <label for="useremail">
                <i class="fas fa-user"></i>
            </label>
            <input type="text" name="useremail" placeholder="useremail" id="useremail" required>
            <label for="password">
                <i class="fas fa-lock"></i>
            </label>
            <input type="password" name="userpwd" placeholder="Password" id="password" required>
            <input type="submit" value="Login" name="Login">
            <p><a href="register.php">register here</a></p>

        </form>
    </div>
</body>

</html>
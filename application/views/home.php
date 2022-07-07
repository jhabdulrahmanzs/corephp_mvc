
<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="../../src/css/style.css" rel="stylesheet" type="text/css">
    <title>Home page</title>

</head>
<body>

           

<?php
 include 'templates/header.php';


if(!isset($_SESSION['useremail']) || empty($_SESSION['useremail'])) {
    header('Location: http://localhost/corephp_mvc/application/views/login.php');
} else {
    echo '<center> Welcome ' . $_SESSION['useremail'] . '</center>';
}
?> 
    <center><h1>You will see something great soon</h1></center>
    
   
</body>
</html>
<?php
//include('../views/templates/header.php');
include('../config/dbconnect.php');
session_start();
$email = $_SESSION['useremail'];
if (isset($email)) {
    $sql = " SELECT * FROM register where useremail='$email'";
} else {
    header('Location: http://localhost/corephp_mvc/application/views/login.php');
}
$result = mysqli_query($conn,$sql);
if(!isset($result)){
    echo "failed";
}
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="../../src/css/style.css" rel="stylesheet" type="text/css">
    <link href="../../src/css/header.css" rel="stylesheet" type="text/css">
    <link href="../../src/css/footer.css" rel="stylesheet" type="text/css">
    <link href="../../src/css/profile.css" rel="stylesheet" type="text/css">
    <style>

    </style>
</head>

<body>

<?php
 include 'templates/header.php';

?>
<main>
<!-- <h2 style="text-align:center">Profile View</h2> -->

<div class="card profile-card">
    <?php
    while ($rows = mysqli_fetch_assoc($result)) {
    ?>
        <div style="width:100%; text-align:center">
            <img src="<?php echo $rows['profile'];?>" alt="UserProfile"   width="50%">
        </div>
        <!-- <img src="" alt="UserProfile"   width="50%"> -->
        <h4><?php echo $rows['username'];?></h4>
        <p class="email"><?php echo $rows['useremail'];?></p>
        <p><?php echo $rows['phone'];?></p>
        <p><Address><?php echo $rows['address'];?></Address></p>

    <div>
     
        <p><a href="Myprofile.php" class="edit"><b>Edit Your Profile</b></a></p>
    </div>
    <!-- <a href="http://localhost/corephp_mvc/application/views/home.php">Home Page</a> -->
    <?php
    }
?>
</div>

</main>

   

    <?php
 include 'templates/footer.php';

?>

</body>

</html>
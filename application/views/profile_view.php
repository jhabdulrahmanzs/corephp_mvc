<?php
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
    <link href="../../src/css/profile.css" rel="stylesheet" type="text/css">
    <style>

    </style>
</head>

<body>

    <h2 style="text-align:center">Profile View</h2>

    <div class="card">
        <?php
        while ($rows = mysqli_fetch_assoc($result)) {
        ?>

            <img src="<?php echo $rows['profile'];?>" alt="UserProfile"   width="50%">
            <!-- <img src="" alt="UserProfile"   width="50%"> -->
            <h1><?php echo $rows['username'];?></h1>
            <p class="email"><?php echo $rows['useremail'];?></p>
            <p><?php echo $rows['phone'];?></p>
            <p><Address><?php echo $rows['address'];?></Address></p>

        <div>
        <p><a href="Myprofile.php" class="edit"><b>Edit Your Profile</b></a></p>
        </div>
        <?php
        }
?>
    </div>

</body>

</html>
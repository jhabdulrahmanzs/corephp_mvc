 <?php
 session_start();
    $useremail=$_SESSION['useremail'];

    include('../config/dbconnect.php');
    //if (isset($_GET['Myprofile'])) {
    $sql = "SELECT * from register where useremail='$useremail'";
    //print_r($sql);
    $run = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($run);
    $firstname = $row['firstname'];
    $lastname = $row['lastname'];
    $username = $row['username'];
    $useremail = $row['useremail'];
    $phone = $row['phone'];
    $profile = $row['profile'];
    $address = $row['address'];
    //}
    ?>

    <!doctype html>
    <html lang="en">

    <head>
        <!--  meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
       
        <link href="../../src/css/header.css" rel="stylesheet" type="text/css">
         <link href="../../src/css/style.css" rel="stylesheet" type="text/css">
        <link href="../../src/css/footer.css" rel="stylesheet" type="text/css">
        <link href="../../src/css/register.css" rel="stylesheet" type="text/css">
        <title>Edit Profile</title>
    </head>

    <body>
    <?php
 include 'templates/header.php';

?>
<main>
<div class="form-bg">
            <div class="container">
                <div class="lay-container">
                    <div class="form-container">
                        <h3 class="title">Edit Your Profile</h3>
                        <form class="form-horizontal" method="POST" action="../controller/ProfileController.php" enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="required" for="fname">First Name</label>
                                <input type="text" class="form-control" id="fname" name="firstname" required value="<?php echo $firstname; ?>">

                            </div>
                            <div class="form-group">
                                <label class="required" for="lname">last Name</label>
                                <input type="text" class="form-control" id="lname" name="lastname" required value="<?php echo $lastname; ?>">

                            </div>
                            <div class="form-group">
                                <label class="required" for="username">User Name</label>
                                <input type="text" class="form-control" name="username" required value="<?php echo $username; ?>">

                            </div>
                            <div class="form-group">
                                <label class="required" for="useremail">Email ID</label>
                                <input type="email" class="form-control" id="useremail" name="useremail" required value="<?php echo $useremail; ?>">

                            </div>

                            <div class="form-group">
                                <label class="form-label required" for="phoneNumber">Phone Number</label>
                                <input type="tel" id="phoneNumber" class="form-control" name="phone" required value="<?php echo $phone; ?>" />

                            </div>
                            <div class="form-group">
                                <label class="form-label required" for="addressform">Address</label>
                                <input type="text" class="form-control" id="address" name="address" required value="<?php echo $address; ?>">
                            </div>
                            <div class="form-group">
                                <label class="form-label required" for="formFileLg">Profile Upload</label>
                                <input class="form-control" id="formFileLg" name="profile" type="file" required value="<?php echo $profile; ?>" /><img src="<?php echo $profile; ?>" width="100px" height="100px">
                            </div>

                            <div class="btns">
                                <input type="submit" class="btn btn-outline-primary btn-sm signup" id="reg-btn" name="Update" value="Update Account">
                            </div>

                            <a href="http://localhost/corephp_mvc/application/views/profile_view.php">Home Page</a>
                        </form>
                    </div>

                </div>
            </div>
        </div>

</main>
 

        <?php
 include 'templates/footer.php';

?>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    </body>

    </html>
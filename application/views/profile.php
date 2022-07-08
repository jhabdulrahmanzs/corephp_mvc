<?php
include('../config/dbconnect.php');
if(!isset($_SESSION['useremail']))
{
    echo "<script>window.open('logout.php','_self')</script>";
}
else{
?>
<?php
if(isset($_GET['user_profile']))
{
    $edit_id=$_GET['user_profile'];
    $get_user="select * from register where useremail='$useremail'";
    $run_user=mysqli_query($conn,$get_user);
    $row_user=mysqli_fetch_array($run_user);
    $firstname=$row_user['firstname'];
    $lastname=$row_user['lastname'];
    $username=$row_user['username'];
    $useremail=$row_user['useremail'];
    $phone=$row_user['phone'];
    $profile=$row_user['profile'];
    $address=$row_user['address'];
}
?>

<div class="row" ><!-- 2 row Starts -->

<div class="col-lg-12" ><!-- col-lg-12 Starts -->

<div class="panel panel-default" ><!-- panel panel-default Starts -->

<div class="panel-heading" ><!-- panel-heading Starts -->

<h3 class="panel-title" >

<i class="fa fa-money fa-fw" ></i> Edit Profile

</h3>


</div><!-- panel-heading Ends -->


<div class="panel-body"><!-- panel-body Starts --> 

<form class="form-horizontal" method="post" enctype="multipart/form-data"><!-- form-horizontal Starts -->

<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label">First Name: </label>

<div class="col-md-6"><!-- col-md-6 Starts -->

<input type="text" name="firstname" class="form-control" required value="<?php echo $firstname; ?>">

</div><!-- col-md-6 Ends -->

</div><!-- form-group Ends -->
<div class="panel-body"><!-- panel-body Starts --> 

<form class="form-horizontal" method="post" enctype="multipart/form-data"><!-- form-horizontal Starts -->

<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label">Last Name: </label>

<div class="col-md-6"><!-- col-md-6 Starts -->

<input type="text" name="lastname" class="form-control" required value="<?php echo $lastname; ?>">

</div><!-- col-md-6 Ends -->

</div><!-- form-group Ends -->
<div class="panel-body"><!-- panel-body Starts --> 

<form class="form-horizontal" method="post" enctype="multipart/form-data"><!-- form-horizontal Starts -->

<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label">User Name: </label>

<div class="col-md-6"><!-- col-md-6 Starts -->

<input type="text" name="username" class="form-control" required value="<?php echo $username; ?>">

</div><!-- col-md-6 Ends -->

</div><!-- form-group Ends -->


<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label">User Email: </label>

<div class="col-md-6"><!-- col-md-6 Starts -->

<input type="text" name="useremail" class="form-control" required value="<?php echo $useremail; ?>">

</div><!-- col-md-6 Ends -->

</div><!-- form-group Ends -->

<div class="panel-body"><!-- panel-body Starts --> 

<form class="form-horizontal" method="post" enctype="multipart/form-data"><!-- form-horizontal Starts -->

<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label">Phone Number: </label>

<div class="col-md-6"><!-- col-md-6 Starts -->

<input type="text" name="phone" class="form-control" required value="<?php echo $phone; ?>">

</div><!-- col-md-6 Ends -->

</div><!-- form-group Ends -->
<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label">Profile: </label>

<div class="col-md-6"><!-- col-md-6 Starts -->

<input type="file" name="admin_image" class="form-control" >
<br>
<img src="../../src/uploads/<?php echo $admin_image; ?>" width="70" height="70" >

</div><!-- col-md-6 Ends -->

</div><!-- form-group Ends -->
<div class="panel-body"><!-- panel-body Starts --> 

<form class="form-horizontal" method="post" enctype="multipart/form-data"><!-- form-horizontal Starts -->

<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label">Address: </label>

<div class="col-md-6"><!-- col-md-6 Starts -->

<input type="text" name="address" class="form-control" required value="<?php echo $address; ?>">

</div><!-- col-md-6 Ends -->

</div><!-- form-group Ends -->

</form><!-- form-horizontal Ends -->

</div><!-- panel-body Ends -->

</div><!-- panel panel-default Ends -->

</div><!-- col-lg-12 Ends -->


</div><!-- 2 row Ends -->

<?php

if(isset($_POST['update'])){

$firstname = $_POST['firstname'];

$lastname = $_POST['lastname'];

$username = $_POST['username'];

$useremail = $_POST['useremail'];

$phone= $_POST['phone'];

$profile = $_POST['profile'];

$address = $_POST['address'];

$update_admin = "update register set firstname='$firstname',lastname='$lastname',username='$username',useremail='$useremail',phone='$phone',profile='$profile',address='$address'";

$run_admin = mysqli_query($conn,$update_admin);

if($run_admin){

echo "<script>alert('User Has Been Updated successfully and login again')</script>";

// echo "<script>window.open('login.php','_self')</script>";

session_destroy();

}

}


?>



<?php }  ?>
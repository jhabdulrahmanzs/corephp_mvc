<?php
include '../config/dbconnect.php';
session_start();
$email=$_SESSION['useremail'];
if(isset($email))
{
$sql = " SELECT * FROM register where useremail='$email'";
}
else
{
    header('Location: http://localhost/corephp_mvc/application/views/login.php');
}

$result = mysqli_query($conn,$sql);
if(!isset($result)){
    echo "failed";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link href="admin/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="admin/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="admin/assets/css/style.css" rel="stylesheet" type="text/css">
    <title>Dashboard</title>
</head>

<body>

    <main>

    <table>
            <tr>
                <th>First name</th>
                <th>Last Name</th>
                <th>User Name</th>
                <th>Email ID</th>
                <th>Phone number</th>
                <th>Profile</th>
                <th>Address</th>
            </tr>
            <?php
                while($rows=$result->fetch_assoc())
                {
            ?>
            <tr>
                <td><?php echo $rows['firstname'];?></td>
                <td><?php echo $rows['lastname'];?></td>
                <td><?php echo $rows['username'];?></td>
                <td><?php echo $rows['useremail'];?></td>
                <td><?php echo $rows['phone'];?></td>
                <td><?php echo $rows['profile'];?></td>
                <td><?php echo $rows['address'];?></td>
            </tr>
            <?php
                }
            ?>
        </table>

        <button type="button" class="btn btn-link "><a href="http://localhost/corephp_mvc/application/views/home.php">Back</a></button>
    </main>

    <script src="admin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="admin/assets/js/main.js"></script>
</body>

</html>
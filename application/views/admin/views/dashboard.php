<?php
include '../config/dbconnect.php';
$sql = " SELECT * FROM register";


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
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet" type="text/css">
    <title>Dashboard</title>
</head>

<body>

    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="index.html" class="logo d-flex align-items-center">
                <span class="d-none d-lg-block">Zuci project</span>
            </a>
        </div>


    </header>

    <main>

    <table class="tablee">
            <tr>
                <th>First name</th>
                <th>Last Name</th>
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
                <td><?php echo $rows['useremail'];?></td>
                <td><?php echo $rows['phone'];?></td>
                <td><img src="<?php echo $rows['profile'];?>" width="150px" height="150px" alt="profile"></td>
                <td><?php echo $rows['address'];?></td>
            </tr>
            <?php
                }
            ?>
        </table>


    </main>

    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/main.js"></script>
</body>

</html>
<?php 
if (!isset($_SESSION)) {
    session_start();
}
// error_reporting(0);
if(isset($_SESSION['useremail'])){
    header('Location: http://localhost/corephp_mvc/application/views/login.php');
}
?>

    <!doctype html>
    <html lang="en">
    <head>
        <!--  meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href="../../src/css/style.css" rel="stylesheet" type="text/css">
        <link href="../../src/css/register.css" rel="stylesheet" type="text/css">
        <title>signup</title>
    </head>

    <body>
      

        <div class="form-bg">
            <div class="container">
                <div class="lay-container">
                        <div class="form-container">
                            <h3 class="title">Register</h3>
                            <form class="form-horizontal" method="POST" action="http://localhost/corephp_mvc/application/controller/RegisterController.php">
                                <div class="form-group">
                                    <label class="required" for="fname">First Name</label>
                                    <input type="text" class="form-control" id="fname" min="6" max="20" placeholder="User Name" name="firstname" required>
                                    <span class="text-danger" id="nameerror"> <?php echo $nameErr;?></span>
                                </div>
                                <div class="form-group">
                                    <label class="required" for="lname">last Name</label>
                                    <input type="text" class="form-control" id="lname" min="6" max="20" placeholder="User Name" name="lastname" required>
                                    <span class="text-danger" id="nameerror"> <?php echo $nameErr;?></span>
                                </div>
                                <div class="form-group">
                                    <label class="required" for="username">User Name</label>
                                    <input type="text" class="form-control" min="6" id="username" max="20" placeholder="User Name" name="username" required>
                                    <span class="text-danger" id="nameerror"> <?php echo $nameErr;?></span>
                                </div>
                                <div class="form-group">
                                    <label class="required" for="useremail">Email ID</label>
                                    <input type="email" class="form-control" id="useremail" title="Invalid email address" placeholder="Email Address" name="useremail" required>
                                    <span class="text-danger" id="emailerror"> <?php echo $emailErr;?></span>
                                </div>
                            
                                <div class="form-group">
                                        <label class="form-label required" for="phoneNumber">Phone Number</label>
                                        <input type="tel" id="phoneNumber" class="form-control" name="userphone" placeholder="Phone no"/>
                                   
                                </div>
                                <div class="form-group">                
                                    <label class="form-label required" for="formFileLg" >Profile Upload</label>
                                    <input class="form-control" id="formFileLg" name="userprofile" type="file" />
                                </div>
                                <div class="form-group">
                                        <label class="form-label required" for="addressform">Address</label>
                                        <textarea class="form-control" id="addressform" name="useraddress" rows="3" placeholder="Enter Address"></textarea>                                  
                                </div>
                                <div class="form-group">
                                    <label class="required" for="pwd">Password</label>
                                    <input type="password" class="form-control" id="pwd" min="6" max="20" placeholder="Password" name="userpwd" required>
                                    <span class="text-danger" id="pwderror"></span>
                                </div>
                                <div class="form-group" for="cpwd">
                                    <label class="required">Confirm Password</label>
                                    <input type="password" class="form-control" id="cpwd" min="6" max="20" placeholder="Confirm Password" name="cpassword" required>
                                    <span class="text-danger" id="cpwderror"></span>
                                </div>
                                <div class="btns">
                                <input type="submit" class="btn btn-outline-primary btn-sm signup" id="reg-btn" name="reg_submit" value="Create Account">
                                <span class="signin-link">Already have an account? Click here to <a href="login.php">Login</a></span>
                                </div>
                             
                            </form>
                        </div>
                    
                </div>
            </div>
        </div>


        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    </body>

    </html>
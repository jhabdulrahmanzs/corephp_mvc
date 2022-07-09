<?php
if (!isset($_SESSION)) {
    session_start();
}

//error_reporting(0);
if (isset($_SESSION['admin_email'])) {
    header('Location: http://localhost/corephp_mvc/application/views/admin/views/dashboard.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="../../../../src/css/style.css" rel="stylesheet" type="text/css">
    <link href="../../../../src/css/login.css" rel="stylesheet" type="text/css">
    <link href="../../../../src/css/validate.css" rel="stylesheet" type="text/css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>login</title>
</head>

<body>

    <div class="form-bg">
        <div class="container">
            <div class="lay-container">
                <div class="form-container">
                    <h3 class="title">Login</h3>
                    <div id="message"></div>
                    <form class="form-horizontal" action="" method="post" id="form">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" placeholder="Email" name="admin_email" id="admin_email">
                            <!-- <div>error</div> -->
                            <span class="error" id="admin_email_err"></span>
                        </div>
                        <!-- <input type="text" name="useremail" placeholder="useremail" id="useremail" > -->
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" placeholder="Password" name="admin_pass" id="admin_pass">
                            <!-- <div>error</div> -->
                            <span class="error" id="admin_pass_err"></span>
                        </div>
                        <div class="btns">
                            <input type="submit" class="btn btn-outline-primary btn-sm signup" id="reg-btn" name="Login" value="Login">
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
    <script>
        $(document).ready(function() {

            $('#reg-btn').click(function(event) {
                event.preventDefault();
                if (!checkemail() && !checkpass()) {
                    console.log("er1");
                    $("#message").html(`<div class="alert alert-warning"
        >Please fill all required field</div>`);
                } else if (checkemail() && !checkpass()) {
                    console.log("er2");
                    $("#message").html(`<div class="alert alert-warning"
        >Pssword field is required</div>`);
                } else if (!checkemail() && checkpass()) {
                    console.log("er3");
                    $("#message").html(`<div class="alert alert-warning"
        >Email field is required</div>`);
                } else {
                    //alert("hai")
                    console.log("ok");
                    $("#message").html("");
                    var form = $('#form')[0];
                    var data = new FormData(form);
                    console.log("ajax start");
                    $.ajax({
                        type: "POST",
                        url: "../controller/AdminController.php",
                        data: data,
                        processData: false,
                        contentType: false,
                        cache: false,
                        async: false,
                        beforeSend: function() {
                            $('#reg-btn').html('<i class="fa-solid fa-spinner fa-spin"></i>');
                            $('#reg-btn').attr("disabled", true);
                            $('#reg-btn').css({
                                "border-radius": "50%"
                            });
                        },

                        success: function(data) {
                            console.log(data)
                            $('#message').html(data);
                        },
                    });
                }
            });
        });

        function checkemail() {
            console.log("email");
            var pattern1 = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
            var email = $('#admin_email').val();
            var validemail = pattern1.test(email);
            if (email == "") {
                $('#admin_email_err').html('required field');
                return false;
            } else if (!validemail) {
                $('#admin_email_err').html('invalid email');
                return false;
            } else {
                $('#admin_email_err').html('');
                return true;
            }
        }

        function checkpass() {
            console.log("pass");
            //var pattern2 = /^(?=.*\d)(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
            var pass = $('#admin_pass').val();
            // var validpass = pattern2.test(pass);

            if (pass == "") {
                $('#admin_pass_err').html('required field');
                return false;
            }
            // } else if (!validpass) {
            //     $('#admin_pass_err').html('Password Invalid');
            //     //$('#admin_pass_err').html('Minimum 5 and upto 15 characters, at least one uppercase letter, one lowercase letter, one number and one special character:');
            //     return false;
            else {
                $('#admin_pass_err').html("");
                return true;
            }
        }
    </script>
</body>

</html>
<?php

if (!isset($_SESSION)) {
    session_start();
}

if (isset($_SESSION['useremail'])) {
    header('Location: http://localhost/corephp_mvc/application/views/home.php');
}

?>

<!doctype html>
<html lang="en">

<head>
    <!--  meta tags -->
    <meta charset="utf-8">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="../../src/css/style.css" rel="stylesheet" type="text/css">
    <link href="../../src/css/register.css" rel="stylesheet" type="text/css">
    <link href="../../src/css/validate.css" rel="stylesheet" type="text/css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>signup</title>
</head>

<body>


    <div class="form-bg">
        <div class="container">
            <div class="lay-container">
                <div class="form-container">
                    <h3 class="title">Register</h3>
                    <div id="message"></div>
                    <form class="form-horizontal" method="POST" action="" enctype="multipart/form-data" id="form">
                        <div class="form-group">
                            <label class="required" for="fname">First Name</label>
                            <input type="text" class="form-control" id="firstname" placeholder="User Name" name="firstname">
                            <span class="error" id="firstname_err"></span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="lname">last Name</label>
                            <input type="text" class="form-control" id="lastname" placeholder="User Name" name="lastname">
                            <span class="error" id="lastname_err"></span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="username">User Name</label>
                            <input type="text" class="form-control" id="username" placeholder="User Name" name="username">
                            <span class="error" id="username_err"></span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="useremail">Email ID</label>
                            <input type="email" class="form-control" id="useremail" title="Invalid email address" placeholder="Email Address" name="useremail">
                            <span class="error" id="useremail_err"></span>
                        </div>

                        <div class="form-group">
                            <label class="form-label required" for="phoneNumber">Phone Number</label>
                            <input type="tel" id="phonenumber" class="form-control" name="userphone" placeholder="Phone no" />
                            <span class="error" id="phonenumber_err"></span>
                        </div>
                        <div class="form-group">
                            <label class="form-label required" for="formFileLg">Profile Upload</label>
                            <input class="form-control" id="userprofile" name="userprofile" type="file" accept="image/png, image/gif, image/jpeg" />
                            <span class="error" id="userprofile_err"></span>
                        </div>
                        <div class="form-group">
                            <label class="form-label required" for="addressform">Address</label>
                            <textarea class="form-control" id="useraddress" name="useraddress" rows="3" placeholder="Enter Address"></textarea>
                            <span class="error" id="useraddress_err"></span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="pwd">Password</label>
                            <input type="password" class="form-control" id="password" placeholder="Password" name="userpwd">
                            <span class="error" id="password_err"></span>
                        </div>
                        <div class="form-group" for="cpwd">
                            <label class="required">Confirm Password</label>
                            <input type="password" class="form-control" id="cpassword" placeholder="Confirm Password" name="cpassword">
                            <span class="error" id="cpassword_err"></span>
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

    <script>
        $(document).ready(function() {

            $('#reg-btn').click(function() {
                event.preventDefault();

                if (!firstname() && !lastname() && !checkuser() && !checkemail() && !checkmobile() && !useraddress() && !checkpass()  && !user) {
                    console.log("er1");
                    $("#message").html(`<div class="alert alert-warning">Please fill all required field</div>`);
                } else if (!firstname() && !lastname() && checkuser() && !checkemail() && !checkmobile() && !useraddress() && !checkpass()  && !checkprofile()) {
                    $("#message").html(`<div class="alert alert-warning">Please fill the Empty field! </div>`);
                    console.log("er2");
                } else if (!firstname() && lastname() && !checkuser() && !checkemail() && !checkmobile() && !useraddress() && !checkpass()  && !checkprofile()) {
                    $("#message").html(`<div class="alert alert-warning">Please fill the Empty field! </div>`);
                    console.log("er3");
                } else if (firstname() && !lastname() && !checkuser() && !checkemail() && !checkmobile() && !useraddress() && !checkpass()  && !checkprofile()) {
                    $("#message").html(`<div class="alert alert-warning">Please fill the Empty field! </div>`);
                    console.log("er4");
                } else if (!firstname() && !lastname() && !checkuser() && checkemail() && !checkmobile() && !useraddress() && !checkpass()  && !checkprofile()) {
                    $("#message").html(`<div class="alert alert-warning">Please fill the Empty field! </div>`);
                    console.log("er5");
                } else if (!firstname() && !lastname() && !checkuser() && !checkemail() && checkmobile() && !useraddress() && !checkpass()  && !checkprofile()) {
                    $("#message").html(`<div class="alert alert-warning">Please fill the Empty field! </div>`);
                    console.log("er6");
                } else if (!firstname() && !lastname() && !checkuser() && !checkemail() && !checkmobile() && !useraddress() && checkpass()  && !checkprofile()) {
                    $("#message").html(`<div class="alert alert-warning">Please fill the Empty field! </div>`);
                    console.log("er7");
                } else if (!firstname() && !lastname() && !checkuser() && !checkemail() && !checkmobile() && !useraddress() && !checkpass() && checkcpass() && !checkprofile()) {
                    $("#message").html(`<div class="alert alert-warning">Please fill the Empty field! </div>`);
                    console.log("er8");
                } else if (!firstname() && !lastname() && !checkuser() && !checkemail() && !checkmobile() && useraddress() && !checkpass() && !checkcpass() && !checkprofile()) {
                    $("#message").html(`<div class="alert alert-warning">Please fill the Empty field! </div>`);
                    console.log("er8");
                } 
                else if (!firstname() && !lastname() && !checkuser() && !checkemail() && !checkmobile() && !useraddress() && !checkpass() && !checkcpass() && checkprofile()) {
                    $("#message").html(`<div class="alert alert-warning">Please fill the Empty field! </div>`);
                    console.log("er9");
                }else {
                    //alert("hi")
                    console.log("ok");
                    $("#message").html("");
                    var form = $('#form')[0];
                    var data = new FormData(form);
                    console.log("ajax start");
                    $.ajax({
                        type: "POST",
                        url: "../controller/RegisterController.php",
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
                            console.log(data);
                            $('#message').html(data);
                        },
                        complete: function() {
                            // setTimeout(function() {
                            //     $('#myform').trigger("reset");
                            //     $('#reg-btn').html('Submit');
                            //     $('#reg-btn').attr("disabled", false);
                            //     $('#reg-btn').css({
                            //         "border-radius": "4px"
                            //     });
                            // }, 50000);
                        }
                    });
                }
            });
        });

        function firstname() {
            console.log("firstname");
            var pattern = /^[A-Za-z]+$/;
            var user = $('#firstname').val();
            var validuser = pattern.test(user);
            if ($('#firstname').val().length < 4) {
                $('#firstname_err').html('firstname length is too short');
                return false;
            } else if (!validuser) {
                $('#firstname_err').html('firstname should be a-z ,A-Z only');
                return false;
            } else {
                $('#firstname_err').html('');
                return true;
            }
        }

        function lastname() {
            console.log("lastname");
            var pattern = /^[A-Za-z]+$/;
            var user = $('#lastname').val();
            var validuser = pattern.test(user);
            if ($('#lastname').val().length <= 1) {
                $('#lastname_err').html('lastname length is too short');
                return false;
            } else if (!validuser) {
                $('#lastname_err').html('lastname should be a-z ,A-Z only');
                return false;
            } else {
                $('#lastname_err').html('');
                return true;
            }
        }


        function checkuser() {
            console.log("username");
            var pattern = /^[A-Za-z0-9]+$/;
            var user = $('#username').val();
            var validuser = pattern.test(user);
            if ($('#username').val().length < 4) {
                $('#username_err').html('username length is too short');
                return false;
            } else if (!validuser) {
                $('#username_err').html('username should be a-z ,A-Z only');
                return false;
            } else {
                $('#username_err').html('');
                return true;
            }
        }

        function checkemail() {
            console.log("email");
            var pattern1 = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
            var email = $('#useremail').val();
            var validemail = pattern1.test(email);
            if (email == "") {
                $('#useremail_err').html('required field');
                return false;
            } else if (!validemail) {
                $('#useremail_err').html('invalid email');
                return false;
            } else {
                $('#useremail_err').html('');
                return true;
            }
        }

        function checkpass() {
            console.log("pass");
            var pattern2 = /^(?=.*\d)(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
            var pass = $('#password').val();
            var validpass = pattern2.test(pass);

            if (pass == "") {
                $('#password_err').html('password can not be empty');
                return false;
            } else if (!validpass) {
                $('#password_err').html('Minimum 5 and upto 15 characters, at least one uppercase letter, one lowercase letter, one number and one special character:');
                return false;

            } else {
                $('#password_err').html("");
                return true;
            }
        }

        function useraddress() {
            console.log("address");
            var address = $('#useraddress').val();
            if (address == "") {
                $('#useraddress_err').html('useraddress can not be empty');
                return false;
            } else {
                $('#useraddress_err').html("");
                return true;
            }
        }

        function checkprofile() {
            console.log("profile");
            var address = $('#userprofile').val();
            if (address == "") {
                $('#userprofile_err').html('userprofile can not be empty');
                return false;
            } else {
                $('#userprofile_err').html("");
                return true;
            }
        }

        function checkcpass() {
            var pass = $('#password').val();
            var cpass = $('#cpassword').val();
            if (cpass == "") {
                $('#cpassword_err').html('confirm password cannot be empty');
                return false;
            } else if (pass !== cpass) {
                $('#cpassword_err').html('confirm password did not match');
                return false;
            } else {
                $('#cpassword_err').html('');
                return true;
            }
        }

        function checkmobile() {
            if (!$.isNumeric($("#phonenumber").val())) {
                $("#phonenumber_err").html("only number is allowed");
                return false;
            } else if ($("#phonenumber").val().length != 10) {
                $("#phonenumber_err").html("10 digit required");
                return false;
            } else {
                $("#phonenumber_err").html("");
                return true;
            }
        }
    </script>

</body>

</html>
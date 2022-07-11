$(document).ready(function() {

    $('#reg-btn').click(function() {
        event.preventDefault();

        if (!firstname() || !lastname() || !checkuser() || !checkemail() || !checkmobile() || !useraddress() || !checkpass() || !checkprofile() || !checkcpass()) {
            console.log("er1");
            $("#message").html(`<div class="alert alert-warning">Please fill all required field</div>`);
        } else {
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
                    // $('#reg-btn').css({
                    //     "border-radius": "50%"
                    // });
                },

                success: function(data) {
                    $('.form-container').html(data);
                },
                complete: function() {
                    console.log("compelte")
                    $('#form').trigger("reset");
                    $('#reg-btn').html('Submit');
                    $('#reg-btn').attr("disabled", false);
                    // $('#reg-btn').css({
                    //     "border-radius": "4px"
                    // });
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
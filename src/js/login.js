$(document).ready(function() {

    // $("form").on('submit', function(e)) 
    // {
    //     e.preventDefault();
    //     alert("ckicked");
    // }

    // $('#useremail').on('input', function() {
    //     // console.log("usermail");
    //     checkemail();
    // });
    // $('#password').on('input', function() {
    //     checkpass();
    // });
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
                url: "../controller/LoginController.php",
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
                    console.log(data)
                    $('#message').html(data);
                },
                complete: function() {
                    // setTimeout(function() {
                    //     $('#form').trigger("reset");
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


// function checkuser() {
//     var pattern = /^[A-Za-z0-9]+$/;
//     var user = $('#username').val();
//     var validuser = pattern.test(user);
//     if ($('#username').val().length < 4) {
//         $('#username_err').html('username length is too short');
//         return false;
//     } else if (!validuser) {
//         $('#username_err').html('username should be a-z ,A-Z only');
//         return false;
//     } else {
//         $('#username_err').html('');
//         return true;
//     }
// }

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
    //var pattern2 = /^(?=.*\d)(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
    var pass = $('#password').val();
    // var validpass = pattern2.test(pass);

    if (pass == "") {
        $('#password_err').html('required field');
        return false;
    }
    // } else if (!validpass) {
    //     $('#password_err').html('Password Invalid');
    //     //$('#password_err').html('Minimum 5 and upto 15 characters, at least one uppercase letter, one lowercase letter, one number and one special character:');
    //     return false;
    else {
        $('#password_err').html("");
        return true;
    }
}

// function password_show_hide() {
//     console.log('ok');
//     var x = document.getElementById("password");
//     var show_eye = document.getElementById("show_eye");
//     var hide_eye = document.getElementById("hide_eye");
//     hide_eye.classList.remove("d-none");
//     if (x.type === "password") {
//         x.type = "text";
//         show_eye.style.display = "none";
//         hide_eye.style.display = "block";
//     } else {
//         x.type = "password";
//         show_eye.style.display = "block";
//         hide_eye.style.display = "none";
//     }
// }
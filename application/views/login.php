<?php
if (!isset($_SESSION)) {
    session_start();
}

// error_reporting(0);
if (isset($_SESSION['useremail'])) {
    header('Location: http://localhost/corephp_mvc/application/views/home.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="../../src/css/style.css" rel="stylesheet" type="text/css">
    <link href="../../src/css/register.css" rel="stylesheet" type="text/css">
    <title>login</title>
</head>
<!-- <script>
    const form = document.getElementById('form');
const useremail = document.getElementById('useremail');
const userpwd = document.getElementById('userpwd');
const userpwd2 = document.getElementById('userpwd2');

form.addEventListener('submit', e => {
    e.preventDefault();

    validateInputs();
});

const setError = (element, message) => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = message;
    inputControl.classList.add('error');
    inputControl.classList.remove('success')
}

const setSuccess = element => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = '';
    inputControl.classList.add('success');
    inputControl.classList.remove('error');
};

const isValidEmail = useremail => {
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(useremail).toLowerCase());
}

const validateInputs = () => {
    const emailValue = useremail.value.trim();
    const userpwdValue = userpwd.value.trim();
    const userpwd2Value = userpwd2.value.trim();
    if(emailValue === '') {
        setError(useremail, 'Email is required');
    } else if (!isValidEmail(emailValue)) {
        setError(useremail, 'Provide a valid useremail address');
    } else {
        setSuccess(useremail);
    }

    if(userpwdValue === '') {
        setError(userpwd, 'userpwd is required');
    } else if (userpwdValue.length < 8 ) {
        setError(userpwd, 'userpwd must be at least 8 character.')
    } else {
        setSuccess(userpwd);
    }

    if(userpwd2Value === '') {
        setError(userpwd2, 'Please confirm your userpwd');
    } else if (userpwd2Value !== userpwdValue) {
        setError(userpwd2, "userpwds doesn't match");
    } else {
        setSuccess(userpwd2);
    }

};
</script> -->

<body>

    <div class="form-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-offset-6 col-md-6 my-3">
                    <div class="form-container">
                        <h3 class="title">Login</h3>
                        <form class="form-horizontal" action="../controller/LoginController.php" method="post" id="form">
                            <div class="form-group">
                                <label>User Email</label>
                                <input type="text" class="form-control" placeholder="User Email" name="useremail">
                                <!-- <div>error</div> -->
                            </div>
                            <!-- <input type="text" name="useremail" placeholder="useremail" id="useremail" > -->
                            <div class="form-group">
                                <label>userpwd</label>
                                <input type="userpwd" class="form-control" placeholder="userpwd" name="userpwd">
                                <!-- <div>error</div> -->
                            </div>
                            <div class="my-4">
                                <input type="submit" class="btn btn-outline-primary btn-sm signup" id="reg-btn" name="Login" value="Login"><br>
                                <span class="signin-link">If You Don't have an Account?Register Here <a href="register.php">Register</a></span>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>

    </script>
</body>

</html>
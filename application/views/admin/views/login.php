<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="../../../../src/css/style.css" rel="stylesheet" type="text/css">
    <link href="../../../../src/css/register.css" rel="stylesheet" type="text/css">
    <title>login</title>
</head>

<body>

    <div class="form-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-offset-6 col-md-6 my-3">
                    <div class="form-container">
                        <h3 class="title">Login</h3>
                        <form class="form-horizontal" action="../controller/AdminController.php" method="post" id="form">
                            <div class="form-group">
                                <label>Mail</label>
                                <input type="text" class="form-control" placeholder="Admin Email" name="admin_email">
                                <!-- <div>error</div> -->
                            </div>
                            <!-- <input type="text" name="useremail" placeholder="useremail" id="useremail" > -->
                            <div class="form-group">
                                <label>password</label>
                                <input type="password" class="form-control" placeholder="Admin_Password" name="admin_pass">
                                <!-- <div>error</div> -->
                            </div>
                            <div class="my-4">
                                <input type="submit" class="btn btn-outline-primary btn-sm signup" id="reg-btn" name="Login" value="Login" >
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
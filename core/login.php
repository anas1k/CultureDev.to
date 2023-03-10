<?php
require_once('../controller/users.php');
$path = "Log In";
$Users = new UsersController();
$Users->LoginUser();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once('../include/head.php'); ?>
</head>

<body class="background">
    <main class="row col-12 mx-0">
        <div class="col-12 col-md-12 col-lg-4 col-sm-12 fullheight px-5">
            <div class="d-flex flex-column  justify-content-center mt-5">
                <img class="logo align-self-center mt-5" src="../assets/img/logo/logo.png" alt="logo">
                <h1 class="text-start text-white">Log In</h1>
                <p class="text-white mb-4">Login with your account to access the dashboard</p>
                <form method="POST">
                    <div class="input-group mt-2 p-2">
                        <span class="fa fa-user fa-lg pt-3 input-group-text bg-secondary" id="basic-addon1"></span>
                        <input type="text" class="form-control col-12" placeholder="Username" id="EmailInput" name="email">
                        <div class="col-12" id="ValidateEmail"></div>
                    </div>
                    <div class="input-group pt-0 p-2">
                        <span class="fa fa-lock fa-lg pt-3 input-group-text bg-secondary" id="basic-addon1"></span>
                        <input type="password" class="form-control" placeholder="Password" id="PasswordInput" name="password" aria-describedby="basic-addon1">
                        <div class="col-12" id="ValidatePassword"></div>
                    </div>
                    <div class="input-group p-2">
                        <span class="text-white">Don't have an account ? Go to <a href="signup.php">Sign Up.</a></span>
                    </div>
                    <div class="">
                        <button type='submit' id="LoginUser" name="loginUser" class="mb-5 btn btn-primary mt-4 col-12" style>Connect</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-8 d-lg-block d-none d-md-none" style="height: 100vh !important;background-size: cover;background-image: url(../assets/img/logo/wallpaper.png); background-repeat: no-repeat; background-position:center ">

        </div>

    </main>
    <?php include_once('../include/footer.php'); ?>
</body>

</html>
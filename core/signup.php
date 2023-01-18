<?php
require_once('../controller/users.php');
$path = "Sign up";
$Users = new UsersController();
$Users->AddUser();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once('../include/head.php'); ?>
</head>

<body>
    <div class="">
        <main class="fullheight row col-12 mx-0">
            <div class="col-12 col-md-12 col-lg-4 col-sm-12 fullheight background px-5">
                <div class="d-flex flex-column  justify-content-center mt-2">
                    <img class="logo align-self-center mt-4 " src="../assets/img/logo/logo.png" alt="logo">
                    <h1 class="text-start text-white"><?= $path; ?></h1>
                    <p class="text-white mb-4"><?= $path; ?> with your account to access the dashboard</p>
                    <form method="POST" action="">
                        <div class="input-group mt-2 mt-md-0 p-2">
                            <span class="fa fa-user fa-lg pt-3 input-group-text bg-secondary"></span>
                            <input type="text" class="form-control col-12" placeholder="Full Name" id="NameInput" name="name">
                            <div class="col-12" id="ValidateEmail"></div>
                        </div>
                        <div class="input-group pt-1 p-2">
                            <span class="fa fa-user fa-lg pt-3 input-group-text bg-secondary"></span>
                            <input type="text" class="form-control col-12" placeholder="Email" id="EmailInput" name="email">
                            <div class="col-12" id="ValidateEmail"></div>
                        </div>
                        <div class="input-group pt-1 p-2">
                            <span class="fa fa-lock fa-lg pt-3 input-group-text bg-secondary"></span>
                            <input type="password" class="form-control" placeholder="Password" id="PasswordInput" name="password">
                            <div class="col-12" id="ValidatePassword"></div>
                        </div>
                        <div class="input-group p-2">
                            <span class="text-white">Already have an account ? Go to <a href="login.php">Log In.</a></span>
                        </div>
                        <div class="">
                            <button type='submit' id="LoginUser" name="signupUser" class="mb-5 btn btn-primary mt-4 col-12" style>Sign Up</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-8 d-lg-block d-none d-md-none" style="height: 100vh !important;background-size: cover;background-image: url(../assets/img/logo/wallpaper.png); background-repeat: no-repeat; background-position:center ">

            </div>

        </main>
    </div>
    <?php include_once('../include/footer.php'); ?>
</body>

</html>
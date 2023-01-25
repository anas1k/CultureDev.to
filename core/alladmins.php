<?php
include('../controller/users.php');
$path = "Admin";

if (!$_SESSION['super'] == '1') {
    $_SESSION['icon'] = "error";
    $_SESSION['message'] = "Veuillez saisir votre email et mot de passe";
    header('Location: ../core/index.php');
    die;
}

$User = new UsersController();
$AllUsers = $User->GetUsers();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once('../include/head.php'); ?>
</head>

<body class="background">
    <?php include_once('../include/nav.php'); ?>
    <div class="container-fluid">
        <main class="content col-md-9 ml-sm-auto col-lg-10 px-md-4 p-4 text-white">
            <nav aria-label="breadcrumb"></nav>
            <h1 class="h2"><?= $path ?></h1>
            <p>This is the page containing all admins in the system</p>
            <div class="row">
                <div class="col-12 col-xl-12 mb-4 mb-lg-0">
                    <div class="card">
                        <div class="d-flex justify-content-between align-items-center card-header m-2">
                            <h5>All Admins</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table text-white" id="Table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Id</th>
                                            <th scope="col">Full Name</th>
                                            <th scope="col">Email Name</th>
                                            <th scope="col">Super Admin</th>
                                            <!-- <th scope="col"></th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($AllUsers as $admin) {
                                        ?>
                                            <tr id="Admin<?= $admin['id_admin']; ?>">
                                                <th scope="row"><?= $admin['id_admin']; ?></th>
                                                <td id="AdminName<?= $admin['id_admin']; ?>"><?= $admin['fullname']; ?></td>
                                                <td id="AdminEmail<?= $admin['id_admin']; ?>"><?= $admin['email']; ?></td>
                                                <td id="AdminSuper<?= $admin['id_admin']; ?>"><?= $admin['super']; ?></td>
                                                <!-- <td>
                                                    <a href="#" onclick="GetAdmin('<?= $admin['id_admin']; ?>')" class="btn btn-sm btn-warning">Edit</a>
                                                    <a href="#" onclick="DeleteAdmin('<?= $admin['id_admin']; ?>')" class="btn btn-sm btn-danger">Delete</a>
                                                </td> -->
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- <a href="" class="btn btn-block btn-dark">View all</a> -->
                        </div>
                    </div>
                </div>
            </div>

            <?php include_once('../include/footer.php'); ?>
        </main>
    </div>

</body>

</html>
<?php

$path = "Home";

require_once('../controller/users.php');
require_once('../controller/categories.php');

if (!isset($_SESSION['fullname'])) {
    $_SESSION['icon'] = "error";
    $_SESSION['message'] = "Veuillez saisir votre email et mot de passe";
    header('Location: ../core/login.php');
    die;
}

$Category = new CategoryController();
$FourCategories = $Category->FourCategories();
$AllCategories = $Category->GetCategory();
$TotalCategories = count($AllCategories);

$Users = new UsersController();
$AllUsers = $Users->GetUsers();
$TotalUsers = count($AllUsers);

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
            <h1 class="h2"><?= $path ?></h1>
            <p>This is the home page of CultureDev dashboard</p>
            <div class="row my-4">
                <div class="col-12 col-md-12 col-lg-4 mb-4 mb-lg-0">
                    <div class="card">
                        <h5 class="card-header">Admins</h5>
                        <div class="card-body">
                            <h5 class="card-title text-center"><?= $TotalUsers; ?></h5>
                            <p class="card-text text-success"></p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12 mb-4 mb-lg-0 col-lg-4">
                    <div class="card">
                        <h5 class="card-header">Articles</h5>
                        <div class="card-body">
                            <h5 class="card-title text-center"></h5>
                            <p class="card-text text-success"></p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12 mb-4 mb-lg-0 col-lg-4">
                    <div class="card">
                        <h5 class="card-header">Categories</h5>
                        <div class="card-body">
                            <h5 class="card-title text-center"><?= $TotalCategories; ?></h5>
                            <p class="card-text text-success"></p>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-12 col-md-6 mb-4 mb-lg-0 col-lg-3">
                    <div class="card">
                        <h5 class="card-header">Stock Worth</h5>
                        <div class="card-body">
                            <h5 class="card-title text-center"></h5>
                            <p class="card-text text-success"></p>
                        </div>
                    </div>
                </div> -->
            </div>
            <div class="row my-4">
                <div class="col-12 col-xl-12 mb-4 mb-lg-0">
                    <div class="card">
                        <h5 class="card-header">Recent Articles</h5>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table text-white">
                                    <thead>
                                        <tr>
                                            <th scope="col">Id</th>
                                            <th scope="col">Image</th>
                                            <th scope="col">Title</th>
                                            <th scope="col">Admin</th>
                                            <th scope="col">Category</th>
                                            <th scope="col">Subject</th>
                                            <th scope="col">Description</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($FourProducts as $product) { ?>
                                            <tr>
                                                <th scope="row"><?= $product['id']; ?></th>
                                                <?php if (!empty($product['picture'])) {
                                                    echo '<td><img src="' . $product['picture'] . '" style="width:4rem;" /></td>';
                                                } else {
                                                    echo '<td><img src="../assets/img/logo/frame.png" style="width:4rem;" /></td>';
                                                } ?>
                                                <td><?= $product['name']; ?></td>
                                                <?php foreach ($AllCategories as $Category) {
                                                    if ($Category['id'] == $product['id_category']) {
                                                        echo "<td>" . $Category['name'] . "</td>";
                                                    }
                                                }
                                                ?>
                                                <td><?= $product['name']; ?></td>
                                                <?php foreach ($AllCategories as $Category) {
                                                    if ($Category['id'] == $product['id_category']) {
                                                        echo "<td>" . $Category['name'] . "</td>";
                                                    }
                                                }
                                                ?>
                                                <td><?= $product['quantity']; ?></td>
                                                <td><?= $product['description']; ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <a href="allarticles.php" class="btn btn-block col-12 btn-dark">View all</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-xl-12 mb-4 mb-lg-0">
                    <div class="card">
                        <h5 class="card-header">Recent categories</h5>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table text-white">
                                    <thead>
                                        <tr>
                                            <th scope="col">Id</th>
                                            <th scope="col">Name</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($FourCategories as $Category) { ?>
                                            <tr>
                                                <th scope="row"><?= $Category['id_category']; ?></th>
                                                <td><?= $Category['name']; ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <a href="allcategories.php" class="btn btn-block col-12 btn-dark">View all</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php include_once('../include/footer.php'); ?>
        </main>
    </div>

</body>

</html>
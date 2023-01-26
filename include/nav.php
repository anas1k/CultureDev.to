<nav id="sidebar" class="col-md-3 col-lg-2 d-md-block sidebar collapse">

    <div class="">
        <a class="position" href="../core"><img src="../assets/img/logo/Logo.png" alt="" class="logo" /></a>
        <ul class="nav nav-pills mt-5 flex-column p-2">
            <li class="nav-item m-2">
                <a class="nav-link <?= $path == "Home" ? "active" : ""; ?> d-flex align-items-center" href="../core/index.php">
                    <i class="text-white  fa fa-house"></i>
                    <span class="m-4 <?= $path == "Home" ? "active-title" : "text-white"; ?>">Home</span>
                </a>
            </li>
            <li class="nav-item m-2">
                <a class="nav-link <?= $path == "Articles" ? "active" : ""; ?> d-flex align-items-center" href="../core/allarticles.php">
                    <i class="fa fa-newspaper text-white"></i>
                    <span class="m-4 <?= $path == "Articles" ? "active-title" : "text-white"; ?>">Articles</span>
                </a>
            </li>
            <li class="nav-item m-2">
                <a class="nav-link <?= $path == "Category" ? "active" : ""; ?> d-flex align-items-center" href="../core/allcategories.php">
                    <i class="fa fa-list text-white"></i>
                    <span class="m-4 <?= $path == "Category" ? "active-title" : "text-white"; ?>">Category</span>
                </a>
            </li>
            <?php if ($_SESSION['super'] == '1') { ?>
                <li class="nav-item m-2">
                    <a class="nav-link <?= $path == "Admin" ? "active" : ""; ?> d-flex align-items-center" href="../core/alladmins.php">
                        <i class="fa fa-users text-white" style="margin-left:-0.1rem"></i>
                        <span class="m-4 <?= $path == "Admin" ? "active-title" : "text-white"; ?>">Admins</span>
                    </a>
                </li>
            <?php } ?>
        </ul>
    </div>
</nav>
<nav class="navbar navbar-light">
    <div class="d-flex col-12 col-md-3 col-lg-2 mb-2 mb-lg-0 flex-wrap flex-md-nowrap justify-content-between">
        <button class="navbar-toggler d-md-none collapsed mb-3" type="button" data-toggle="collapse" data-target="#sidebar" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
    <?php if ($path == "Category") { ?>
        <div class="col-12 col-md-2 col-lg-2">
            <form method="POST" action="../core/allcategories.php">
                <div class="input-group">
                    <input type="text" class="form-control form-control-dark" placeholder="Search" aria-label="Search" aria-describedby="basic-addon2" name="search" />
                    <div class="input-group-append">
                        <button class="btn btn-info mx-2" type="submit" name="searchCategory"><i class="fa fa-search"></i></button>
                    </div>
                </div>
                <!-- <input class="form-control form-control-dark" type="text" placeholder="Search" aria-label="Search" /> -->
            </form>
        </div>
    <?php } ?>
    <div class="col-12 col-md-5 col-lg-7 d-flex align-items-center justify-content-md-end mr-5 mt-3 mt-md-0">
        <div class="dropdown">
            <button class="btn btn-info dropdown-toggle  text-capitalize" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="true"><i class="fa fa-user"></i><span class="ml-3" style="text-transform: capitalize !important;"><?= $_SESSION['fullname']; ?></span></button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <!-- <li><a class="dropdown-item" href="#">Settings</a></li> -->
                <li><a class="dropdown-item" href="../core/signout.php"><i class="fa fa-right-from-bracket"></i><span class="ml-3">Sign out </span></a></li>
            </ul>
        </div>
    </div>
</nav>
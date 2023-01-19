<?php
include('../controller/articles.php');
include('../controller/categories.php');
include('../controller/users.php');
$path = "Articles";

if (!isset($_SESSION['fullname'])) {
    $_SESSION['icon'] = "error";
    $_SESSION['message'] = "Veuillez saisir votre email et mot de passe";
    header('Location: ../core/login.php');
    die;
}

$Artcile = new ArticlesController();
$AllArticles = $Artcile->GetArticles();
$Artcile->AddArticle();
$Artcile->EditArticle();
$Artcile->DeleteArticle();

$Category = new CategoryController();
$AllCategories = $Category->GetCategory();

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
            <p>This is the page containing all available articles in stock</p>
            <div class="row">
                <div class="col-12 col-xl-12 mb-4 mb-lg-0">
                    <div class="card">
                        <div class="d-flex justify-content-between align-items-center card-header m-2">
                            <h5>All Articles</h5>
                            <div class=" justify-content-end">
                                <a class="btn rounded-pill btn-success px-3" onclick="createArticle()">
                                    <i class="fa fa-plus mr-2"></i>
                                    <b>Add Article</b>
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table text-white" id="Table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Id</th>
                                            <th scope="col">Picture</th>
                                            <th scope="col">Article Name</th>
                                            <th scope="col">Subject</th>
                                            <th scope="col">Category</th>
                                            <th scope="col">Added By</th>
                                            <th scope="col">Description</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($AllArticles as $article) {
                                        ?>
                                            <tr id="Article<?= $article['id_article']; ?>">
                                                <th scope="row"><?= $article['id_article']; ?></th>
                                                <?php if (!empty($article['picture'])) {
                                                    echo '<td><img id="ArticlePicture' . $article['id_article'] . '" src="' . $article['picture'] . '" style="width:4rem;" /></td>';
                                                } else {
                                                    echo '<td><img class="m-0" src="../assets/img/logo/frame.png" style="width:4rem;height: 4.7rem;" /></td>';
                                                } ?>
                                                <td id="ArticleTitle<?= $article['id_article']; ?>"><?= $article['title']; ?></td>
                                                <td id="ArticleSubject<?= $article['id_article']; ?>"><?= $article['subject']; ?></td>
                                                <td id="ArticleCategory<?= $article['id_article']; ?>">
                                                    <?php foreach ($AllCategories as $category) {
                                                        if ($article['id_category'] == $category['id_category']) {
                                                            echo $category['name'];
                                                        } else {
                                                            echo 'Category not found';
                                                        }
                                                    }  ?></td>
                                                <td id="ArticleAdmin<?= $article['id_article']; ?>">
                                                    <?php foreach ($AllUsers as $user) {
                                                        if ($article['id_admin'] == $user['id_admin']) {
                                                            echo $user['fullname'];
                                                        }
                                                    }  ?></td>
                                                <td class="w-25" id="ArticleDescription<?= $article['id_article']; ?>"><?= $article['description']; ?></td>
                                                <td>
                                                    <a href="#" onclick="GetArticle('<?= $article['id_article']; ?>','<?= $article['id_category']; ?>','<?= $article['id_admin']; ?>')" class="btn btn-sm btn-warning">Edit</a>
                                                    <a href="#" onclick="DeleteArticle('<?= $article['id_article']; ?>')" class="btn btn-sm btn-danger">Delete</a>
                                                </td>
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


            <!-- ARTICLE MODAL -->
            <div class="modal fade " id="articleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered mt-3 mb-1">
                    <div class="modal-content background text-white">
                        <div class="modal-header">
                            <h5 class="" id="exampleModalLabel">Add Article</h5>
                            <button type="button" class="fa fa-xmark px-1 p-0 m-0" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body pt-0 pb-1">
                            <form id="form" method="POST" enctype="multipart/form-data">
                                <div class="mb-0">
                                    <label class="col-form-label">Title</label>
                                    <input type="text" class="form-control" id="TitleInput" name="title" oninput="validateName()" />
                                    <div id="ValidateTitle"></div>
                                </div>
                                <div class="mb-0">
                                    <label class="col-form-label">Subject</label>
                                    <input type="text" class="form-control" id="SubjectInput" name="subject" />
                                    <div id="ValidateSubject"></div>
                                </div>
                                <div class="mb-0">
                                    <label for="articleCategory" class="col-form-label">Category</label>
                                    <select class="form-select" id="CategoryInput" name="id_category" required>
                                        <option value selected disabled>Please select</option>
                                        <?php foreach ($AllCategories as $category) {
                                            echo '<option value="' . $category['id_category'] . '">' . $category['name'] . '</option>';
                                        } ?>

                                    </select>
                                </div>
                                <input type="hidden" id="IdInput" name="id_article" />
                                <input type="hidden" id="IdAdmin" name="id_admin" />
                                <div class="mb-0">
                                    <label class="col-form-label">Picture</label>
                                    <div id="">
                                        <input id="PictureInput" class="dropify" data-max-file-size-preview="10M" data-height="100" type="file" name="picture" />
                                        <div id="ValidatePicture" class="text-success"></div>
                                    </div>
                                </div>
                                <div class="mb-0">
                                    <label class="col-form-label">Description</label>
                                    <textarea class="form-control" id="DescriptionInput" rows="8" name="description"></textarea>
                                    <span id="ValidateDescription"></span>
                                </div>
                                <div class="modal-footer">
                                    <button type="reset" class="btn btn-outline-light text-black" data-bs-dismiss="modal">Cancel</button>
                                    <button id="saveArticle" type="submit" name="addArticleForm" class="btn btn-primary">Save</button>
                                    <div id="editArticle" style="display: none">
                                        <!-- <button type="submit" id="deleteValidation" name="deleteArticleForm" class="btn btn-danger text-black">Delete</button> -->
                                        <button id="updateArticle" type="submit" name="updateArticleForm" class="btn btn-warning text-black">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php include_once('../include/footer.php'); ?>
        </main>
    </div>

</body>

</html>
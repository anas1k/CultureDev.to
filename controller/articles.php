<?php

require_once('../model/crud.php');

class ArticlesController extends Crud
{

    public function GetArticles()
    {
        $res = $this->select('article', '*');
        return $res;
    }

    public function FourArticles()
    {
        $res = $this->select('article', '*', 'ORDER BY id_article DESC limit 4');
        return $res;
    }

    public function AddArticle()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_REQUEST['addArticleForm'])) {
                extract($_POST);
                // print_r($_POST);
                // print_r($_FILES);
                // die;
                if (empty($title) || empty($id_category) || empty($subject)  || empty($description)) {
                    $_SESSION['icon'] = "error";
                    $_SESSION['message'] = "Veuillez remplir tous les champs";
                    header('Location: ../core/allarticles.php'); //redirect to page
                    die;
                } else {
                    if ($_FILES['picture']['name'] != "") {
                        $fileName = $_FILES['picture']['name'];
                        $fileSize = $_FILES['picture']['size'];
                        $fileError = $_FILES['picture']['error'];

                        $fileExt = explode('.', $fileName);
                        $fileActualExt = strtolower(end($fileExt));
                        $allowed = array('jpg', 'jpeg', 'png', 'jfif');

                        if (in_array($fileActualExt, $allowed)) {
                            if ($fileError == 0) {
                                if ($fileSize < 1728640) {  // 1MB max file size
                                    $fileNameNew = date("dmy") . time() . "." . $fileActualExt; //create unique name using time and date and name of 'picture'
                                    $fileDestination = "../assets/img/uploads/" . $fileNameNew;
                                    move_uploaded_file($_FILES['picture']['tmp_name'], $fileDestination);
                                    $para = [
                                        'title' => $title,
                                        'id_category' => $id_category,
                                        'id_admin' => $_SESSION['id_admin'],
                                        'picture' => $fileDestination,
                                        'subject' => $subject,
                                        'description' => $description
                                    ];
                                    $result = $this->insert('article', $para);
                                    if ($result != 0) {
                                        $_SESSION['icon'] = "success";
                                        $_SESSION['message'] = "Article ajouté avec succès";
                                        header('Location: ../core/allarticles.php'); //refresh page
                                        die;
                                    }
                                } else {
                                    $_SESSION['message'] = "erreur";
                                    $_SESSION['message'] = "La taille de fichier est trop grand!!";
                                    header('Location: ../core/allarticles.php'); //to avoid alerts when refresh page
                                    die;
                                }
                            } else {
                                $_SESSION['message'] = "erreur";
                                $_SESSION['message'] = "Erreur de téléchargement de fichier!!";
                                header('Location: ../core/allarticles.php'); //to avoid alerts when refresh page
                                die;
                            }
                        } else {
                            $_SESSION['message'] = "erreur";
                            $_SESSION['message'] = "Erreur de type de fichier!!";
                            header('Location: ../core/allarticles.php'); //to avoid alerts when refresh page
                            die;
                        }
                    }
                }
            }
        }
    }

    public function EditArticle()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_REQUEST['editArticleForm'])) {
                extract($_POST);
                $para = [
                    'title' => $title,
                    'id_category' => $id_category,
                    'id_admin' => $id_admin,
                    'picture' => $picture,
                    'subject' => $subject,
                    'description' => $description
                ];
                $where = "id_article = '$id'";
                $result = $this->update('article', $para, $where);
                if ($result != 0) {
                    $_SESSION['icon'] = "success";
                    $_SESSION['message'] = "Article modifié avec succès";
                    header('Location: ../core/allarticles.php'); //refresh page
                    die;
                }
            }
        }
    }

    public function DeleteArticle()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_REQUEST['deleteArticle'])) {
                $id = $_REQUEST['deleteArticle'];
                $where = "WHERE id_article = '$id'";
                $result = $this->delete('article', $where);
                if ($result != 0) {
                    $_SESSION['icon'] = "success";
                    $_SESSION['message'] = "Article supprimé avec succès";
                    header('Location: ../core/allarticles.php'); //refresh page
                    die;
                }
            }
        }
    }
}

// function GetProducts(){
    
//     $sql = "SELECT p.id AS idProduct, p.name AS nameProduct, p.id_category AS idCategory, p.picture, p.quantity, p.price, p.description, c.name AS nameCategory, c.id AS idCategory 
//         FROM products p LEFT JOIN category c ON p.id_category = c.id ORDER BY p.id DESC;";
//     $result = connect() -> query($sql);

//     return $result;
// }

// function CountProducts(){

//     $sql = "SELECT * FROM products";
//     $result = connect() -> query($sql);

//     return $result;
// }

// function FourProducts(){

//     $sql = "SELECT * FROM products ORDER BY id DESC LIMIT 4 ";
//     $result = connect() -> query($sql);
    
//     return $result;
// }

// function AddProduct($name, $idCategorie, $idUser, $picture, $price, $quantity, $description){

//     $sql = "INSERT INTO products (name, id_category, id_user, picture, price, quantity, description) VALUES ('$name', '$idCategorie', '$idUser', '$picture', '$price', '$quantity', '$description')";
//     $result = connect() -> query($sql);

//     $_SESSION['icon'] = "success";
//     $_SESSION['message'] = "Produit ajouté avec succès";

//     return 1;
// }

// function EditProduct($id, $name, $idCategorie, $idUser, $picture, $price, $quantity, $description){

//     $sql = "UPDATE products SET name = '$name', id_category = '$idCategorie', id_user= '$idUser', picture = '$picture', price = '$price', quantity = '$quantity', description = '$description' WHERE id = '$id'";
//     $result = connect() -> query($sql);

//     $_SESSION['icon'] = "success";
//     $_SESSION['message'] = "Produit modifié avec succès";

//     return 1;
// }

// function DeleteProduct($id){

//     $sql = "SELECT picture FROM products WHERE id = '$id'";
//     $result = connect() -> query($sql);
//     $row = mysqli_fetch_assoc($result);

//     if ($row['picture'] != '') {
//         unlink($row['picture']);
//     }

//     $sql = "DELETE FROM products WHERE id = '$id'";
//     $result = connect() -> query($sql);

//     return 1;
// }

// function TotalQuantity(){
    
//         $sql = "SELECT SUM(quantity) AS total FROM products";
//         $result = connect() -> query($sql);

//         return $result;
// }

// function LastPicUpdate($id, $name, $idCategorie, $idUser, $price, $quantity, $description){

//     $sql = "UPDATE products SET name = '$name', id_category = '$idCategorie', id_user= '$idUser', price = '$price', quantity = '$quantity', description = '$description' WHERE id = '$id'";
//     $result = connect() -> query($sql);

//     $_SESSION['icon'] = "success";
//     $_SESSION['message'] = "Produit modifié avec succès";

//     return 1;
// }
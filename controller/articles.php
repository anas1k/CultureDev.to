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

                for ($i = 0; $i < count($title); $i++) {
                    if (empty($title[$i]) || empty($id_category[$i]) || empty($subject[$i])  || empty($description[$i])) {
                        $_SESSION['icon'] = "error";
                        $_SESSION['message'] = "Veuillez remplir tous les champs";
                        header('Location: ../core/allarticles.php'); //redirect to page
                        die;
                    } else {
                        if ($_FILES['picture']['name'][$i] != "") {
                            $fileName[$i] = $_FILES['picture']['name'][$i];
                            $fileSize[$i] = $_FILES['picture']['size'][$i];
                            $fileError[$i] = $_FILES['picture']['error'][$i];


                            $fileExt[$i] = explode('.', $fileName[$i]);
                            $fileActualExt[$i] = strtolower(end($fileExt[$i]));
                            $allowed = array('jpg', 'jpeg', 'png', 'jfif');


                            if (in_array($fileActualExt[$i], $allowed)) {
                                if ($fileError[$i] == 0) {
                                    if ($fileSize[$i] < 1728640) {  // 1MB max file size
                                        $fileNameNew[$i] = date("dmy") . time() . $i . "." . $fileActualExt[$i]; //create unique name using time and date and name of 'picture'
                                        $fileDestination[$i] = "../assets/img/uploads/" . $fileNameNew[$i];

                                        move_uploaded_file($_FILES['picture']['tmp_name'][$i], $fileDestination[$i]);
                                        $para = [
                                            'title' => $title[$i],
                                            'id_category' => $id_category[$i],
                                            'id_admin' => $_SESSION['id_admin'],
                                            'picture' => $fileDestination[$i],
                                            'subject' => $subject[$i],
                                            'description' => $description[$i]
                                        ];

                                        $result = $this->insert('article', $para);
                                        if ($result != 0) {
                                            $_SESSION['icon'] = "success";
                                            $_SESSION['message'] = "Article ajouté avec succès";
                                            header('Location: ../core/allarticles.php'); //refresh page
                                            // die;
                                        }
                                    } else {
                                        $_SESSION['icon'] = "error";
                                        $_SESSION['message'] = "La taille de fichier est trop grand!!";
                                        header('Location: ../core/allarticles.php'); //to avoid alerts when refresh page
                                        die;
                                    }
                                } else {
                                    $_SESSION['icon'] = "error";
                                    $_SESSION['message'] = "Erreur de téléchargement de fichier!!";
                                    header('Location: ../core/allarticles.php'); //to avoid alerts when refresh page
                                    die;
                                }
                            } else {
                                $_SESSION['icon'] = "error";
                                $_SESSION['message'] = "Erreur de type de fichier!!";
                                header('Location: ../core/allarticles.php'); //to avoid alerts when refresh page
                                die;
                            }
                        }
                    }
                }
                /* if (empty($title) || empty($id_category) || empty($subject)  || empty($description)) {
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
                                    $_SESSION['icon'] = "error";
                                    $_SESSION['message'] = "La taille de fichier est trop grand!!";
                                    header('Location: ../core/allarticles.php'); //to avoid alerts when refresh page
                                    die;
                                }
                            } else {
                                $_SESSION['icon'] = "error";
                                $_SESSION['message'] = "Erreur de téléchargement de fichier!!";
                                header('Location: ../core/allarticles.php'); //to avoid alerts when refresh page
                                die;
                            }
                        } else {
                            $_SESSION['icon'] = "error";
                            $_SESSION['message'] = "Erreur de type de fichier!!";
                            header('Location: ../core/allarticles.php'); //to avoid alerts when refresh page
                            die;
                        }
                    }
                } */
            }
        }
    }

    public function EditArticle()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_REQUEST['updateArticleForm'])) {
                extract($_POST);
                /* print_r($_POST);
                print_r($_FILES);
                die; */
                if (empty($title[0]) || empty($id_category[0]) || empty($subject[0])  || empty($description[0])) {
                    $_SESSION['icon'] = "error";
                    $_SESSION['message'] = "Veuillez remplir tous les champs";
                    header('Location: ../core/allarticles.php'); //redirect to page
                    die;
                } else {
                    if ($_FILES['picture']['name'][0] != "") {
                        $fileName = $_FILES['picture']['name'][0];
                        $fileSize = $_FILES['picture']['size'][0];
                        $fileError = $_FILES['picture']['error'][0];

                        $fileExt = explode('.', $fileName);
                        $fileActualExt = strtolower(end($fileExt));
                        $allowed = array('jpg', 'jpeg', 'png', 'jfif');

                        if (in_array($fileActualExt, $allowed)) {
                            if ($fileError == 0) {
                                if ($fileSize < 1728640) {  // 1MB max file size
                                    $fileNameNew = date("dmy") . time() . "." . $fileActualExt; //create unique name using time and date and name of 'picture'
                                    $fileDestination = "../assets/img/uploads/" . $fileNameNew;
                                    move_uploaded_file($_FILES['picture']['tmp_name'][0], $fileDestination);
                                    $para = [
                                        'title' => $title[0],
                                        'id_category' => $id_category[0],
                                        'id_admin' => $id_admin,
                                        'picture' => $fileDestination,
                                        'subject' => $subject[0],
                                        'description' => $description[0]
                                    ];
                                    $where = "id_article = '$id_article'";
                                    $result = $this->update('article', $para, $where);
                                    if ($result != 0) {
                                        $_SESSION['icon'] = "success";
                                        $_SESSION['message'] = "Article modifié avec succès";
                                        header('Location: ../core/allarticles.php'); //refresh page
                                        die;
                                    }
                                } else {
                                    $_SESSION['icon'] = "error";
                                    $_SESSION['message'] = "La taille de fichier est trop grand!!";
                                    header('Location: ../core/allarticles.php'); //to avoid alerts when refresh page
                                    die;
                                }
                            } else {
                                $_SESSION['icon'] = "error";
                                $_SESSION['message'] = "Erreur de téléchargement de fichier!!";
                                header('Location: ../core/allarticles.php'); //to avoid alerts when refresh page
                                die;
                            }
                        } else {
                            $_SESSION['icon'] = "error";
                            $_SESSION['message'] = "Erreur de type de fichier!!";
                            header('Location: ../core/allarticles.php'); //to avoid alerts when refresh page
                            die;
                        }
                    } else {
                        $para = [
                            'title' => $title[0],
                            'id_category' => $id_category[0],
                            'id_admin' => $id_admin,
                            'subject' => $subject[0],
                            'description' => $description[0]
                        ];
                        $where = "id_article = '$id_article'";
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
        }
    }

    public function DeleteArticle()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_REQUEST['deleteArticle'])) {
                $id = $_REQUEST['deleteArticle'];

                $all = $this->select('article', '*', "WHERE id_article = '$id'");
                $res = $all[0];
                if ($res['picture'] != '') {
                    $picture = $res['picture'];
                    unlink($picture);
                }

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

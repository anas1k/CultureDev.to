<?php

require_once('../model/crud.php');
class CategoryController extends Crud
{

    public function GetCategory()
    {
        $res = $this->select('category', '*', null);
        return $res;
    }



    public function FourCategories()
    {
        $res = $this->select('category', '*', 'ORDER BY id_category desc limit 4');
        return $res;
    }

    public function AddCategory()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_REQUEST['addCategoryForm'])) {
                extract($_POST);
                $para = [
                    'name' => $name
                ];
                $result = $this->insert('category', $para);
                if ($result != 0) {
                    $_SESSION['icon'] = "success";
                    $_SESSION['message'] = "Category ajouté avec succès";
                    header('Location: ../core/allcategories.php'); //refresh page
                    die;
                }
            }
        }
    }

    public function EditCategory()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_REQUEST['editCategoryForm'])) {
                extract($_POST);
                $para = [
                    'name' => $name
                ];
                $where = "id_category = '$id'";
                $result = $this->update('category', $para, $where);
                if ($result != 0) {
                    $_SESSION['icon'] = "success";
                    $_SESSION['message'] = "Category modifié avec succès";
                    header('Location: ../core/allcategories.php'); //refresh page
                    die;
                }
            }
        }
    }

    public function DeleteCategory()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            if (isset($_REQUEST['deleteCategory'])) {
                print_r($_REQUEST['DeleteCategory']);
                die;
                $id = $_REQUEST['DeleteCategory'];
                $where = "WHERE id_category = $id";
                $result = parent::delete('category', $where);
                if ($result != 0) {
                    header('Location: ../core/allcategories.php'); //refresh page
                    die;
                }
            }
        }
    }
}

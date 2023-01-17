<?php

require_once('../model/crud.php');
class CategoryController extends Crud
{

    public function GetCategory()
    {
        $res = $this->select('category', '*');
        return $res;
    }
}
/* function GetCategory(){
    
    $sql = "SELECT * FROM category";
    $result = connect() -> query($sql);

    return $result;
}

function AddCategory($name){
    
    $sql = "INSERT INTO category (name) VALUES ('$name')";
    $result = connect() -> query($sql);
     
    $_SESSION['icon'] = "success";
    $_SESSION['message'] = "Category ajouté avec succès";

    return 1;
}

function EditCategory($id, $name){
    
    $sql = "UPDATE category SET name = '$name' WHERE id = '$id'";
    $result = connect() -> query($sql);

    $_SESSION['icon'] = "success";
    $_SESSION['message'] = "Category modifié avec succès";

    return 1;
}

function DeleteCategory($id){
    
    $sql = "DELETE FROM category WHERE id = '$id'";
    $result = connect() -> query($sql);

    $_SESSION['icon'] = "error";
    $_SESSION['message'] = "Category supprimé avec succès";

    return 1;
} */
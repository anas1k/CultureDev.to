<?php

require_once('../model/crud.php');

class UsersController extends Crud
{

    public function AddUser()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_REQUEST['signupUser'])) {
                extract($_POST);
                $passwordHash = password_hash($password, PASSWORD_BCRYPT);
                $para = [
                    'fullname' => $name,
                    'email' => $email,
                    'password' => $passwordHash
                ];

                $result = $this->insert('admin', $para);
                if ($result != 0) {

                    $_SESSION['icon'] = "success";
                    $_SESSION['message'] = "Account added successfully !";
                    header('Location: ../core/login.php'); //redirect to login page
                    die;
                }
            }
        }
    }

    public function LoginUser()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_REQUEST['loginUser'])) {
                extract($_POST);
                // print_r($_POST);
                $sql = "email = '$email'";
                $res = parent::select('admin', '*', $sql);
                $result = $res[0];
                if ($result != null) {
                    if (password_verify($password, $result['password']) == true) {
                        $_SESSION['id'] = $result['id_admin'];
                        $_SESSION['fullname'] = $result['fullname'];
                        $_SESSION['email'] = $result['email'];

                        header('Location: ../core/'); //refresh page
                        die;
                    } else {
                        $_SESSION['icon'] = "error";
                        $_SESSION['message'] = "Email ou mot de passe incorrect";
                        header('Location: ../core/login.php'); //refresh page
                        die;
                    }
                }
            }
        }
    }
    public function GetUsers()
    {
        $res = $this->select('admin', '*', null);
        return $res;
    }
}

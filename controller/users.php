<?php

require_once('../controller/database.php');

function GetUsers()
{

    $sql = "SELECT * FROM users";
    $result = connect()->query($sql);

    return $result;
}

function AddUser($name, $email, $password, $role)
{

    $sql = "INSERT INTO admin (fullname, email, password, role) VALUES ('$name', '$email', '$password', '$role')";
    connect()->query($sql);

    $_SESSION['icon'] = "success";
    $_SESSION['message'] = "Utilisateur ajouté avec succès";

    return 1;
}

function CheckUser($email, $password)
{

    $sql = "SELECT * FROM admin WHERE email = '$email' AND password = '$password'";
    $result = connect()->query($sql);
    $row = $result->fetch_assoc();
    if (!isset($row['email'])) {
        $_SESSION['icon'] = "error";
        $_SESSION['message'] = "Email ou mot de passe incorrect";
        header('Location: ../core/login.php'); //refresh page
        die;
    } else {
        return $row;
    }
}

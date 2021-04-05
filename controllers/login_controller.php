<?php

// Initialisation du tableau des utilisateurs autorisés via la table admin

$adminRepository = new AdminRepository($pdo);
$_SESSION['admins'] = $adminRepository->findAll()->fetchAll();

// var_dump($_SESSION['admins']);die;
$message = "";

if (isset($_POST['submitLogin'])) {

    if (!empty($_POST['loginAdmin']) && !empty($_POST['passwordAdmin'])) {
        $isAuthenticated = false;
        foreach ($_SESSION['admins'] as $admin) {
            if ($_POST['loginAdmin'] == $admin->loginAdmin && password_verify($_POST['passwordAdmin'] , $admin->passwordAdmin )) {
                setcookie('admin',"logged", 0);
                $_SESSION['admins'] = $admin;
                header("location: ?page=listeSejours");
                $isAuthenticated = true; 
            }
        }
        // var_dump($_SESSION['admins']);die;
        if (!$isAuthenticated) {
            $message = "Identifiants Invalides";
        } 
    }
}


    
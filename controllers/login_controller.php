<?php


$message = "";

if (isset($_POST['submitLogin'])) {

    if (!empty($_POST['loginAdmin']) && !empty($_POST['passwordAdmin'])) {
        $isAuthenticated = false;
        foreach ($_SESSION['admins'] as $admin) {
            if ($_POST['loginAdmin'] == $admin->loginAdmin && password_verify($_POST['passwordAdmin'] , $admin->passwordAdmin )) {
                header("location: ?page=listeSejours");
                $_SESSION['admins'] = $admin;
                $isAuthenticated = true; 
            }
        }
        if (!$isAuthenticated) {
            $message = "Identifiants Invalides";
        } 
    }
}
    

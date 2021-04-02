<?php

// Récupération des données Admin
$adminRepository = new AdminRepository($pdo);
$admin = $adminRepository->findall();


if (!empty($_POST['loginAdmin']) && !empty($_POST['passwordAdmin'])) {
    foreach ($admin as $ad) {
        if ($_POST['loginAdmin'] === $ad['loginAdmin'] && password_verify($_POST['passwordAdmin'] , $ad['passwordAdminHash'] )) {
            header("location:?page=listeSejour");
        }
    }
}

    

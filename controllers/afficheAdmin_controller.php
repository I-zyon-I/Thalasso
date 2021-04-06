<?php

require_once "_config/authentication.php";

// Récupération de l'id admin
$idAdmin= $_GET['id'];

// Récupération des infos de la BDD
$adminRepository = new AdminRepository($pdo);
$admin = $adminRepository->findBy($idAdmin)->fetch();

?>
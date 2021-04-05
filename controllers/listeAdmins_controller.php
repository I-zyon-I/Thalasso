<?php

require_once "_config/authentication.php";

// Création des dépôts
$adminRepository = new AdminRepository($pdo);

// Récupération de la liste des Admins
$admins = $adminRepository->findAll()->fetchAll();

?>
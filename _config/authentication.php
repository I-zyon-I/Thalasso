<?php 

require_once "./_classes/repository/AdminRepository.php";

// Initialisation du tableau des utilisateurs autorisés via la table admin
$adminRepository = new AdminRepository($pdo);
$_SESSION['admins'] = $adminRepository->findAll()->fetchAll();

?>
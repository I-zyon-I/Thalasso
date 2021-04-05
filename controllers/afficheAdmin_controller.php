<?php

require_once "_config/authentication.php";

$idAdmin= $_GET['id'];

$adminRepository = new AdminRepository($pdo);
$admin = $adminRepository->findBy($idAdmin)->fetch();

?>
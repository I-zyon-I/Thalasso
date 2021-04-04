<?php

$idAdmin= $_GET['id'];

$adminRepository = new AdminRepository($pdo);
$admin = $adminRepository->findBy($idAdmin)->fetch();

?>
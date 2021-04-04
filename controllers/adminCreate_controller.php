<?php 

require_once "../_classes/entity/Admin.php";
require_once "../_classes/repository/AdminRepository.php";

$pdo = new PDO("sqlite:../bdd-sqlite/thalasso.db");

$adminRepository = new AdminRepository($pdo);

$adminRepository->insert("CaucRoge", "GoodMorning123!");


$sql = $pdo->query("select * from admin");
    $result = $sql->fetchAll();
    print_r($result);
?>

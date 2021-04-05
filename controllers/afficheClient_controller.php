<?php
require_once "_config/authentication.php";

$idClient = $_GET['id'];

$clientRepository = new ClientRepository($pdo);
$client = $clientRepository->findBy($idClient)->fetch();

$sejourRepository = new SejourRepository($pdo);
$sejours = $sejourRepository->findByClient($idClient)->fetchAll();
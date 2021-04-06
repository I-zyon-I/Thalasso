<?php

require_once "_config/authentication.php";

// Récupération de l'id client
$idClient = $_GET['id'];

// Récupération des infos de la BDD
$clientRepository = new ClientRepository($pdo);
$client = $clientRepository->findBy($idClient)->fetch();

// Récupération des infos de la BDD
$sejourRepository = new SejourRepository($pdo);
$sejours = $sejourRepository->findByClient($idClient)->fetchAll();
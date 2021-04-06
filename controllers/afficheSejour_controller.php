<?php

require_once "_config/authentication.php";

// Récupération de l'idSejour
$idSejour = $_GET["id"];

// Récupération des infos de la BDD
$sejourRepository = new SejourRepository($pdo);
$sejour = $sejourRepository->findBy($idSejour)->fetch();

// Récupération des infos de la BDD
$seanceRepository = new SeanceRepository($pdo);
$seances = $seanceRepository->findBySejour($idSejour)->fetchAll();

<?php

require_once "_config/authentication.php";

// Récupération de l'id seance
$idSeance = $_GET["id"];

// Récupération des infos de la BDD
$seanceRepository = new SeanceRepository($pdo);
$seance = $seanceRepository->findBy($idSeance)->fetch();

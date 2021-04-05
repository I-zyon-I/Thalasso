<?php

require_once "_config/authentication.php";

// Récupération de l'id
$idSeance = $_GET["id"];
$seanceRepository = new SeanceRepository($pdo);
$seance = $seanceRepository->findBy($idSeance)->fetch();

<?php

// Récupération de l'idSejour
$idSejour = $_GET["id"];

// Récupération des données séjour et client (1 ligne)
$sejourRepository = new SejourRepository($pdo);
$sejour = $sejourRepository->findBy($idSejour)->fetch();

// Récupération des données séances
$seanceRepository = new SeanceRepository($pdo);
$seances = $seanceRepository->findBySejour($idSejour)->fetchAll();

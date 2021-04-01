<?php

// Création des dépôts
$sejourRepository = new SejourRepository($pdo);
$seanceRepository = new SeanceRepository($pdo);

// Récupération de la variable de pagination
if (isset($_GET['paging'])) {
    $paging = $_GET['paging'];
} else {
    $paging = 1;
}

// Récupération du critère de recherche par statut
$arrStatut[] = "VAL";

// Récupération de la liste des dossiers
$sejours = $sejourRepository->listeSejours($paging, $arrStatut)->fetchAll();

// Récupération de la liste des séance par dossier
foreach ($sejours as $sejour) {
    $arraySeances[] = $seanceRepository->findBy($sejour->idSejour)->fetchAll();
}

// Récupération du nombre de dossiers total
$count = $sejourRepository->count($arrStatut)->fetch();
$total = $count->total;
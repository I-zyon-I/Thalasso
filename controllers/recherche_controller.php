<?php

require_once "_config/authentication.php";

// Recherche dans Séjour
$recherche = $_GET["search"];

$sejourRepository = new SejourRepository($pdo);
$clientRepository = new ClientRepository($pdo);
$seanceRepository = new SeanceRepository($pdo);


// ------Recherche séjours------
$sejours = $sejourRepository->rechercheSejour($recherche)->fetchAll();
foreach ($sejours as $sejour) {
    $arraySeances[] = $seanceRepository->findBySejour($sejours[0]->idSejour)->fetchAll();
}

// ------Recherche clients------

// Récupération de la variable de pagination
if (isset($_GET['paging'])) {
    $paging = $_GET['paging'];
} else {
    $paging = 1;
}

// Récupération de la variable de pagination
$rechercheCl = $clientRepository->listeRechercheClients($recherche, $paging)->fetchAll();

// Recupération des séjour du client
foreach ($rechercheCl as $client) {
    $idClient = $client->idClient;
    $arrSejourCl[] = $sejourRepository->findByClient($idClient)->fetchAll();
}

// Récupération du nombre de client total de la recherche
$count = $clientRepository->count($recherche)->fetch();
$total = $count->total;

<?php

require_once "_config/authentication.php";

// Recherche dans Séjour
$recherche = $_POST["search"];

$rechercheRepositorySj = new SejourRepository($pdo);
$sejour = $rechercheRepositorySj->rechercheSejour($recherche)->fetchAll();
//Recherche des SeJours par CLient
// $rechercheRepositorySjCl = new ClientRepository($pdo);
// $rechercheSjCl = $rechercheRepositorySjCl->rechercheSejour($_POST["search"])->fetchAll();

//Recherche dans Client
$rechercheRepositoryCl = new ClientRepository($pdo);
$rechercheCl = $rechercheRepositoryCl->rechercheClient($recherche)->fetchAll();

// $arrIdClients = [];
// foreach($rechercheCl as $clientId) {
//     $arrIdClients[] = $clientId->idClient;
// }
$i = 0;
// foreach($idClients as $idClient) {
//     $rechercheRepositorySjCl = new SejourRepository($pdo);
//     $arrSejourCl[] = $rechercheRepositorySjCl->findByClient($idClient)->fetchAll();
// }

foreach($rechercheCl as $client) {
    $idClient = $client->idClient;

    $rechercheRepositorySjCl = new SejourRepository($pdo);
    $arrSejourCl = $rechercheRepositorySjCl->findByClient($idClient)->fetchAll();
}
// foreach ($arrSejourCl as $key=>$test){
//     echo $arrSejourCl[$key]->idSejour;
// }
// foreach($rechercheSjCl as $recherche) {
//     var_dump($recherche->idSejour);
// }

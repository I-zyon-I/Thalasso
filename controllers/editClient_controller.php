<?php

$clientRepository = new ClientRepository($pdo);

if (isset($_GET['id'])) {
    $idClient = $_GET['id'];
    $client = $clientRepository->findBy($idClient)->fetch();
    // $client = $clientRepository->findBy($_GET['id'])->fetch();
}
//  else {
    //     $lastIdClient = $clientRepository->getLast()->fetch();
    //     $idClient = $lastIdClient->lastIdClient + 1;
    // }
    
if (isset($_POST['submitEdit'])) {
    if ($_POST['requete'] == 'update') {
        // var_dump($_POST['requete']); die;
        $clientRepository->update($_GET['id'], $_POST['nomClient'], $_POST['prenomClient'], $_POST['naissanceClient'], $_POST['mailClient']);
    } elseif ($_POST['requete'] == 'insert') {
        $clientRepository->insert($_POST['nomClient'], $_POST['prenomClient'], $_POST['naissanceClient'], $_POST['mailClient']);
        $idClient = $clientRepository->lastInsert();
        // var_dump($idClient);
    }
    header("location:?page=afficheClient&id=$idClient");
}

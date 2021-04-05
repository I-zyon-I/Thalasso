<?php

require_once "_config/authentication.php";

$clientRepository = new ClientRepository($pdo);

// Récupération des informations client si l'idClient est présent dans l'URL
if (isset($_GET['id'])) {
    $idClient = $_GET['id'];
    $client = $clientRepository->findBy($idClient)->fetch();
}

// Modification de la BDD lors de la soumission du formulaire
if (isset($_POST['submitEdit'])) {

    // Création de l'objet client à partir des éléments du formulaire
    $client = new Client(
        isset($_GET['id']) ? $_GET['id'] : null,
        $_POST['nomClient'],
        $_POST['prenomClient'],
        $_POST['naissanceClient'],
        $_POST['mailClient']
    );

    // Appel de la méthode de modification en fonction de la création ou de la modification d'un client
    if ($_POST['requete'] == 'update') {
        $clientRepository->update($client);
    } elseif ($_POST['requete'] == 'insert') {
        $clientRepository->insert($client);
        $idClient = $clientRepository->lastInsert();
    }
    header("location:?page=afficheClient&id=$idClient");
} elseif (isset($_POST['delete'])) {
    if (isset($_GET['id'])) {
        $clientRepository->delete($idClient);
    }
    header("location:?page=listeSejours");
}

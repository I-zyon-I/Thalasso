<?php

$sejourRepository = new SejourRepository($pdo);

// Récupération des informations client si l'idClient est présent dans l'URL
if (isset($_GET['id'])) {
    $idSejour = $_GET['id'];
    $sejour = $sejourRepository->findBy($idSejour)->fetch();
}
// -------------------------------------------------------------------------------------------------
$id = $_GET["id"];
$statement = $sejourRepository->editSejour($id);
$sejour = $statement->fetch();
// -------------------------------------------------------------------------------------------------
// Modification de la BDD lors de la soumission du formulaire
if (isset($_POST['submitEdit'])) {

    // Création de l'objet client à partir des éléments du formulaire
    $sejour = new Sejour(
        isset($_GET['id']) ? $_GET['id'] : null,
        $_POST['dateDebutSejour'],
        $_POST['dureeSejour'],
        $_POST['vestiaireSejour'],
        $_POST['statutSejour'],
        $_POST['idClient']
    );
    
    // Appel de la méthode de modification en fonction de la création ou de la modification d'un client
    if ($_POST['requete'] == 'update') {
        $sejourRepository->update($sejour);
    } elseif ($_POST['requete'] == 'insert') {
        $sejourRepository->insert($sejour);
        $idSejour = $sejourRepository->lastInsert();
    }
    header("location:?page=afficheClient&id=$idClient");
}

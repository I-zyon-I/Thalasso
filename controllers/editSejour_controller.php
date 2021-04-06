<?php

require_once "_config/authentication.php";

$sejourRepository = new SejourRepository($pdo);

// Récupération des informations séjour si l'idSejour est présent dans l'URL
if (isset($_GET['id'])) {
    $idSejour = $_GET['id'];
    $sejour = $sejourRepository->findBy($idSejour)->fetch();

}

// Modification de la BDD lors de la soumission du formulaire
if (isset($_POST['submitEdit'])) {
    
    // Création de l'objet séjour à partir des éléments du formulaire
    $sejour = new Sejour(
        isset($_GET['id']) ? $_GET['id'] : null,
        $_POST['dateDebutSejour'],
        $_POST['dureeJourSejour'],
        $_POST['vestiaireSejour'],
        $_POST['statutSejour'],
        $_POST['idClient']

    );
    
    // Appel de la méthode de modification en fonction de la création ou de la modification d'un séjour
    if ($_POST['requete'] == 'update') {
        $sejourRepository->update($sejour);

    } elseif ($_POST['requete'] == 'insert') {
        $sejourRepository->insert($sejour);
        $idSejour = $sejourRepository->lastInsert();

    }
    header("location:?page=afficheSejour&id=$idSejour");

} elseif (isset($_POST['delete'])) {

    if (isset($_GET['id'])) {
        $sejourRepository->delete($idSejour);
        
    }
    header("location:?page=afficheClient&id=$sejour->idClient");
}

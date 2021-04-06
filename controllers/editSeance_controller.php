<?php

require_once "_config/authentication.php";

$soinRepository = new SoinRepository($pdo);
$soins = $soinRepository->findAll()->fetchAll();
$seanceRepository = new SeanceRepository($pdo);

// Récupération des informations séjour si l'idSejour est présent dans l'URL
if (isset($_GET['id'])) {
    $idSeance = $_GET['id'];
    $seance = $seanceRepository->findBy($idSeance)->fetch();
    $idSejour = $seance->idSejour;

} else {
    $idSejour = $_GET['sejour'];

}
$sejourRepository = new SejourRepository($pdo);
$sejour = $sejourRepository->findBy($idSejour)->fetch();
$dateDebut = $sejour->dateDebutSejour;
$dateFin = date('Y-m-d', strtotime("$sejour->dateDebutSejour +" . $sejour->dureeJourSejour - 1 . " day"));

// Modification de la BDD lors de la soumission du formulaire
if (isset($_POST['submitEdit'])) {
    // Création de l'objet séjour à partir des éléments du formulaire
    $seance = new Seance(
        isset($_GET['id']) ? $_GET['id'] : null,
        $_POST['idSejour'],
        $_POST['idSoin'],
        $_POST['dateSeance'],
        date('H:i:s', strtotime($_POST['heureSeance'])),
        $_POST['statutSeance']
    );
    
    // Appel de la méthode de modification en fonction de la création ou de la modification d'un séjour
    if ($_POST['requete'] == 'update') {
        $seanceRepository->update($seance);

    } elseif ($_POST['requete'] == 'insert') {
        $seanceRepository->insert($seance);
        $idSeance = $seanceRepository->lastInsert();

    }
    header("location:?page=afficheSeance&id=$idSeance");
} elseif (isset($_POST['delete'])) {
    if (isset($_GET['id'])) {
        $seanceRepository->delete($idSeance);
        
    }
    header("location:?page=afficheSejour&id=$seance->idSejour");
}

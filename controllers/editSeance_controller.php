<?php

$soinRepository = new SoinRepository($pdo);
$soins = $soinRepository->findAll()->fetchAll();

$seanceRepository = new SeanceRepository($pdo);

// Récupération des informations séjour si l'idSejour est présent dans l'URL
if (isset($_GET['id'])) {
    $idSeance = $_GET['id'];
    $seance = $seanceRepository->findBy($idSeance)->fetch();
} else {
    $idSejour = $_GET['sejour'];
}

// Modification de la BDD lors de la soumission du formulaire
if (isset($_POST['submitEdit'])) {
    // Création de l'objet séjour à partir des éléments du formulaire
    $seance = new Seance(
        isset($_GET['id']) ? $_GET['id'] : null,
        $_POST['idSejour'],
        $_POST['idSoin'],
        $_POST['dateSeance'],
        $_POST['heureSeance'],
        $_POST['statutSeance']
    );
    
    // Appel de la méthode de modification en fonction de la création ou de la modification d'un séjour
    if ($_POST['requete'] == 'update') {
        $seanceRepository->update($seance);
    } elseif ($_POST['requete'] == 'insert') {
        $seanceRepository->insert($seance);
        $idSejour = $seanceRepository->lastInsert();
    }
    header("location:?page=afficheSeance&id=$idSeance");
}

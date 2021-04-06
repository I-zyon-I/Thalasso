<?php

// Affichage des données client et séjour(s)
$nomUpper = strtoupper($client->nomClient);
$dateNaissance = date('d/m/Y', strtotime($client->naissanceClient));
// $dateDebut = date('d/m/Y', strtotime($client->dateDebutSejour));
// $dateFin = date('d/m/Y', strtotime("$sejour->dateDebutSejour +$sejour->dureeJourSejour day"));
$idClient = $client->idClient;
// $idSejour = $client->idSejour;
echo <<<HTML
<div class="container-fluid bg3">
    <div class="container">
        <h1><span class="titre">Fiche client</span></h1>
        <div class="bloc">
            <div class="card mb-2">
                <div class="card-body focus">
                    <h5 class="card-title">Client :</h5>
                    Client n° $client->idClient<br>
                    Nom : $nomUpper<br>
                    Prénom : $client->prenomClient<br>
                    Date de naissance : $dateNaissance<br>
                    Email : $client->mailClient<br>
                    <!-- <a class="btn btn-primary mt-2" href="?page=afficheClient&id=$idClient">Afficher</a> -->
                    <a class="btn button mt-2" href="?page=editClient&id=$idClient">Modifier</a>
                </div>
            </div>
            <div class="card mb-2">
                <div class="card-body">
                    <h5 class="card-title">Séjour :</h5>
HTML;

// Boucle des séjours lié au client
foreach ($sejours as $sejour) {
    $dateSejour = date('d/m/Y', strtotime($sejour->dateDebutSejour));
    $idSejour = $sejour->idSejour;
    echo <<<HTML
        <a class="btn mt-2 hover" href="?page=afficheSejour&id=$idSejour">
            <div>
                [$sejour->statutSejour] N° $sejour->idSejour ($dateSejour)
            </div>
        </a><br>
HTML;
    }

    // Fermeture de la carte
echo <<<HTML
                    <a class="btn button mt-2" href="?page=editSejour&client=$idClient">Ajouter</a>
                </div>
            </div>
        </div>
    </div>
</div>    
HTML;
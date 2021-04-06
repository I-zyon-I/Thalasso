<?php

    // Affichage des données client et séjour (unique)
    $nomUpper = strtoupper($seance->nomClient);
    $dateNaissance = date('d/m/Y', strtotime($seance->naissanceClient));
    $dateDebut = date('d/m/Y', strtotime($seance->dateDebutSejour));
    $dateFin = date('d/m/Y', strtotime("$seance->dateDebutSejour +" . $seance->dureeJourSejour - 1 . " day"));
    $idClient = $seance->idClient;
    $idSejour = $seance->idSejour;
    $dateSeance = date('d/m/Y', strtotime($seance->dateSeance));
    $heureSeance = date('H:i', strtotime($seance->heureSeance));
    
    echo <<<HTML
    <div class="container-fluid bg2">
        <div class="container">
        <h1>Fiche séjour</h1>
            <div class="bloc">
                <div class="card article mb-4">
                    <a class='btn mt-2' style="text-align: left;" href='?page=afficheClient&id=$idClient'>
                        <div class="card-body">
                            <h5 class="card-title">Client :</h5>
                            Client n° $seance->idClient<br>
                            Nom : $nomUpper<br>
                            Prénom : $seance->prenomClient<br>
                            Date de naissance : $dateNaissance<br>
                            Email : $seance->mailClient<br>
                        </div>
                    </a>
                </div>
                <div class="card article mb-4">
                    <a class='btn mt-2' style="text-align: left;" href='?page=afficheSejour&id=$idSejour'>
                        <div class="card-body">
                            <h5 class="card-title">Séjour :</h5>
                            Dossier n° $seance->idSejour<br>
                            Début : $dateDebut<br>
                            Durée : $seance->dureeJourSejour jour(s) (fin : $dateFin)<br>
                            Vestiaire n° $seance->vestiaireSejour<br>
                            Statut : $seance->statutSejour<br>
                        </div>
                    </a>
                </div>
                <div class="card article focus">
                    <div class="card-body">
                        <h5 class="card-title">Séance :</h5>
                        Id : $seance->idSeance<br>
                        Date : $dateSeance<br>
                        Heure : $heureSeance<br>
                        Soin : $seance->nomSoin<br>
                        Durée : $seance->dureeMinuteSoin<br>
                        Espace : $seance->nomEspace<br>
                        <a class='btn button mt-2' href='?page=editSeance&id=$seance->idSeance'>Modifier</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
HTML;

<?php

    // Affichage des données client et séjour (unique)
    $nomUpper = strtoupper($sejour->nomClient);
    $dateNaissance = date('d/m/Y', strtotime($sejour->naissanceClient));
    $dateDebut = date('d/m/Y', strtotime($sejour->dateDebutSejour));
    $dateFin = date('d/m/Y', strtotime("$sejour->dateDebutSejour +" . $sejour->dureeJourSejour - 1 . " day"));
    $idClient = $sejour->idClient;
    $idSejour = $sejour->idSejour;
    
    echo <<<HTML
    <div class="container-fluid bg1">
        <div class="container">
        <h1>Fiche séjour</h1>
            <div class="bloc">
                <div class="card article mb-4">
                    <a class='btn mt-2' style="text-align: left;" href='?page=afficheClient&id=$idClient'>
                        <div class="card-body">
                            <h5 class="card-title">Client :</h5>
                            Client n° $sejour->idClient<br>
                            Nom : $nomUpper<br>
                            Prénom : $sejour->prenomClient<br>
                            Date de naissance : $dateNaissance<br>
                            Email : $sejour->mailClient<br>
                        </div>
                    </a>
                </div>
                <div class="card article mb-4 focus">
                    <div class="card-body">
                        <h5 class="card-title">Séjour :</h5>
                        Dossier n° $sejour->idSejour<br>
                        Début : $dateDebut<br>
                        Durée : $sejour->dureeJourSejour jour(s) (fin : $dateFin)<br>
                        Vestiaire n° $sejour->vestiaireSejour<br>
                        Statut : $sejour->statutSejour<br>
                        <a class='btn button mt-2' href='?page=editSejour&id=$idSejour'>Modifier</a>
                    </div>
                </div>
                <div class="card article">
                    <div class="card-body">
                        <h5 class="card-title">Séance(s) :</h5>
HTML;
                    
    // Test de l'existence de séances dans le dossier
    if ($seances) {
                        
        // Affichage des séances
        $jour = "";
        foreach ($seances as $seance) {
            
            // Création d'une ligne 'date' pour chaque nouvelle journée
            if ($seance->dateSeance != $jour) {
                echo date('d/m/Y', strtotime($seance->dateSeance)) . "<br>" ;
            }
            
            echo "<a class='btn' href='?page=afficheSeance&id=$seance->idSeance'><div>";
            echo date('H:i', strtotime($seance->heureSeance)) . " : $seance->nomSoin ($seance->dureeMinuteSoin min), espace $seance->nomEspace ($seance->statutSeance)";
            // echo "<a class='btn button mt-2' href='?page=editSeance&id=$idSejour&soin=$seance->idSoin'>Afficher</a><br>";
            echo "</div></a><br>";
            $jour = $seance->dateSeance;
        }
    } else {
        echo "Aucune séance<br>";
    }
    echo "<a class='btn button mt-2' href='?page=editSeance&sejour=$idSejour'>Ajouter</a>";
    echo "</div></div></div></div></div>";

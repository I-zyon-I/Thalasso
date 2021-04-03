<?php



    // Affichage des données client et séjour(s)
    $nomUpper = strtoupper($client->nomClient);
    $dateNaissance = date('d/m/Y', strtotime($client->naissanceClient));
    // $dateDebut = date('d/m/Y', strtotime($client->dateDebutSejour));
    // $dateFin = date('d/m/Y', strtotime("$sejour->dateDebutSejour +$sejour->dureeJourSejour day"));
    $idClient = $client->idClient;
    // $idSejour = $client->idSejour;
    echo <<<HTML
        <div class="container">
        <h1>Fiche client</h1>
            <div class="card mb-2">
                <div class="card-body">
                    <h5 class="card-title">Client :</h5>
                    Client n° $client->idClient<br>
                    Nom : $nomUpper<br>
                    Prénom : $client->prenomClient<br>
                    Date de naissance : $dateNaissance<br>
                    Email : $client->mailClient<br>
                    <!-- <a class="btn btn-primary mt-2" href="?page=afficheClient&id=$idClient">Afficher</a> -->
                    <a class="btn btn-primary mt-2" href="?page=editClient&id=$idClient">Modifier</a>
                </div>
            </div>
            <div class="card mb-2">
                <div class="card-body">
                    <h5 class="card-title">Séjour :</h5>
                    <!-- Coucou -->
                    <!-- Dossier n° $sejour->idSejour<br>
                    Début : $dateDebut<br>
                    Durée : $sejour->dureeJourSejour jour(s) (fin : $dateFin)<br>
                    Vestiaire n° $sejour->vestiaireSejour<br>
                    Statut : $sejour->statutSejour<br>
                    <a class='btn btn-primary mt-2' href='?page=editSejour&id=$idSejour'>Modifier</a> -->
                </div>
            </div>
HTML;
    echo "</div>";
<div class="container">
    <h1>Resultat pour "<?= $_POST["search"] ?>"</h1>
    <div class="bloc">
    <!-- Liste des dossiers -->
    <?php
    // Test de l'existence des dossiers
    if ($rechercheSj) {
        echo "<h2>Resultat pour les séjours</h2>";
        // Création d'un accordéon
        echo "<div class='accordion' id='accordionExample'>";

        // $i l'indice de $arraySeances correspondant à chaque $sejour
        $i = 0;

        // Création d'un cadre pour chaque séjour
        foreach ($rechercheSj as $sejour) {
            $id = $sejour->idSejour;
            $dateDebut = date('d/m/Y', strtotime($sejour->dateDebutSejour));
            $dateFin = date('d/m/Y', strtotime("$sejour->dateDebutSejour +$sejour->dureeJourSejour day"));
            $nomUpper = strtoupper($sejour->nomClient);
            echo <<<HTML
                <div class="accordion-item light">
                    <h2 class="accordion-header" id="heading$id">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse$id" aria-expanded="false" aria-controls="collapse$id">
                            [$sejour->statutSejour] Dossier n° $id : $nomUpper $sejour->prenomClient (début de séjour : $dateDebut, durée : $sejour->dureeJourSejour jour(s))
                        </button>
                    </h2>
                    <div id="collapse$id" class="accordion-collapse collapse" aria-labelledby="heading$id" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <strong>Client :</strong><br>
                            Nom : $nomUpper<br>
                            Prénom : $sejour->prenomClient<br>
                            <strong>Séjour :</strong><br>
                            Début : $dateDebut<br>
                            Fin : $dateFin<br>
                            Vestiaire n°$sejour->vestiaireSejour<br>
                            <strong>Séance(s) :</strong><br>
HTML;
            $seances = $arraySeances[$i];

            // Test de l'existence de séances dans le dossier
            if ($seances) {
                
                // Affichage de chaque séance
                $jour = "";
                foreach ($seances as $seance) {

                    // Création d'une ligne 'date' pour chaque nouvelle journée
                    if ($seance->dateSeance != $jour) {
                        echo date('d/m/Y', strtotime($seance->dateSeance)) . "<br>" ;
                    }
                    
                    echo date('H:i', strtotime($seance->heureSeance)) . " : $seance->nomSoin ($seance->dureeMinuteSoin min), espace $seance->nomEspace<br>";
                    $jour = $seance->dateSeance;
                }
            } else {
                echo "Aucune séance<br>";
            }
            echo "<a class='btn button mt-2' href='?page=afficheSejour&id=$id'>Afficher</a></div></div></div>";
        $i++;
        }
        echo "</div>";

        // Pagination
        if (isset($_GET['paging'])) {
            $paging = $_GET['paging'];
        } else {
            $paging = 1;
        }
        $previous = $paging - 1;
        $prevClass = ($previous > 0) ? "" : " disabled";
        $next = $paging + 1;
        $total = ceil($total / 10);
        $nextClass = ($next > $total) ? " disabled" : "";
        
        echo <<<HTML
        <nav aria-label="Page navigation example" class="mt-2">
            <ul class="pagination justify-content-center">
                <li class="page-item$prevClass">
                    <a class="page-link" href="?page=listeSejours&paging=$previous">Précédent</a>
                </li>
                <li class="page-item disabled">
                    <a class="page-link" aria-disabled="true">Page $paging / $total</a>
                </li>
                <li class="page-item$nextClass">
                    <a class="page-link" href="?page=listeSejours&paging=$next">Suivant</a>
                </li>
            </ul>
        </nav>
HTML;
    } else {
        echo "Aucun séjour";
    }
    ?>
    </div>
    <div class="bloc">
    <?php
        if ($rechercheCl) {
            echo "<h2>Resultat pour les client</h2>";
            echo "<div class='accordion' id='accordion'>";
            foreach($rechercheCl as $client){
                $id = $client->idClient;
                $nomMaj = strtoupper($client->nomClient);
                $test = $client->sj.$idClient;
                echo <<<HTML
                <div class='accordion-item light'> 
                    <h2 class="accordion-header" id="headingClient$id">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseClient$id" aria-expanded="false" aria-controls="collapseClient$id">
                            Client N°$id : $nomMaj $client->prenomClient
                        </button>
                    </h2>
                    <div id="collapseClient$id" class="accordion-collapse collapse" aria-labelledby="headingClient$id" data-bs-parent="#accordion">
                        <div class="accordion-body">
HTML;
                        foreach ($rechercheSjCl as $recherche){
                            echo "<div class='accordion-item light'>";
                            echo "Séjour n°$recherche->idSejour";
                            echo "<a class='btn button mt-2' href='?page=afficheSejour&id=$recherche->idSejour'>Afficher</a>";
                            echo "</div>";
                        }
                    echo <<<HTML
                        </div>
                    </div>
                </div>
HTML;
            }
            echo "</div></div></div>";
        }
    ?>
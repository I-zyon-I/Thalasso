<div class="container">
    <h1>Liste des séjours</h1>
    <?php
    // $sejour = [];
    if ($sejour) {
        echo "<div class='accordion' id='accordionExample'>";
        $i = 0;
        foreach ($sejour as $value) {
            $n = $value->idSejour;
            if ($n != $i) {
                if ($i > 0) {
                    echo "</div></div></div>";
                }
                echo <<<HTML
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading$n">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse$n" aria-expanded="false" aria-controls="collapse$n">
                            [$value->statutSejour] Dossier n° $n : $value->nomClient $value->prenomClient, séjour du $value->dateDebutSejour au ...
                        </button>
                    </h2>
                    <div id="collapse$n" class="accordion-collapse collapse" aria-labelledby="heading$n" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <strong>Séjour :</strong><br>
                            Début : $value->dateDebutSejour<br>
                            Durée du séjour : $value->dureeJourSejour jour(s)<br>
                            Vestiaire n°$value->vestiaireSejour<br>
                            <strong>Client :</strong><br>
                            Nom : $value->nomClient<br>
                            Prénom : $value->prenomClient<br>
                            <strong>Séance(s) :</strong><br>
                            $value->dateSeance - $value->heureSeance : $value->nomSoin ($value->dureeMinuteSoin min), espace $value->nomEspace
HTML;
            } else {
                echo "<br>$value->dateSeance - $value->heureSeance : $value->nomSoin ($value->dureeMinuteSoin min), espace $value->nomEspace";
            }
        $i = $n;
        }
        echo "</div></div></div></div>";
    } else {
        echo "Aucun séjour";
    }
    ?>
</div>
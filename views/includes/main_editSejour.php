<?php

$titre = $sejour ? "Modification" : "Création";
$action = $sejour ? "Modifier" : "Créer";
$valId = $sejour ? $sejour->idSejour : "";
$valDate = $sejour ? $sejour->dateDebutSejour : "";
$valDuree = $sejour ? $sejour->dureeJourSejour : "";
$valVestiaire = $sejour ? $sejour->vestiaireSejour : "";
$idClient = $sejour ? $sejour->idClient : "";
$requete = $sejour ? "update" : "insert" ;
$statuts = [ "VAL", "CLO", "DEL"];

echo <<<HTML
    <div class="container">
        <h1>$titre de séjour</h1>
        <div class="bloc">
            <div class="card article">
                <form class="p-2" method="post">
                    <input type="hidden" name="requete" value="$requete">
                    N° : <input type="text" name="idSejour" value="$valId" class="form-control mb-2" disabled>
                    <!-- Date de début : <input type="date" name="dateDebutSejour" value="{$sejour->dateDebutSejour}" class="form-control mb-2"> -->
                    Date de début : <input type="date" name="dateDebutSejour" value="$valDate" class="form-control mb-2">
                    <!-- Durée : <input type="number" name="dureeJourSejour" value="{$sejour->dureeJourSejour}" class="form-control mb-2"> -->
                    Durée : <input type="number" name="dureeJourSejour" value="$valDuree" class="form-control mb-2">
                    <!-- Vestiaire : <input type="text" name="vestiaireSejour" value="{$sejour->vestiaireSejour}" class="form-control mb-2"> -->
                    Vestiaire : <input type="text" name="vestiaireSejour" value="$valVestiaire" class="form-control mb-2">
                    Statut :
                    <select class="form-control mb-3" name="statutSejour">
HTML;
// <!----------------------------------------------------->
foreach ($statuts as $statut) {
    $selected = ($statut == $sejour->statutSejour) ? " selected" : "";
    echo "<option value='$statut'$selected>$statut</option>";
}
// <!----------------------------------------------------->
echo <<<HTML
                    </select>
                    Client : <input type="text" name="idClient" value="$idClient" class="form-control mb-2">
                    <input type="submit" name="submitEdit" class="btn button mt-3" value="$action">
                </form>
            </div>
        </div>
    </div>
HTML;

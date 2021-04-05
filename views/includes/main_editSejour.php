<?php

$titre = $sejour ? "Modification" : "Création";
$action = $sejour ? "Modifier" : "Créer";
$valId = $sejour ? $sejour->idSejour : "";
$valDate = $sejour ? $sejour->dateDebutSejour : "";
$valDuree = $sejour ? $sejour->dureeJourSejour : "";
$valVestiaire = $sejour ? $sejour->vestiaireSejour : "";
$idClient = $sejour ? $sejour->idClient : $_GET['client'];
$requete = $sejour ? "update" : "insert" ;
$statuts = [ "VAL", "CLO", "DEL"];
$retour = $sejour ? "?page=afficheSejour&id=$sejour->idSejour" : "?page=afficheClient&id={$_GET['client']}";
echo <<<HTML
<div class="container-fluid bg1">
    <div class="container">
        <a class="btn button" href="$retour">Retour</a>
        <h1>$titre de séjour</h1>
        <div class="bloc">
            <div class="card article">
                <form class="p-2" method="post">
                    <input type="hidden" name="requete" value="$requete">
                    N° : <input type="text" name="idSejour" value="$valId" class="form-control mb-2" readonly>
                    Client : <input type="text" name="idClient" value="$idClient" class="form-control mb-2" readonly>
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
                    <input type="submit" name="submitEdit" class="btn button mt-3" value="$action">
HTML;
if ($sejour) {
    echo <<<HTML
                    <input type="submit" name="delete" class="btn button mt-3" value="Supprimer" onclick="return confirm('Confirmer pour supprimer')">
HTML;
}
echo <<<HTML
                </form>
            </div>
        </div>
    </div>
</div>
HTML;

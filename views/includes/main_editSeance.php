<?php

$titre = $seance ? "Modification" : "Création";
$action = $seance ? "Modifier" : "Créer";
$valId = $seance ? $seance->idSeance : "";
$valSejour = $seance ? $seance->idSejour : $idSejour;
$valSoin = $seance ? $seance->idSoin : "";
$valDate = $seance ? $seance->dateSeance : "";
$valHeure = $seance ? $seance->heureSeance : "";
$requete = $seance ? "update" : "insert" ;
$statuts = [ "VAL", "CLO", "DEL"];
$retour = $seance ? "?page=afficheSeance&id=$seance->idSeance" : "?page=afficheSejour&id={$_GET['sejour']}";

echo <<<HTML
    <div class="container-fluid bg2">
        <div class="container">
            <h1>$titre de séance</h1>
            <a class="btn button retour" href="$retour">Retour</a>
            <div class="bloc">
                <div class="card article">
                    <form class="p-2" method="post">
                        <input type="hidden" name="requete" value="$requete">
                        N° : <input type="text" name="idSeance" value="$valId" class="form-control mb-2" disabled>
                        <input type="hidden" name="idSejour" value="$valSejour" class="form-control mb-2">
                        Soin : <select class="form-control mb-3" name="idSoin">
HTML;
if (!isset($seance)) echo "<option value='' selected disabled>Sélectionner un soin</option>";
foreach ($soins as $soin) {
    $selected = ($soin->idSoin == $seance->idSoin) ? " selected" : "";
    echo "<option value='$soin->idSoin' $selected>$soin->nomSoin</option>";
}
echo <<<HTML
                        </select>
                        Date : <input type="date" name="dateSeance" value="$valDate" class="form-control mb-2" min="$dateDebut" max="$dateFin">
                        Heure : <input type="time" name="heureSeance" value="$valHeure" class="form-control mb-2">
                        Statut : <select class="form-control mb-3" name="statutSeance">
HTML;
foreach ($statuts as $statut) {
    $selected = ($statut == $seance->statutSeance) ? " selected" : "";
    echo "<option value='$statut'$selected>$statut</option>";
}
echo <<<HTML
                        </select>
                        <input type="submit" name="submitEdit" class="btn button mt-3" value="$action">
HTML;
if ($seance) {
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

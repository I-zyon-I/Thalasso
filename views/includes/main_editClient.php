<?php

$titre = $client ? "Modification" : "Création";
$action = $client ? "Modifier" : "Créer";
$valId = $client ? $client->idClient : "";
$valNom = $client ? $client->nomClient : "";
$valPrenom = $client ? $client->prenomClient : "";
$valNaissance = $client ? $client->naissanceClient : "";
$valMail = $client ? $client->mailClient : "";
$requete = $client ? "update" : "insert" ;
$retour = $client ? "?page=afficheClient&id=$client->idClient" : "?page=listeSejours";


echo <<<HTML
<div class="container-fluid bg3">
    <div class="container">
        <div class="row">
            <h1><span class="titre">$titre de client</span></h1>
        </div>
        <a class="btn button retour" href="$retour">Retour</a>
        <div class="bloc">
            <div class="card article">
                <form class="p-2" method="post">
                    <input type="hidden" name="requete" value="$requete">
                    N° : <input type="text" name="idClient" value="$valId" class="form-control mb-2" disabled>
                    Nom : <input type="text" name="nomClient" value="$valNom" class="form-control mb-2">
                    Prénom : <input type="text" name="prenomClient" value="$valPrenom" class="form-control mb-2">
                    Date de naissance : <input type="date" name="naissanceClient" value="$valNaissance" class="form-control mb-2">
                    Email : <input type="email" name="mailClient" value="$valMail" pattern ="[a-z0-9._%+-]+@[a-z0-9.-]+.[a-z]{2,4}$" class="form-control mb-2">
                    <input type="submit" name="submitEdit" class="btn button mt-3" value="$action">
HTML;
if ($client) {
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

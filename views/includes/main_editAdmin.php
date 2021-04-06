<?php 

$titre = $admin ? "Modification" : "Création";
$action = $admin ? "Modifier" : "Créer";
$valId = $admin ? $admin->idAdmin : "";
$valLogin = $admin ? $admin->loginAdmin : "";
$requete = $admin ? "update" : "insert" ;
$retour = $admin ? "?page=afficheAdmin&id=$admin->idAdmin" : "?page=listeSejours";

echo <<<HTML
    <div class="container-fluid bg4">
        <div class="container">
            <h1>$titre d'Utilisateur</h1>
            <a class="btn button retour" href="$retour">Retour</a>
            <div class="bloc">
                <div class="card article">
                    <form method="post">
                        <input type="hidden" name="requete" value="$requete">
                        N° : <input type="text" name="idAdmin" value="$valId" class="form-control mb-2" disabled>
                        Identifiant : <input type="text" name="loginAdmin" value="$valLogin" class="form-control mb-2">
                        Mot de passe : <input type="password" name="passwordAdmin1" value="" class="form-control mb-2">
                        Confirmation : <input type="password" name="passwordAdmin2" value="" class="form-control mb-2">
                        <div class="erreur">$message</div>
                        <input type="submit" name="submitEditLogin" class="btn button mt-3" value="$action">
                    </form>
                </div>
            </div>
        </div>
    </div>
HTML;
?>
<?php

// Affichage des données Admin 
$nomUpper = strtoupper($admin->loginAdmin);
$idAdmin = $admin->idAdmin;
echo <<<HTML
    <div class="container">
        <h1>Fiche Admin</h1>
        <div class="bloc">
            <div class="card mb-2">
                <div class="card-body bg-success">
                    <h5 class="card-title">Admin :</h5>
                    Admin n° $admin->idAdmin<br>
                    Identifiant : $nomUpper<br>
                    Password : $admin->passwordAdmin<br>
                    <a class="btn button mt-2" href="?page=editAdmin&id=$idAdmin">Modifier</a>
                </div>
            </div>
        </div>
    </div>
HTML;
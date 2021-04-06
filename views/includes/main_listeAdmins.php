<div class="container-fluid bg4">
    <div class="container">
        <h1>Liste des Utilisateurs</h1>
        <div class="bloc">
        <!-- Liste des Admins -->
        <?php
        // Test de l'existence des Admins
        if ($admins) {

            // Création d'un accordéon
            echo "<div class='accordion' id='accordionExample'>";

            // Création d'un cadre pour chaque Admin
            foreach ($admins as $admin) {
                $id = $admin->idAdmin;
                echo <<<HTML
                    <div class="accordion-item light">
                        <h2 class="accordion-header" id="heading$id">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse$id" aria-expanded="false" aria-controls="collapse$id">
                                Admin n° $id : $admin->loginAdmin
                            </button>
                        </h2>
                        <div id="collapse$id" class="accordion-collapse collapse" aria-labelledby="heading$id" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <strong>Admin :</strong><br>
                                Identifiant : $admin->loginAdmin<br>
                                Mot de passe : $admin->passwordAdmin<br>
                            </div>
                        <a class='btn button m-2' href='?page=afficheAdmin&id=$id'>Fiche Admin</a>
                        </div>
                    </div>           
HTML;
            } 
        }
        ?>
                <a class='btn button m-2' href='?page=editAdmin'>Créer Admin</a>
            </div>
        </div>
    </div>
</div>
<?php
$id = $sejour->idSejour;
echo <<<HTML
        <div class="container">
            <h1>Edition de séjour</h1>
            <div class="bloc">
                <div class="card">
                    <div class="card-header mb-3">
                        <strong>N° de dossier : </strong>$id
                    </div>
                    <form class="p-2" action="?page=afficheSejour&id=$id" method="post">
                        Date de début : <input type="date" name="dateDebutSejour" value="{$sejour->dateDebutSejour}" class="form-control mb-2">
                        Durée : <input type="number" name="dureeJourSejour" value="{$sejour->dureeJourSejour}" class="form-control mb-2">
                        Vestiaire : <input type="text" name="vestiaireSejour" value="{$sejour->vestiaireSejour}" class="form-control mb-2">
                        Statut :
                        <select class="form-control mb-3" name="statutSejour">
                            <option>VAL</option>
                            <option>CLO</option>
                            <option>DEL</option>
                        </select>
                        <input type="submit" class="btn button" value="Enregistrer">
                    </form>
                </div>
            </div>
        </div>
HTML;

<nav class="navbar fixed-top navbar-expand-md navbar-dark col-12">
    <!-- <a class="navbar-brand" href="#"><?= $nameApp ?></a> -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse col-9 justify-content-between" id="navbarsExampleDefault">
    
        <ul class="navbar-nav col-2 offset-1">
            <?= $hbt->bt4Li("?page=home", "Accueil") ?>
            <?= $hbt->bt4Li("?page=contact", "Contact") ?>
        </ul>
    <?php
        $id_session = $_COOKIE['admin'];
        if (isset($id_session)) {
            echo <<<HTML
        <div class="input-group col-4">
        <button class="btn btn-outline-light dropdown-toggle me-3" type="button" data-bs-toggle="dropdown" aria-expanded="false">Administration</button>
            <ul class=" dropdown-menu">
                {$hbt->bt4Li("?page=listeSejours", "Séjours")} 
                {$hbt->bt4Li("?page=listeAdmins", "Administateurs")} 
                {$hbt->bt4Li("?page=editClient", "Nouveau client")} 
            </ul>
            <form class="d-flex" action="?page=recherche" method="GET">
                <input type="hidden" name="page" value="recherche">
                <input class="form-control search" type="search" id="search" name="search" placeholder="Rechercher" aria-label="Search">
                <button class="btn btn-light"  type="submit"><i class="bi bi-search"></i></button>
            </form>
        </div>
        <a href="?page=home&logout" class="btn button offset-4"><i class="bi bi-box-arrow-left"></i> Logout</a>
HTML;
        }

    ?>
        
    </div>
    <div class="meteo col-2 offset-1">
        <h3 id="city-name"></h3>
        <img src="" id="current-weather-icon">
        <h6 id="current-weather"></h6>
        <h6 id="current-temp"></h6>
    </div>
</nav>

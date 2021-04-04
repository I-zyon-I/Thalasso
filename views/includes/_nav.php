<nav class="navbar  navbar-expand-md navbar-dark">
    <!-- <a class="navbar-brand" href="#"><?= $nameApp ?></a> -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <?= $hbt->bt4Li("?page=home", "Accueil") ?>
            <?= $hbt->bt4Li("?page=contact", "Contact") ?>
            <?= $hbt->bt4Li("?page=listeSejours", "Séjours") ?>
            <?= $hbt->bt4Li("?page=editClient", "Nouveau client") ?>
            <form class="d-flex" action="?page=recherche" method="POST">
                <input class="form-control me-2" type="search" id="search" name="search" placeholder="Rechercher" aria-label="Search">
                <button class="btn button" type="submit">Rechercher</button>
            </form>
        </ul>
    </div>
    <div class="meteo">
            <h3 id="city-name"></h3>
            <img src="" id="current-weather-icon">
            <h6 id="current-weather"></h6>
            <h6 id="current-temp"></h6>
    </div>
</nav>
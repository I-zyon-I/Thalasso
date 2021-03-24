<?php 

// inclusion des fichiers pricipaux

require_once "_config/config.php";
require_once "_helper/HelperBootstrap.php";
require_once "_helper/HelperFileSystem.php";
require_once "_helper/HelperHtml.php";
require_once "_helper/HelperSecurite.php";
$hbt = HelperBootstrap::getSingleton();
$hfs = HelperFileSystem::getSingleton();
$hh = HelperHtml::getSingleton();
$hs = HelperSecurite::getSingleton();
require_once "_config/db.php";

//Nom de l'application 
$nameApp = "WEBSITE_NAME";

// définition de la route courante 
if (isset($_GET['page'])and !empty($_GET['page'])) {
    $page = trim(strtolower($_GET['page']));
}else{
    //page par défaut si aucune autre page est demandée
    $page = "home";
}

// array contenant toutes les pages disponibles 
$allpages = scandir("controllers/");

// test si la page demandée par le visiteur est disponible
if(in_array($page . '_controller.php', $allpages)) {
    // Ajout des fichiers nécessaires au traitement de la demande du visiteur
    require_once 'models/' . $page . '_model.php';
    require_once 'controllers/' . $page . '_controller.php';
    require_once 'views/' . $page . '_view.php';
}else{
    // page demandée non disponible
    echo "Page demandée non disponible : erreur 404";
}


?>
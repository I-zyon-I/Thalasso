<?php
// --------------------------- //
//       ERRORS DISPLAY        //
// --------------------------- //

//!\\ A enlever lors du déploiement
error_reporting(E_ERROR | E_PARSE);
ini_set('display_errors', true);

// --------------------------- //
//          CONSTANTS          //
// --------------------------- //

// Paths
// Pour fonctions d'inclusion php
define("PATH_FOR_PHP", substr($_SERVER['SCRIPT_FILENAME'], 0, -9));
// Pour images, fichiers etc (html)
define("PATH_FOR_HTML", substr($_SERVER['PHP_SELF'], 0, -9));

// Website informations
define("WEBSITE_NAME", "Thalass'eau");
define("WEBSITE_URL", "https://Thalass'eau.com");
define("WEBSITE_DESCRIPTION", "Votre source de bien-être");
define("WEBSITE_LANGUAGE", "fr");
define("WEBSITE_AUTHOR", "Groupe A");
define("WEBSITE_AUTHOR_MAIL", "GroupeA@gmail.com");

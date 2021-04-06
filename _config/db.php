<?php

// création d'un objet PDO

// Application
$bdd = "thalasso.db";
$bddPath = $hfs->pathCreate("s", ["bdd-sqlite"]) . $bdd;

$pdo = new PDO('sqlite:' . $bddPath, null, null, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
]);
?>
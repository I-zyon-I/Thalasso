<?php 
// création d'un objet PDO

/*$pdo =new PDO('mysql:host=' . DATABASE_HOST . ';dbname=' . DATABASE_NAME . ';charset=utf8',
                        DATABASE_USER,
                        DATABASE_PASSWORD);*/

// require_once $_SERVER["DOCUMENT_ROOT"] . DIRECTORY_SEPARATOR . "_helper". DIRECTORY_SEPARATOR . "HelperFileSystem.php";


// Application

$bdd = "thalasso.db";
$bddPath = $hfs->pathCreate("s", ["bdd-sqlite"]) . $bdd;

// $bddPath = "thalasso/bdd-sqlite/thalasso.db";

// $bddPath = $_SERVER["DOCUMENT_ROOT"]["bdd-sqlite"]."thalasso.db";

$pdo = new PDO('sqlite:' . $bddPath, null, null, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
]);


// $bddPath = __DIR__ . DIRECTORY_SEPARATOR . "bdd-sqlite" . DIRECTORY_SEPARATOR . $bdd;
// $pdo = new PDO('sqlite:' . $bddPath, null, null, [
//     PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
//     PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
// ]);
// $bddPath = Helper::pathCreate("serveur", ["bdd-sqlite"]) . $bdd;



?>
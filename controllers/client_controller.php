<?php

require_once "../vendor/autoload.php";

$pdo = new PDO("sqlite:../bdd-sqlite/thalasso.db");

$faker = Faker\Factory::create('fr_FR');
 
for ($i = 0; $i < 10; $i++) {
$statement = $pdo->prepare("INSERT INTO client (nomClient, prenomClient) VALUES (:nomClient, :prenomClient)");
$statement->execute(array(
    'nomClient' => $faker->lastname,
    'prenomClient' => $faker->firstname
));
};
// $statement = $pdo->query("insert into client (nomClient,prenomClient) values ('Nion','Alexandre');");
// $statement = $pdo->query("select * from client");
// $result = $statement->fetchAll();
// print_r($result);

?>
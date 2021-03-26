<?php

    require_once "../vendor/autoload.php";
    require_once "../_config/db.php";

    $faker = Faker\Factory::create('fr_FR');


    // Boucle de remplissage pour la table client
    for ($i = 0; $i < 10; $i++) {
        $statement = $pdo->prepare("INSERT INTO client (nomClient, prenomClient, telClient) VALUES (:nomClient, :prenomClient, :telClient)");
        $statement->execute(array(
            'nomClient' => $faker->lastname(),
            'prenomClient' => $faker->firstname(),
            'telClient' => $faker->phoneNumber()
        ));
    };


    // Boucle de remplissage pour la table séjour, adapter l'idClient au nombre de ligne client 
    for ($i = 0; $i < 10; $i++) {
        $statement = $pdo->prepare("INSERT INTO sejour (dateDebut, dureeSejour, vestiaire, idClient, statut) VALUES (:dateDebut, :dureeSejour, :vestiaire, :idClient, :statut)");
        $statement->execute(array(
            'dateDebut' => $faker->date(),
            'dureeSejour' => $faker->numberBetween(1,21),
            'vestiaire' => $faker->numberBetween(1,100),
            'idClient' => $faker->numberBetween(1,100),
            'statut' => $faker->randomElement(['VAL','CLO','DEL'])
        ));
    };

    // Boucle de remplissage pour la table seance, adapter les id au nombre d'instances soins et de sejours
    for ($i = 0; $i < 10; $i++) {
        $statement = $pdo->prepare("INSERT INTO seance (idSoin, idSejour, statut) VALUES (:idSoin, :idSejour, :statut)");
        $statement->execute(array(
            'idSoin' => $faker->numberBetween(1,100),
            'idSejour' => $faker->numberBetween(1,100),
            'statut' => $faker->randomElement(['VAL','CLO','DEL'])
        ));
    };
    // Boucle de remplissage pour la table soins, adapter au nombre de soins existants
    for ($i = 0; $i < 10; $i++) {
        $statement = $pdo->prepare("INSERT INTO soin (dureeSoin) VALUES (:dureeSoin)");
        $statement->execute(array(
            'dureeSoin' => $faker->randomElement([20,40,60])
        ));
    };


    $statement = $pdo->query("select * from client");
    $result = $statement->fetchAll();
    print_r($result);

?>
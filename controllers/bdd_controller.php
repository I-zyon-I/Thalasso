<?php

    require_once "../vendor/autoload.php";
    require_once "../_config/db.php";


    $faker = Faker\Factory::create('fr_FR');

    // Boucle de remplissage pour la table client
    for ($i = 0; $i < 100; $i++) {
        $statement = $pdo->prepare("INSERT INTO client ( nomClient, prenomClient, naissanceClient, mailClient ) VALUES ( :nomClient, :prenomClient, :naissanceClient, :mailClient )");
        $statement->execute(array(
            'nomClient' => $faker->lastname(),
            'prenomClient' => $faker->firstname(),
            'naissanceClient' => $faker->date('Y-m-d','2003-12-31'),
            'mailClient' => $faker->email()
        ));
    };
    
    // Boucle de remplissage pour la table séjour 
    for ($i = 0; $i < 100; $i++) {
        $statement = $pdo->prepare("INSERT INTO sejour ( dateDebutSejour, dureeJourSejour, vestiaireSejour, statutSejour, idClient) VALUES ( :dateDebutSejour, :dureeJourSejour, :vestiaireSejour, :statutSejour, :idClient)");
        $statement->execute(array(
            'dateDebutSejour' => $faker->date(),
            'dureeJourSejour' => $faker->numberBetween(1,21),
            'vestiaireSejour' => strVal($faker->numberBetween(1,100)),  
            'statutSejour' => $faker->randomElement(['VAL','CLO','DEL']),
            'idClient' => $faker->numberBetween(1,100)
        ));
    };
    
    // Boucle de remplissage pour la table soins, adapter au nombre de soins existants ($i). génération de l'idEspace en fonction du nombre d'espaces (10) 
    for ($i = 0; $i < 47; $i++) {
        $statement = $pdo->prepare("INSERT INTO soin (nomSoin, dureeMinuteSoin, idEspace) VALUES (:nomSoin, :dureeMinuteSoin, :idEspace)");
        $statement->execute(array(
            'nomSoin' => $faker->unique()->randomElement(['Algonisation','Algothérapie','Aquagym',
                                                            'Auriculothérapie','Bains Bouillonnants',
                                                            'Bains Hydromassants','Bains Microbulles',
                                                            'Bains multijets','Boues auto-chauffantes',
                                                            'Cascade','Cavitosonic','Cryothermie',
                                                            'Douche à Affusion','Douche Aromatonic',
                                                            'Douche à affusion','Douche à Jet',
                                                            'Douche à jet circulatoire','Douche Sous-Marine',
                                                            'Drainage Lymphatique','Electrothérapie',
                                                            'Enveloppement réfrigérant','Ergothérapie',
                                                            'Fangothérapie','Hammam','Hydrojambes',
                                                            'Hydrojet Wellsystem','Hydromassage sous-marin en piscine',
                                                            'Hydrothérapie','Ionisation','Jets Sous-Marins',
                                                            'Kinébalnéothérapie','Massage','Mésothérapie',
                                                            'Massage Palper-rouler','Oxygénothérapie dynamisée',
                                                            'Pédiluve Maniluve','Pélothérapie','Pressothérapie',
                                                            'Rééducation en piscine','Rééducation en salle',
                                                            'Rééducation périnéale-abdominale', 'Relaxation en piscine',
                                                            'Sauna', 'Shiatsu', 'Sophrologie', 'Stretching','Thermosudation']),
            'dureeMinuteSoin' => $faker->randomElement([20,40,60]),
            'idEspace' => $faker->numberBetween(1,10)
        ));
    };
    
    // Boucle de remplissage pour la table seance, adapter idSoin sur le nombre de soins (xx), adapter idSejour au nombre de séjour crées (100) Voir pour faire concorder les dates de séjour et les dates des seances
    for ($i = 0; $i < 100; $i++) {
        $statement = $pdo->prepare("INSERT INTO seance (idSoin, idSejour, dateSeance, heureSeance, statutSeance) VALUES (:idSoin, :idSejour, :dateSeance, :heureSeance, :statutSeance)");
        $statement->execute(array(
            'idSejour' => $faker->numberBetween(1,100),
            'idSoin' => $faker->numberBetween(1,47),
            'dateSeance' => $faker->date(),
            'heureSeance' => $faker->randomElement(['08:00:00','08:20:00','08:40:00',
                                                    '09:00:00','09:20:00','09:40:00',
                                                    '10:00:00','10:20:00','10:40:00',
                                                    '11:00:00','11:20:00','11:40:00',
                                                    '12:00:00','12:20:00','12:40:00',
                                                    '13:00:00','13:20:00','13:40:00',
                                                    '14:00:00','14:20:00','14:40:00',
                                                    '15:00:00','15:20:00','15:40:00',
                                                    '16:00:00','16:20:00','16:40:00',
                                                    '17:00:00','17:20:00','17:40:00',
                                                    '18:00:00','18:20:00','18:40:00',
                                                    '19:00:00','19:20:00','19:40:00']),
            'statutSeance' => $faker->randomElement(['VAL','CLO','DEL'])
        ));
    };

    $statement = $pdo->query("select * from client");
    $result = $statement->fetchAll();
    print_r($result);

?>
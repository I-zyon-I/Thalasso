<?php

class ClientRepository {
    // Attributs
    protected $pdo;

    // Constructeur
    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    // Méthode
    public function findAll() {
        try {
            $sql = "SELECT * FROM client";
            return $this->pdo->query($sql);
        } catch (PDOException $e) {
            echo "Erreur Query sur : " . $e->getMessage();
        }
    }

    public function findBy(string $idClient) {
        try {
            // $sql = "SELECT * FROM client WHERE idClient = :idClient;";
            $sql = "SELECT * FROM client WHERE idClient = $idClient;";
            // $data = [
            //     ':idClient' => $idClient
            // ];
            // return $this->pdo->prepare($sql)->execute($data);
            return $this->pdo->query($sql);
        } catch (PDOException $e) {
            echo "Erreur Query sur : " . $e->getMessage();
        }
    }

    public function update(Client $client) {
        try {
            $sql = "UPDATE client
                SET nomClient = :nomClient,
                    prenomClient = :prenomClient,
                    naissanceClient = :naissanceClient,
                    mailClient = :mailClient
                WHERE idClient = :idClient;";
            $data = [
                ':idClient' => $client->getIdClient(),
                ':nomClient' => $client->getNomClient(),
                ':prenomClient' => $client->getPrenomClient(),
                ':naissanceClient' => $client->getNaissanceClient(),
                ':mailClient' => $client->getMailClient()
            ];
            return $this->pdo->prepare($sql)->execute($data);
        } catch (PDOException $e) {
            echo "Erreur Query sur : " . $e->getMessage();
        }
    }

    public function insert(Client $client) {
        try {
            $sql = "INSERT INTO client (nomClient, prenomClient, naissanceClient, mailClient)
                VALUES (:nomClient, :prenomClient, :naissanceClient, :mailClient);";
            $data = [
                ':nomClient' => $client->getNomClient(),
                ':prenomClient' => $client->getPrenomClient(),
                ':naissanceClient' => $client->getNaissanceClient(),
                ':mailClient' => $client->getMailClient()
            ];
            return $this->pdo->prepare($sql)->execute($data);
        } catch (PDOException $e) {
            echo "Erreur Query sur : " . $e->getMessage();
        }
    }

    public function lastInsert() {
        try {
            return $this->pdo->lastInsertId();
        } catch (PDOException $e) {
            echo "Erreur Query sur : " . $e->getMessage();
        }
    }

    public function rechercheClient($parametre) {
        try {
            return $this->pdo->query("SELECT *
                FROM client AS cl
                WHERE cl.nomClient LIKE '%$parametre%' OR cl.prenomClient LIKE '%$parametre%' OR cl.idClient LIKE '$parametre';" //A CONFIRMER
            );
        } catch (PDOException $e) {
            echo "Erreur Query sur : " . $e->getMessage();
        }
    }

    public function rechercheSejour($parametre) {
        try {
            return $this->pdo->query("SELECT *
                FROM sejour
                WHERE idClient = '$parametre';" //A CONFIRMER
            );
        } catch (PDOException $e) {
            echo "Erreur Query sur : " . $e->getMessage();
        }
    }
    
    public function delete(string $idClient) {
        try {
            $sql = "DELETE FROM client WHERE idClient = $idClient;";
            return $this->pdo->query($sql);
        } catch (PDOException $e) {
            echo "Erreur Query sur : " . $e->getMessage();
        }
    }

}

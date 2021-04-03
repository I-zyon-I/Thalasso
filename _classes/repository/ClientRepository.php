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
            return $this->pdo->query("select * from Client");
        } catch (PDOException $e) {
            echo "Erreur Query sur : " . $e->getMessage();
        }
    }

    public function findByClient($idClient) {
        try {
            return $this->pdo->query("SELECT * FROM client WHERE idClient = $idClient;");
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
}

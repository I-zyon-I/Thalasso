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
            $sql = "SELECT * FROM client WHERE idClient = $idClient;";
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

    public function listeRechercheClients($recherche, $paging) {
        try {
            $offset = ($paging - 1) * 10;
            $sql = "SELECT *
                FROM client
                WHERE idClient LIKE '$recherche' OR nomClient LIKE '%$recherche%' OR prenomClient LIKE '%$recherche%'
                ORDER BY nomClient, prenomClient
                LIMIT $offset, 10;";
            return $this->pdo->query($sql);
        } catch (PDOException $e) {
            echo "Erreur Query sur : " . $e->getMessage();
        }
    }

    function count($recherche) {
        try {
            $sql = "SELECT COUNT (*) AS total
                FROM client
                WHERE idClient LIKE '$recherche'
                    OR nomClient LIKE '%$recherche%'
                    OR prenomClient LIKE '%$recherche%';";
            return $this->pdo->query($sql);
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

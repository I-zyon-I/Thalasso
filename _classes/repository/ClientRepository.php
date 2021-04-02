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

    public function findBy($idClient) {
        try {
            return $this->pdo->query("SELECT * FROM client WHERE idClient = $idClient;");
        } catch (PDOException $e) {
            echo "Erreur Query sur : " . $e->getMessage();
        }
    }

    // public function getLast() {
    //     try {
    //         return $this->pdo->query("SELECT MAX(idClient) AS lastIdClient from client");
    //     } catch (PDOException $e) {
    //         echo "Erreur Query sur : " . $e->getMessage();
    //     }
    // }

    public function update($idClient, $nomClient, $prenomClient, $naissanceClient, $mailClient) {
        try {
            $sql = "UPDATE client
            SET nomClient = " . $nomClient . ",
            prenomClient = :prenomClient,
            naissanceClient = :naissanceClient,
            mailClient = :mailClient
            WHERE idClient = :idClient;";
            $data = [
                ':idClient' => $idClient,
                ':nomClient' => $nomClient,
                ':prenomClient' => $prenomClient,
                ':naissanceClient' => $naissanceClient,
                ':mailClient' => $mailClient
            ];
            return $this->pdo->prepare($sql)->execute($data);
        } catch (PDOException $e) {
            echo "Erreur Query sur : " . $e->getMessage();
        }
    }

    public function insert($nomClient, $prenomClient, $naissanceClient, $mailClient) {
        try {
            $sql = "INSERT INTO client (nomClient, prenomClient, naissanceClient, mailClient)
            VALUES (:nomClient, :prenomClient, :naissanceClient, :mailClient);";
            $data = [
                ':nomClient' => $nomClient,
                ':prenomClient' => $prenomClient,
                ':naissanceClient' => $naissanceClient,
                ':mailClient' => $mailClient
            ];
            return $this->pdo->prepare($sql)->execute($data);
            // return $this->pdo->prepare($sql)->execute();
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

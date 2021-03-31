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
}

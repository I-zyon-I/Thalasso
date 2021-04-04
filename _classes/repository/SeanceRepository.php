<?php

class SeanceRepository {
    // Attributs
    protected $pdo;

    // Constructeur
    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    // Méthode
    public function findAll() {
        try {
            $sql = "SELECT * FROM seance;";
            return $this->pdo->query($sql);
        } catch (PDOException $e) {
            echo "Erreur Query sur : " . $e->getMessage();
        }
    }

    public function findBySejour($idSejour) {
        try {
            $sql = "SELECT *
            FROM seance as sc
                INNER JOIN soin as so
                    ON sc.idSoin = so.idSoin
                INNER JOIN espace as ep
                    ON so.idEspace = ep.idEspace
            WHERE idSejour = $idSejour
            ORDER BY
                sc.dateSeance ASC,
                sc.heureSeance ASC;";
            return $this->pdo->query($sql);
        } catch (PDOException $e) {
            echo "Erreur Query sur : " . $e->getMessage();
        }
    }
}

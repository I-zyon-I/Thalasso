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

    public function findBy($idSeance) {
        try {
            $sql = "SELECT *
                FROM seance AS se
                    INNER JOIN sejour AS sj
                        ON se.idSejour = sj.idSejour
                    INNER JOIN client AS cl
                        ON sj.idClient = cl.idClient
                    INNER JOIN soin AS so
                        ON se.idSoin = so.idSoin
                    INNER JOIN espace AS ep
                        ON so.idEspace = ep.idEspace
                WHERE se.idSeance = $idSeance;";
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

    public function update(Seance $seance) {
        try {
            $sql = "UPDATE seance
                SET idSejour = :idSejour,
                    idSoin = :idSoin,
                    dateSeance = :dateSeance,
                    heureSeance = :heureSeance,
                    statutSeance = :statutSeance
                WHERE idSeance = :idSeance;";
            $data = [
                ':idSeance' => $seance->getIdSeance(),
                ':idSejour' => $seance->getIdSejour(),
                ':idSoin' => $seance->getIdSoin(),
                ':dateSeance' => $seance->getDateSeance(),
                ':heureSeance' => $seance->getHeureSeance(),
                ':statutSeance' => $seance->getStatutSeance()
            ];
            return $this->pdo->prepare($sql)->execute($data);
        } catch (PDOException $e) {
            echo "Erreur Query sur : " . $e->getMessage();
        }
    }

    public function insert(Seance $seance) {
        try {
            $sql = "INSERT INTO seance (idSejour, idSoin, dateSeance, heureSeance, statutSeance)
                VALUES (:idSejour, :idSoin, :dateSeance, :heureSeance, :statutSeance);";
            $data = [
                ':idSejour' => $seance->getIdSejour(),
                ':idSoin' => $seance->getIdSoin(),
                ':dateSeance' => $seance->getDateSeance(),
                ':heureSeance' => $seance->getHeureSeance(),
                ':statutSeance' => $seance->getStatutSeance()
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

    public function delete(string $idSeance) {
        try {
            $sql = "DELETE FROM seance WHERE idSeance = $idSeance;";
            return $this->pdo->query($sql);
        } catch (PDOException $e) {
            echo "Erreur Query sur : " . $e->getMessage();
        }
    }
}

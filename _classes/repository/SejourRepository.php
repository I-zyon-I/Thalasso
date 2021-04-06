<?php

class SejourRepository {

    // Attributs
    protected $pdo;

    // Constructeur
    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    // Méthode
    public function findAll() {
        try {
            return $this->pdo->query("SELECT * FROM sejour;");
        } catch (PDOException $e) {
            echo "Erreur Query sur : " . $e->getMessage();
        }
    }

    public function findBy(string $idSejour) {
        try {
            $sql = "SELECT *
                FROM sejour as sj
                    INNER JOIN client as cl
                        ON sj.idClient = cl.idClient
                WHERE idSejour = $idSejour ;";
            return $this->pdo->query($sql);
        } catch (PDOException $e) {
            echo "Erreur Query sur : " . $e->getMessage();
        }
    }

    public function findByClient(string $idClient) {
        try {
            $sql = "SELECT *
                FROM sejour as sj
                    INNER JOIN client as cl
                        ON sj.idClient = cl.idClient
                WHERE sj.idClient = $idClient ;";
            return $this->pdo->query($sql);
        } catch (PDOException $e) {
            echo "Erreur Query sur : " . $e->getMessage();
        }
    }

    public function listeSejours($paging, ?array $arrStatut) {
        try {
            $offset = ($paging - 1) * 10;
            $strStatut = !$arrStatut ? "('VAL')" : "('" . implode("', '", $arrStatut) . "')";
            $sql = "SELECT
                    sj.idSejour AS idSejour,
                    sj.dateDebutSejour AS dateDebutSejour,
                    sj.dureeJourSejour AS dureeJourSejour,
                    sj.vestiaireSejour AS vestiaireSejour,
                    sj.statutSejour AS statutSejour,
                    cl.nomClient AS nomClient,
                    cl.prenomClient AS prenomClient,
                    cl.naissanceClient AS naissanceClient,
                    cl.mailClient AS mailClient
                FROM sejour AS sj
                    INNER JOIN client AS cl
                        ON sj.idClient = cl.idClient
                WHERE statutSejour IN $strStatut
                ORDER BY
                    sj.dateDebutSejour ASC,
                    sj.idSejour ASC
                LIMIT $offset, 10;";
            return $this->pdo->query($sql);
        } catch (PDOException $e) {
            echo "Erreur Query sur : " . $e->getMessage();
        }
    }

    function count($arrStatut = ['VAL', 'CLO', 'DEL']) {
        try {
            $strStatut = $arrStatut == [] ? "('VAL', 'CLO', 'DEL')" : "('" . implode("', '", $arrStatut) . "')";
            $sql = "SELECT COUNT (*) AS total FROM sejour WHERE statutSejour IN $strStatut;";
            return $this->pdo->query($sql);
        } catch (PDOException $e) {
            echo "Erreur Query sur : " . $e->getMessage();
        }
    }

    public function rechercheSejour($parametre) {
        try {
            $sql = "SELECT *
                FROM sejour AS sj
                    INNER JOIN client AS cl
                        ON sj.idClient = cl.idClient
                WHERE idSejour = '$parametre';";
            return $this->pdo->query($sql);
        } catch (PDOException $e) {
            echo "Erreur Query sur : " . $e->getMessage();
        }
    }

    public function update(Sejour $sejour) {
        try {
            $sql = "UPDATE sejour
                SET dateDebutSejour = :dateDebutSejour,
                    dureeJourSejour = :dureeJourSejour,
                    vestiaireSejour = :vestiaireSejour,
                    statutSejour = :statutSejour,
                    idClient = :idClient
                WHERE idSejour = :idSejour;";
            $data = [
                ':idSejour' => $sejour->getIdSejour(),
                ':dateDebutSejour' => $sejour->getDateDebutSejour(),
                ':dureeJourSejour' => $sejour->getDureeJourSejour(),
                ':vestiaireSejour' => $sejour->getVestiaireSejour(),
                ':statutSejour' => $sejour->getStatutSejour(),
                ':idClient' => $sejour->getIdClient()
            ];
            return $this->pdo->prepare($sql)->execute($data);
        } catch (PDOException $e) {
            echo "Erreur Query sur : " . $e->getMessage();
        }
    }

    public function insert(Sejour $sejour) {
        try {
            $sql = "INSERT INTO sejour (dateDebutSejour, dureeJourSejour, vestiaireSejour, statutSejour, idClient)
                VALUES (:dateDebutSejour, :dureeJourSejour, :vestiaireSejour, :statutSejour, :idClient);";
            $data = [
                ':dateDebutSejour' => $sejour->getDateDebutSejour(),
                ':dureeJourSejour' => $sejour->getDureeJourSejour(),
                ':vestiaireSejour' => $sejour->getVestiaireSejour(),
                ':statutSejour' => $sejour->getStatutSejour(),
                ':idClient' => $sejour->getIdClient()
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

    public function delete(string $idSejour) {
        try {
            $sql = "DELETE FROM sejour WHERE idSejour = $idSejour;";
            return $this->pdo->query($sql);
        } catch (PDOException $e) {
            echo "Erreur Query sur : " . $e->getMessage();
        }
    }
}

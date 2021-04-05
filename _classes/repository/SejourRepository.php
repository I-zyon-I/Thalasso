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

    public function findBySoin(string $idSejour, string $idSoin) {
        try {
            $sql = "SELECT *
                FROM sejour AS sj
                    INNER JOIN seance AS se
                        ON sj.idSejour = se.idSejour
                    INNER JOIN soin AS so
                        ON se.idSoin = so.idSoin
                    INNER JOIN espace AS ep
                        ON so.idEspace = ep.idEspace
                WHERE sj.idSejour = $idSejour
                    AND so.idSoin = $idSoin;";
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

    // TO DELETE...?
    public function afficheSejour($idSejour) {
        try {
            $sql = "SELECT
                    sj.idSejour AS idSejour,
                    sj.dateDebutSejour AS dateDebutSejour,
                    sj.dureeJourSejour AS dureeJourSejour,
                    sj.vestiaireSejour AS vestiaireSejour,
                    sj.statutSejour AS statutSejour,
                    cl.idClient AS idClient,
                    cl.nomClient AS nomClient,
                    cl.prenomClient AS prenomClient,
                    cl.naissanceClient AS naissanceClient,
                    cl.mailClient AS mailClient,
                FROM sejour AS sj
                    LEFT JOIN client AS cl
                        ON sj.idClient = cl.idClient
                    LEFT JOIN seance AS sc
                        ON sj.idSejour = sc.idSejour
                    LEFT JOIN soin AS so
                        ON sc.idSoin = so.idSoin
                    LEFT JOIN espace as ep
                        ON so.idEspace = ep.idEspace
                WHERE sj.idSejour = $idSejour
                ORDER BY
                    sc.dateSeance ASC,
                    sc.heureSeance ASC;";
            return $this->pdo->query($sql);
        } catch (PDOException $e) {
            echo "Erreur Query sur : " . $e->getMessage();
        }
    }
    
    // public function editSejour($id) {
    //     try {
    //         return $this->pdo->query("SELECT *
    //             FROM sejour
    //             WHERE idSejour = $id;"
    //         );
    //     } catch (PDOException $e) {
    //         echo "Erreur Query sur : " . $e->getMessage();
    //     }
    // }
    
    public function modifSejour($id) {
        try {
            return $this->pdo->query("SELECT *
                FROM sejour
                WHERE idSejour = $id;"
            );
        } catch (PDOException $e) {
            echo "Erreur Query sur : " . $e->getMessage();
        }
    }
    
    public function rechercheSejour($parametre) {
        try {
            return $this->pdo->query("SELECT *
        FROM sejour AS sj
            INNER JOIN client AS cl
                ON sj.idClient = cl.idClient
        WHERE idSejour = '$parametre'");
        } catch (PDOException $e) {
            echo "Erreur Query sur : " . $e->getMessage();
        }
    }
    public function rechercheByClient($parametre) {
        try {
            return $this->pdo->query("SELECT *
                FROM sejour AS sj
                    LEFT JOIN client AS cl
                        ON sj.idClient = cl.idClient
                    LEFT JOIN seance AS sc
                        ON sj.idSejour = sc.idSejour
                    WHERE sj.idClient = '$parametre' OR cl.nomClient = '$parametre' OR cl.prenomClient = '$parametre'
                ORDER BY
                    sc.dateSeance ASC,
                    sc.heureSeance ASC;"
            );
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

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
    
    public function editSejour($id) {
        try {
            return $this->pdo->query("SELECT *
                FROM sejour
                WHERE idSejour = $id;"
            );
        } catch (PDOException $e) {
            echo "Erreur Query sur : " . $e->getMessage();
        }
    }
    
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
    


}

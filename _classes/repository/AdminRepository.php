<?php

Class AdminRepository {

    // Attributs
    protected $pdo;

    // Constructeur
    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    // Méthode
    public function findAll() {
        try {
            return $this->pdo->query("select * from admin");
        } catch (PDOException $e) {
            echo "Erreur Query sur : " . $e->getMessage();
        }
    }


    public function findBy($idAdmin) {
        try {
            return $this->pdo->query("SELECT * FROM admin WHERE idAdmin = $idAdmin;");
        } catch (PDOException $e) {
            echo "Erreur Query sur : " . $e->getMessage();
        }
    }

    public function update($idAdmin, $loginAdmin, $passwordAdmin) {
        try {
            $sql = "UPDATE admin
            SET loginAdmin = :loginAdmin,
            passwordAdmin = :passwordAdmin,
            WHERE idAdmin = :idAdmin;";
            $data = [
                ':idAdmin' => $idAdmin,
                ':loginAdmin' => $loginAdmin,
                ':passwordAdmin' => $passwordAdmin,
            ];
            return $this->pdo->prepare($sql)->execute($data);
        } catch (PDOException $e) {
            echo "Erreur Query sur : " . $e->getMessage();
        }
    }
    // Création d'un nouvel administrateur

    public function insert($loginAdmin, $passwordAdmin) {
        try {
            $sql = "INSERT INTO admin (loginAdmin, passwordAdmin)
            VALUES (:loginAdmin, :passwordAdmin);";
            $data = [
                ':loginAdmin' => $loginAdmin,
                ':passwordAdmin' => password_hash($passwordAdmin , PASSWORD_BCRYPT),
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

    // public function updatePasswordHash($passwordAdmin) {
    //     $passwordAdminHash = password_hash($passwordAdmin, PASSWORD_BCRYPT);
    //     try {
    //         $sql = "INSERT INTO admin (passwordAdminHash)
    //         VALUES (:passwordAdminHash);";
    //         $data = [
    //             ':passwordAdminHash' => $passwordAdminHash,
    //         ];
    //         return $this->pdo->prepare($sql)->execute($data);
    //         // return $this->pdo->prepare($sql)->execute();
    //     } catch (PDOException $e) {
    //         echo "Erreur Query sur : " . $e->getMessage();
    //     }
    // }
}




?>
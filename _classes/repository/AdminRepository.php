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
            $sql = "SELECT * FROM admin";
            return $this->pdo->query($sql);
        } catch (PDOException $e) {
            echo "Erreur Query sur : " . $e->getMessage();
        }
    }

    public function findBy($idAdmin) {
        try {
            $sql = "SELECT * FROM admin WHERE idAdmin = $idAdmin;";
            return $this->pdo->query($sql);
        } catch (PDOException $e) {
            echo "Erreur Query sur : " . $e->getMessage();
        }
    }

    public function update(Admin $admin) {
        try {
            $sql = "UPDATE admin
                SET loginAdmin = :loginAdmin,
                    passwordAdmin = :passwordAdmin
                WHERE idAdmin = :idAdmin;";
            $data = [
                ':idAdmin' => $admin->getIdAdmin(),
                ':loginAdmin' => $admin->getLoginAdmin(),
                ':passwordAdmin' => $admin->getPasswordAdmin()
            ];
            return $this->pdo->prepare($sql)->execute($data);
        } catch (PDOException $e) {
            echo "Erreur Query sur : " . $e->getMessage();
        }
    }

    // Création d'un nouvel administrateur
    public function insert(Admin $admin) {
        try {
            $sql = "INSERT INTO admin (loginAdmin, passwordAdmin)
                VALUES (:loginAdmin, :passwordAdmin);";
            $data = [
                ':loginAdmin' => $admin->getLoginAdmin(),
                ':passwordAdmin' => $admin->getPasswordAdmin()
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
?>
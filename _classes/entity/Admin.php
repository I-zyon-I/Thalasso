<?php

class Admin {
    // Attributs
    protected $idAdmin;
    protected $loginAdmin;
    protected $passwordAdmin;

    // Constructeur
    public function __construct(?string $idAdmin, string $loginAdmin, string $passwordAdmin) {
        $this->idAdmin = $idAdmin;
        $this->loginAdmin = $loginAdmin;
        $passwordAdmin = password_hash($passwordAdmin, PASSWORD_BCRYPT);
        $this->passwordAdmin = $passwordAdmin;
    }

    /**
     * Get the value of idAdmin
     */
    public function getIdAdmin() {
        return $this->idAdmin;
    }

    /**
     * Get the value of loginAdmin
     */
    public function getLoginAdmin() {
        return $this->loginAdmin;
    }

    /**
     * Set the value of loginAdmin
     *
     * @return  self
     */
    public function setLoginAdmin($loginAdmin) {
        $this->loginAdmin = $loginAdmin;
        return $this;
    }

    /**
     * Get the value of passwordAdmin
     */
    public function getPasswordAdmin() {
        return $this->passwordAdmin;
    }

    /**
     * Set the value of passwordAdmin
     *
     * @return  self
     */
    public function setPasswordAdmin($passwordAdmin) {
        $this->passwordAdmin = $passwordAdmin;
        return $this;
    }
}

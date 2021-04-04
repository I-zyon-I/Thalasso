<?php

class Sejour {

    // Attributs
    protected $idSejour;
    protected $dateDebutSejour;
    protected $dureeJourSejour;
    protected $vestiaireSejour;
    protected $statutSejour;
    protected $idClient;

    // Constructeur
    public function __construct(?string $idSejour, string $dateDebutSejour, int $dureeJourSejour, int $vestiaireSejour, string $statutSejour, int $idClient) {
        $this->idSejour = $idSejour;
        $this->dateDebutSejour = $dateDebutSejour;
        $this->dureeJourSejour = $dureeJourSejour;
        $this->vestiaireSejour = $vestiaireSejour;
        $this->statutSejour = $statutSejour;
        $this->idClient = $idClient;
    }


    // Getter & Setter

    /**
     * Get the value of idSejour
     */
    public function getIdSejour() {
        return $this->idSejour;
    }


    /**
     * Get the value of dateDebutSejour
     */
    public function getDateDebutSejour() {
        return $this->dateDebutSejour;
    }

    /**
     * Set the value of dateDebutSejour
     *
     * @return  self
     */
    public function setDateDebutSejour($dateDebutSejour) {
        $this->dateDebutSejour = $dateDebutSejour;

        return $this;
    }

    /**
     * Get the value of dureeJourSejour
     */
    public function getDureeJourSejour() {
        return $this->dureeJourSejour;
    }

    /**
     * Set the value of dureeJourSejour
     *
     * @return  self
     */
    public function setDureeJourSejour($dureeJourSejour) {
        $this->dureeJourSejour = $dureeJourSejour;

        return $this;
    }

    /**
     * Get the value of vestiaireSejour
     */
    public function getVestiaireSejour() {
        return $this->vestiaireSejour;
    }

    /**
     * Set the value of vestiaireSejour
     *
     * @return  self
     */
    public function setVestiaireSejour($vestiaireSejour) {
        $this->vestiaireSejour = $vestiaireSejour;

        return $this;
    }

    /**
     * Get the value of statutSejour
     */
    public function getStatutSejour() {
        return $this->statutSejour;
    }

    /**
     * Set the value of statutSejour
     *
     * @return  self
     */
    public function setStatutSejour($statutSejour) {
        $this->statutSejour = $statutSejour;

        return $this;
    }

    /**
     * Get the value of idClient
     */
    public function getIdClient() {
        return $this->idClient;
    }

    /**
     * Set the value of idClient
     *
     * @return  self
     */
    public function setIdClient($idClient) {
        $this->idClient = $idClient;

        return $this;
    }
}

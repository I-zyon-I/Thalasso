<?php

class Sejour {

    // Attributs
    protected $idSejour;
    protected $dateDebut;
    protected $dureeSejour;
    protected $vestiaire;
    protected $statut;
    protected $idClient;

    // Constructeur
    public function __construct(int $dateDebut, int $dureeSejour, int $vestiaire, string $statut, int $idClient) {
        $this->dateDebut = $dateDebut;
        $this->dureeSejour = $dureeSejour;
        $this->vestiaire = $vestiaire;
        $this->statut = $statut;
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
     * Get the value of dateDebut
     */
    public function getDateDebut() {
        return $this->dateDebut;
    }

    /**
     * Set the value of dateDebut
     *
     * @return  self
     */
    public function setDateDebut($dateDebut) {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    /**
     * Get the value of dureeSejour
     */
    public function getDureeSejour() {
        return $this->dureeSejour;
    }

    /**
     * Set the value of dureeSejour
     *
     * @return  self
     */
    public function setDureeSejour($dureeSejour) {
        $this->dureeSejour = $dureeSejour;

        return $this;
    }

    /**
     * Get the value of vestiaire
     */
    public function getVestiaire() {
        return $this->vestiaire;
    }

    /**
     * Set the value of vestiaire
     *
     * @return  self
     */
    public function setVestiaire($vestiaire) {
        $this->vestiaire = $vestiaire;

        return $this;
    }

    /**
     * Get the value of statut
     */
    public function getStatut() {
        return $this->statut;
    }

    /**
     * Set the value of statut
     *
     * @return  self
     */
    public function setStatut($statut) {
        $this->statut = $statut;

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

<?php

class Seance {

    // Attributs
    protected $idSeance;
    protected $idSejour;
    protected $idSoin;
    protected $dateSeance;
    protected $heureSeance;
    protected $statutSeance;

    // Constructeur
    public function __construct(?int $idSeance, int $idSejour, int $idSoin, string $dateSeance, string $heureSeance, string $statutSeance) {
        $this->idSeance = $idSeance;
        $this->idSejour = $idSejour;
        $this->idSoin = $idSoin;
        $this->dateSeance = $dateSeance;
        $this->heureSeance = $heureSeance;
        $this->statutSeance = $statutSeance;
    }


    // Getter & Setter


    /**
     * Get the value of idSeance
     */
    public function getIdSeance() {
        return $this->idSeance;
    }

    /**
     * Get the value of idSejour
     */
    public function getIdSejour() {
        return $this->idSejour;
    }

    /**
     * Set the value of idSejour
     *
     * @return  self
     */
    public function setIdSejour($idSejour) {
        $this->idSejour = $idSejour;

        return $this;
    }

    /**
     * Get the value of idSoin
     */
    public function getIdSoin() {
        return $this->idSoin;
    }

    /**
     * Set the value of idSoin
     *
     * @return  self
     */
    public function setIdSoin($idSoin) {
        $this->idSoin = $idSoin;

        return $this;
    }

    /**
     * Get the value of dateSeance
     */
    public function getDateSeance() {
        return $this->dateSeance;
    }

    /**
     * Set the value of dateSeance
     *
     * @return  self
     */
    public function setDateSeance($dateSeance) {
        $this->dateSeance = $dateSeance;

        return $this;
    }

    /**
     * Get the value of heureSeance
     */
    public function getHeureSeance() {
        return $this->heureSeance;
    }

    /**
     * Set the value of heureSeance
     *
     * @return  self
     */
    public function setHeureSeance($heureSeance) {
        $this->heureSeance = $heureSeance;

        return $this;
    }

    /**
     * Get the value of statutSeance
     */
    public function getStatutSeance() {
        return $this->statutSeance;
    }

    /**
     * Set the value of statutSeance
     *
     * @return  self
     */
    public function setStatutSeance($statutSeance) {
        $this->statutSeance = $statutSeance;

        return $this;
    }
}

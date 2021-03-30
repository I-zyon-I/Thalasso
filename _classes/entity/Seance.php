<?php

class Seance {

    // Attributs
    protected $idSoin;
    protected $idSejour;
    protected $statut;

    // Constructeur
    public function __construct(string $statut) {
        $this->statut = $statut;
    }


    // Getter & Setter

    /**
     * Get the value of idSoin
     */
    public function getIdSoin() {
        return $this->idSoin;
    }

    /**
     * Get the value of idSejour
     */
    public function getIdSejour() {
        return $this->idSejour;
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
}

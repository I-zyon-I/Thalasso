<?php

class Soin {

    // Attributs
    protected $idSoin;
    protected $nomSoin;
    protected $dureeSoin;
    protected $idEspace;

    // Constructeur
    public function __construct(string $nomSoin, int $dureeSoin) {
        $this->nomSoin = $nomSoin;
        $this->dureeSoin = $dureeSoin;
    }


    // Getter & Setter

    /**
     * Get the value of idSoin
     */
    public function getIdSoin() {
        return $this->idSoin;
    }

    /**
     * Get the value of nomSoin
     */
    public function getNomSoin() {
        return $this->nomSoin;
    }

    /**
     * Set the value of nomSoin
     *
     * @return  self
     */
    public function setNomSoin($nomSoin) {
        $this->nomSoin = $nomSoin;

        return $this;
    }

    /**
     * Get the value of dureeSoin
     */
    public function getDureeSoin() {
        return $this->dureeSoin;
    }

    /**
     * Set the value of dureeSoin
     *
     * @return  self
     */
    public function setDureeSoin($dureeSoin) {
        $this->dureeSoin = $dureeSoin;

        return $this;
    }

    /**
     * Get the value of idEspace
     */
    public function getIdEspace() {
        return $this->idEspace;
    }
}

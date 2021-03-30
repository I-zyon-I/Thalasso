<?php

class Client {

    // Attributs
    protected $idClient;
    protected $nomClient;
    protected $prenomClient;

    // Constructeur
    public function __construct(string $nomClient, string $prenomClient) {
        $this->nomClient = $nomClient;
        $this->prenomClient = $prenomClient;
    }


    // Getter & Setter

    /**
     * Get the value of idClient
     */
    public function getIdClient() {
        return $this->idClient;
    }

    /**
     * Get the value of nomClient
     */
    public function getNomClient() {
        return $this->nomClient;
    }

    /**
     * Set the value of nomClient
     *
     * @return  self
     */
    public function setNomClient($nomClient) {
        $this->nomClient = $nomClient;

        return $this;
    }
    /**
     * Get the value of nomClient
     */
    public function getPrenomClient() {
        return $this->prenomClient;
    }

    /**
     * Set the value of nomClient
     *
     * @return  self
     */
    public function setPrenomClient($prenomClient) {
        $this->prenomClient = $prenomClient;

        return $this;
    }
}

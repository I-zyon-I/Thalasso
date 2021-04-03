<?php

class Client {

    // Attributs
    protected $idClient;
    protected $nomClient;
    protected $prenomClient;
    protected $naissanceClient;
    protected $mailClient;

    // Constructeur
    public function __construct(?int $idClient, string $nomClient, string $prenomClient, string $naissanceClient, string $mailClient) {
        $this->idClient = $idClient;
        $this->nomClient = $nomClient;
        $this->prenomClient = $prenomClient;
        $this->naissanceClient = $naissanceClient;
        $this->mailClient = $mailClient;
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

    /**
     * Get the value of naissanceClient
     */
    public function getNaissanceClient() {
        return $this->naissanceClient;
    }

    /**
     * Set the value of naissanceClient
     *
     * @return  self
     */
    public function setNaissanceClient($naissanceClient) {
        $this->naissanceClient = $naissanceClient;
        return $this;
    }

    /**
     * Get the value of mailClient
     */
    public function getMailClient() {
        return $this->mailClient;
    }

    /**
     * Set the value of mailClient
     *
     * @return  self
     */
    public function setMailClient($mailClient) {
        $this->mailClient = $mailClient;
        return $this;
    }
}

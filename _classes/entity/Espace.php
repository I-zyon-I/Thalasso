<?php

class Espace {

    // Attributs
    protected $idEspace;
    protected $nomEspace;

    // Constructeur
    public function __construct(string $nomEspace) {
        $this->nomEspace = $nomEspace;
    }


    // Getter & Setter

    /**
     * Get the value of idEspace
     */ 
    public function getIdEspace()
    {
        return $this->idEspace;
    }

    /**
     * Get the value of nomEspace
     */ 
    public function getNomEspace()
    {
        return $this->nomEspace;
    }

    /**
     * Set the value of nomEspace
     *
     * @return  self
     */ 
    public function setNomEspace($nomEspace)
    {
        $this->nomEspace = $nomEspace;

        return $this;
    }
}
<?php

class Panier
{
    private $id;
    private $libelle;
    private $prix;
    private $qteproduit;


    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of libelle
     */ 
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Set the value of libelle
     *
     * @return  self
     */ 
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get the value of prix
     */ 
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set the value of prix
     *
     * @return  self
     */ 
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get the value of qteproduit
     */ 
    public function getQteproduit()
    {
        return $this->qteproduit;
    }

    /**
     * Set the value of qteproduit
     *
     * @return  self
     */ 
    public function setQteproduit($qteproduit)
    {
        $this->qteproduit = $qteproduit;

        return $this;
    }
}
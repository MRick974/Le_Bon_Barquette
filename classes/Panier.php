<?php
include_once("Plats.php");

class Panier
{
    private $produit;
    private $qteproduit;

   
   

    /**
     * Get the value of produit
     */ 
    public function getProduit()
    {
        return $this->produit;
    }

    /**
     * Set the value of produit
     *
     * @return  self
     */ 
    public function setProduit(Plats $produit)
    {
        $this->produit = $produit;

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
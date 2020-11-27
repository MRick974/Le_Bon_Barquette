<?php
 
class Panier
{
    private $id;
    private $qteproduit;
 
    public function __construct() {
        $_SESSION['panier'] = array();
    }
 
    public function afficher ()
    {
        echo 'Le caddie contient : <br />';
        foreach ($this->articles as $id => $qteproduit) {
            echo (
                $id .
                ' quantite :' .
                $qteproduit
            );
        }
    }
 
 
    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }


    /**
     * Get the value of qteproduit
     */ 
    public function getQteproduit()
    {
        return $this->qteproduit;
    }
    
    public function getNbArticles()
    {
        return count($_SESSION['panier']);
    }
 
    public function ajouter(Plats $id, $qteproduit) {
        $_SESSION['panier'][$id->getId()] += (int)$qteproduit;
    }

}
<?php

class User 
{
    private $id;
    private $nom;
    private $password;
    private $roles;

    public function getId()
    {
        return $this->id;
    }

  
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

  
    public function getNom()
    {
        return $this->nom;
    }

 
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

  
    public function getPassword()
    {
        return $this->password;
    }

   
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

   

    public function getRoles()
    {
        return $this->roles;
    }

   
    public function setRoles($roles)
    {
        $this->roles = $roles;

        return $this;
    }
}
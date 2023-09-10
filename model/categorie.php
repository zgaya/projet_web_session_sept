<?php

class categorie
{
    public $idCategorie;
    public $nomC;
    public $descriptionC;



    public function getidcategorie()
    {
        return $this->idCategorie;
    }

    public function getnom()
    {
        return $this->nomC;
    }
    public function getdescription()
    {
        return $this->descriptionC;
    }
  
    public function setnom($nom)
    {
        $this->nomC = $nom;
    }
    public function setdescription($description)
    {
        $this->descriptionC = $description;
    }
    public function __construct($id,$nom, $description)
    {   
     
        $this->idCategorie = $id;
        $this->nomC = $nom;
        $this->descriptionC = $description;

    }
}

<?php

class produit
{
    public $idProduit;
    public $idCategorie;
    public $nomP;
    public $prix;
    // public $image;
    public $descriptionP;
   
    public function getidcategorie()
    {
        return $this->idCategorie;
    }

    public function getidproduit()
    {
        return $this->idProduit;
    }

    public function getnom()
    {
        return $this->nomP;
    }
    public function getprix()
    {
        return $this->prix;
    }
    // public function getimage()
    // {
    //     return $this->image;
    // }
    public function getdescription()
    {
        return $this->descriptionP;
    }
    public function getUrlImage()
    {
        return $this->urlImage;
    }
    public function getNotifCreateur()
    {
        return $this->notifCreateur;
    }

    public function setnom($nom)
    {
        $this->nomP = $nom;
    }
    public function setprix($prix)
    {
        $this->prix = $prix;
    }
    public function setimage($image)
    {
        $this->image = $image;
    }
    public function setdescription($description)
    {
        $this->descriptionP = $description;
    }
    public function setcategorie($categorie)
    {
        $this->idCategorie = $categorie;
    }


    public function __construct($id,$idC,$nom, $prix, /*$image,*/ $description)
    {  $this->idProduit = $id;
        $this->idCategorie = $idC;
        $this->nomP = $nom;
        $this->prix = $prix;
        // $this->image = $image;
        $this->descriptionP = $description;

    }
}

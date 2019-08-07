<?php

class produitsModel
{
    private $pdo;
    public function __construct()
    {
        $this -> pdo = new PDO ('mysql:host=localhost;dbname=site', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,));
    }

    //----------------------------------
    // la mission de ce fichier produitsModel est d'interagir avec la table produit dans la BDD (REQUETE SQL)
    //recupérer tous les produits
    public function findAll()
    {
        $resultat = $this -> pdo -> query('SELECT * FROM produit');
        $produits = $resultat -> fetchAll();
        return $produits;
    }
    //recupérer un produit par l'id
    //recupérer tous les produits par la categorie
    // insert
    //update
    //delete

}
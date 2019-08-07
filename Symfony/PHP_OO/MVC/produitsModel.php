<?php
// MVC/produitsModel.php
// contient les données à afficher.

class produitsModel
{   
    private $pdo;

    public function __construct() {
        $this ->pdo = new PDO('mysql:host=localhost;dbname=site', 'root', '', array( PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, 
        ));
    }

    //---------------
    // La mission de ce fichier produitsModele est d'intéragir avec la table produits dans la BDD (REQUETE SQL)

    // Récupérer tous les produits 'SELECT *'
    public function findAll() { 
            $resultat = $this -> pdo -> query('SELECT * FROM produit');
            $produits = $resultat -> fetchAll();
            return $produits;
        }
        // récupérer toutes les catégories
    public function findcat(){
            $resultat = $this -> pdo -> query('SELECT DISTINCT (categorie) FROM produit');
            $categories = $resultat -> fetchAll();
            return $categories;
    }


    // Récupérer un produit par l'id
   public function find($id){
            $resultat = $this -> pdo -> query("SELECT * FROM produit WHERE id_produit = :id");
            $resultat = bindValue('id', $id, PDO::PARAM_INT);
            $resultat -> execute();
            $produit = $resultat -> fetch();
            return $produit;
   }
    // Récupérer tous les produits par la catégorie

    // Insert
    // Update
    // Delete

}

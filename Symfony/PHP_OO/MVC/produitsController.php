<?php
// lance les actions du site (contient la logique concernant les actions effectuées par l'utilisateur)
require('produitsModel.php');

class produitsController{

    private $model; // contient l'objet produitsModel;

    public function __construct() {
        $this ->model = new produitsModel;
    }

    // afficher tous les produits
    public function boutique(){
        // missions de la fonction : Afficher tous les produits

        // 1 : Récupérer tous les produits
        $produits = $this ->model ->findAll();
        // echo '<pre>'; print_r($produits); echo '<pre>';
        $categories = $this -> model -> findcat();
        // SELECT DISTINCT (categorie) FROM produit

        //test : http://localhost/Back/Symfony/PHP_OO/MVC/

        // 2 : Afficher les produits
        require('produits.php');
    }

    // afficher un seul produit
    public function affichage($id){

    }

    // afficher tous les produits d'une catégorie
    public function catégorie($categorie){

    }
    // ajouter un produit
    public function ajouterProduit($data){

    }
    // modifier un produit
    public function modifierProduit($id, $data){

    }
    // supprimer un produit
    public function supprimerProduit($id){

    }

}

<?php
require('produitsModel.php');
class produitsController
{
    private $model; // contient l'objet produitsModel
    public function __construct()
    {
        $this -> model = new produitsModel;
    }
    //Missions de la fonction: afficher les produits
    public function boutique()
    {
        $produits =  $this -> model-> findAll();
        echo '<pre>'; print_r($produits); echo'</pre>';
    }
    //afficher un seul produit
    public function affichage($id)
    {

    }
    //afficher tout les produits d'une categorie
    public function categorie($categorie)
    {

    }
    //ajouter un produit
    public function ajouterProduit($data)
    {

    }
    //modifier un produit
    public function modifierProduit($id, $data)
    {

    }
    //supprimer un produit
    public function supprimerProduit($id)
    {

    }
}
<?php
trait TPanier
{
    public $nbProduit = 1;
    public function affichageProduits()
    {
        return "Affichage des produits !! <hr>";
    } 
}
//---------------------------------------------------------
trait TMembre
{
    public function affichageMembre()
    {
        return " Affichage des membres !! <hr>";
    }
}
//----------------------------------------------------------
class Site
{
    USE TPanier, TMembre; //permet d'importer les traits directement dans la classe
}
//----------------------------------------------------------
// Exo : créer un objet issu de la classe 'Site' et afficher les méthodes issu de cette classe
//  Et faire les différents affichage des méthodes déclarées.
$s = new Site;
echo '<pre>'; print_r(get_class_methods($s)); echo '</pre>';

echo $s->affichageProduits();
echo $s->affichageMembre();
echo "Nombre de produit dans le panier : " . $s->nbProduit;

/*
    Les traits ont été inventés pour  repousser les limites de l'héritage, il est possible pour une classe d'hériter de plusieurs traits en même temps.
    Un trait est un regroupement de méthodes et de propriétés pouvant être importé dans une classe.

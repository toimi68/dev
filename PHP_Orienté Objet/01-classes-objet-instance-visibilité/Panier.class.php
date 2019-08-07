<?php
// par convention, la première lettre de la class doit être en majuscule
class Panier
{
    public $nbProduits;  // on peut déclarer une propriété vide   
    public function ajouterArticle()
    {
        return "L'article à été ajouté !!";
    }
   protected function retirerArticle()
   {
       return "L'article à été retiré !!"; // 
   }
   private function affichageArticle() // 
   {
       return "Voici les articles !!";
   }
//    public function test()
//    {
//        return $this->retirerArticle;
//    }
}

$panier1 = new Panier;
echo '<pre>'; var_dump($panier1); echo '</pre>'; //on observe un objet issue de la classe 'Panier à l'identifiant '#1' (référence de l'objet), il peut y avoir plusieurs objets convserver en RAM,ils auront tous un identifiant différents.

echo '<pre>'; var_dump(get_class_methods($panier1)); echo '</pre>'; // permet d'observer uniquement les méthodes (fonctions) publiques issu de la classe

// Exo: affecter la valeur de '5' a la propriété public '$nbProduits'
$panier1->nbProduits = 5; // on affecte la valeur de 5 à la propriété (variable) $nbProduits
echo '<pre>'; print_r($panier1); echo '</pre>';

echo "Nombre de produit dans le panier : " . $panier1->nbProduits . '<hr>';
echo "Panier 1 > " . $panier1->ajouterArticle() . '<hr>'; // on pioche une méthode de la classe à travers l'objet, toujours des parenthèses car on fait appel à une méthode (fonction) / methode public OK

// echo "Panier 1 > " . $panier1->retirerArticle() . '<hr>'; //  /!\ erreur !! méthode protected !! l'élement est accessible uniquement dans la classe ou celà a été déclarée (class Mère) ainsi que dans les classes heritières

// echo "Panier 1 > " . $panier1->affichageArticle(). '<hr>'; // /!\ erreur !! méthode private !! l'élément est accessible uniquement dans la classe où celà a été déclarée.

// les niveaux de visiblité permettent de protéger des données, par exemplpe les données saisi d'un formulaire ne pourront pas être attribués à n'importe qu'elle propriété déclarée, elles passeront, par des méthodes qui permettront de contrôler ces données.

$panier2 = new Panier; // on créer un nouvel exemplaire / objet issu de la classe 'Panier'
echo '<pre>'; var_dump($panier2); echo '</pre>'; // on peut observer un ojbet issu de la classe 'Panier' à l'identifiant '#2'

// Exo : affecter 3 produits à la propriété $nbProduits et afficher le nombre de produit dans le panier
$panier2->nbProduits = 3; // on affecte la valeur de 3 à la propriété $nbProduits
echo "Nombre de produit dans le panier : " . $panier2->nbProduits . '<hr>'; // affichage

/* 
Niveau de visibilité
    - public : accessible de partout
    - protected : accessible dans la classe Mère et héritières
    - private : accesslbie uniquement dans la classe Mère

  'new' est un mot clé permettant d'éffectuer une instanctiation (crée un objet)
  Une classe peut produire plusieurs objets
  $panier 1 représente l'objet issu de la classe 'Panier'
  La classe est le plan de construction /$panier1 représente un exemplaire de la classe
  */




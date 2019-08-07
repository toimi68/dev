<?php
class Vehicule
{
    private static $marque = 'BMW';
    private $couleur = 'noir';

    //--------------------------------------------------
    public static function setMarque($marque)
    {
        self::$marque = $marque; // qd c static c tjs '::$'
    }
    public static function getMarque()
    {
        return self::$marque;
    }
    //--------------------------------------------------
    public function setCouleur($couleur) // on doit l'appeler pour changer la couleur
    {
        $this->couleur = $couleur;
    }
    public function getCouleur()
    {
        return $this->couleur;
    }

}
//------------------------------------------------------
// Exo : Créer un objet issu de la classe Vehicule et faites une phrase en affichant la couleur et la marque du véhicule

$vehicule1 = new Vehicule;

echo "Le véhicule 1 de marque <strong>" .Vehicule::getMarque(). "</strong> et de couleur <strong> " . $vehicule1->getCouleur() . "<strong>.<hr>";

// Exo : créer un autre véhicule et changer la couleur par 'violet'

$vehicule2 = new Vehicule;
$vehicule2->setCouleur('Violet');

echo "Le véhicule 2 de marque <strong>" .Vehicule::getMarque(). "</strong> et de couleur <strong> " . $vehicule2->getCouleur() . "<strong>.<hr>";

// Exo : créer un véhicule 3 et faites une phrases en affichant la couleur et la marque du véhicule

$vehicule3 = new Vehicule;

echo "Le véhicule 3 de marque <strong>" .Vehicule::getMarque(). "<strong> et de couleur <strong>" . $vehicule3->getCouleur() . "<strong>.<hr>";

// Exo : modifier la marque par 'Mercedes'puis créer un véhicule 4 et faites une phrase pour afficher la couleur
Vehicule::setMarque('Mercedes');

$vehicule4 = new Vehicule;

echo "Le véhicule 4 de marque <strong>" . Vehicule::getMarque(). "<strong> et de couleur <strong>" . $vehicule4->getCouleur() . "<strong>.<hr>";

$vehicule5 = new Vehicule;

echo "Le véhicule 5 de marque <strong>" . Vehicule::getMarque(). "<strong> et de couleur <strong>" . $vehicule5->getCouleur() . "<strong>.<hr>";

/*
    Un élément déclaré comme 'static' appartient à la classe et non à l'objet
    Si je modifie un élément 'static', je modifie la classe elle-même
    objet-> élément d'un objet à l'extérieur de la classe
    $this -> élément d'un objet à l'intérieur de la classe
    class:: élément d'un objet à l'extérieur de la classe
    self:: élement de la classe à l'intérieur de la classe

*/
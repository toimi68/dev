<?php
class Maison
{
    private static $nbPiece = 7; // propriete appartient à la classe
    public static $espaceTerrain = '500m'; // propriété appartient à la classe
    public $couleur = 'blanc'; // proprièté appartient à l'objet
    const HAUTEUR = '10m'; // proprièté appartient à la classe
    private $nbPorte = 10; // méthode appartient à la classe : static
    public static function getNbPiece()
    {
        return self::$nbPiece; // on fait appel à la propriété qui est static avec 'self'
    }
    // methode qui appartient à l'objet
    public function getNbPorte()
    {
        return $this->nbPorte;
    }
    public function getEspaceTerrain()
    {
        return self::$espaceTerrain;
    }
    public function getHauteur()
    {
        return self::HAUTEUR;
    }

}
      
// 1 - Afficher le nombre de pièce de la maison
echo "Nombre de pièce de la maison : <strong>" . Maison::getNbPiece() . "</strong><hr>"; // lorsqu'une méthode est 'static",cela veut dire qu'elle apaprtient à la calsse et non à l'objet, donc on l'appelle via la classe

// 2- Afficher l'espace terrain de la maison
echo "Espace terrain de la maison : <strong>" . Maison::getEspaceTerrain() . "</strong><hr>";

// 3 - Afficher la hauteur de la maison
echo "Hauteur de la maison : <strong>" . Maison::getHAUTEUR() . "</strong><hr>"; //PDO::FETCH_ASSOC

// 4-Afficher la couleur de la maison
$maison = new Maison;


// 5 -Afficher le nombre de porte de la maison
echo "Nombre de porte de la maison : <strong>" . $maison->getNbPorte() . '</strong><hr>';

//----------------------------------------------------

echo $maison::$espaceTerrain . '<hr>'; // /!\ devrait donner une erreur, on ne doit pas appeler une propriété static, donc qui appartient à la classe,via l'objet

// echo $maison->espaceTerrain . '<hr>'; /!\ erreur !! Il n'est pas possible d'accéder ) une propriété static via l'objet

echo $maison->getNbPiece() . '<hr>'; // /!\ fonctionne mais pas logique !! Bonne écriture : Maison::getNbPiece()

// echo Maison::$couleur; /!\ erreur !! on ne doit pas appeler une propriété public par la classe
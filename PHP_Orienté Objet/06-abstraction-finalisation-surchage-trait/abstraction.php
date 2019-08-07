<?php
abstract class Joueur
{
    public function seConnecter()
    {
        return $this->EtreMajeur();
    }
    abstract public function EtreMajeur();
    abstract public function Devise();
}
//--------------------------------------------------------------
// $test = new Joueur; /!\ erreur !! une classe abstraite n'est pas instaciable
class JoueurFr extends Joueur
{
    public function EtreMajeur()
    {
        return 18;
    }
    public function Devise()
    {
        return '€';
    }
}
//----------------------------------------------------------------------------------------
// Exo : créer un objet joueurFr et afficher les méthodes
$joueurFr = new JoueurFr;
echo "Il faut avoir <strong>" .$joueurFr->EtreMajeur() . "</strong> ans pour avoir accès au site<hr>";
echo "la devise est : <strong>" .$joueurFr->Devise() . "</strong><hr>";

class JoueurUs extends Joueur
{
    public function EtreMajeur()
    {
      return 21;  
    }
    public function Devise()
    {
        return '$';
    } 
}


// Exo : créer une classe 'JoueurUs' et réaliser le traitement permettant d'afficher '21' pour la méthode 'EtreMajeur()' et afficher '$' pour la devise
$joueurUs = new JoueurUs;
echo "l'age pour avoir accès au site est de : <strong>" . $joueurUs->EtreMajeur() . "</strong> ans<hr>";
echo "la devise est : <strong>" . $joueurUs->Devise() . "</strong><hr>";


/*
    - Une classe abstraite n'est pas instanciable
     - Les méthodes abstraites n'ont pas de contenu
     - Lorsque l'on hérite de méthodes abstraites, nous sommes obligé de les redéfinir
     - Pour définir des méthodes abstraite, il est nécessaire que la classe qui les contiennent soit abstraite

     Le développeur qui écrit la classe 'Joueur' est au coeur de l'application (noyau) et va obliger les autres développeurs ) redéfinir les méthodes EtreMajeur() et Devise().
     C'est une bonne méthodologie de travail. On impose de bonne contraintes.
*/
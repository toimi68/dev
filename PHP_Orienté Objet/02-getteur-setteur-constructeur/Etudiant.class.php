<?php
class Etudiant
{
    private $prenom;    // Nassim
    public function __construct($arg)
    {                                 // Nassim
        echo "Instanciation, nous avons reçu l'information suivante: $arg<br>";
                            // Nassim
        return $this->setPrenom($arg);
    }
    // Exo : réaliser le getteur et le setteur pour la propriété $prenom
     public function setPrenom($prenom)
    {
        if(is_string($prenom))
        {
            $this->prenom = $prenom;
            //$homme->prenom = "Nassim";
        }
        else
        {
             return "La donnée doit être une chaine de caractère STRING!!";
           
        }
    }
    //---------------------------------------------
    public function getPrenom() // un getteur ne reçoit jamais d'argument
    {
        return $this->prenom;
    }
}
//----------------------------------------------------------------------------
$etudiant = new Etudiant('28');
// $bdd = new ¨PDO('coordonnées BDD')
echo '<pre>'; var_dump($etudiant); echo '</pre>';
echo "Votre prénom est : " . $etudiant->getPrenom() . '<hr>';

echo $etudiant->setPrenom(28); // on tombe dans le else/ Affichage du message d'erreur

$etudiant->__construct('Djamila'); // le constructeur peut tout de même être appelé comme une méthode classique

/*
__construct() est une méthode magique qui s'execute automatiquement lorsque l'on instancie la classe. Elle sera l'équivalent du init.php avec session_start(),connexion BDD,autoload etc...
- new Etudiant('Nassim') -> A l'instanciation de la classe, 'Nassim' va automatiquement se stocker en argument de la méthode magique __construct()

setteur : permet de contrôler les données
getteur : permet de voir / exploiter les données finales
private $prenom : la propriété est privé afin que l'on ne puisse pas la remplir de l'extérieur de la classe sans avoir fait des contrôles au préalable, c'est à dire sans être passé par les getteur / setteur

SI nous avons un formulaire avec vec 10 champs --> ,nous arons 10 setteurs et 10 getteurs 
*/
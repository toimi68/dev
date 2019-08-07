<?php
class Societe
{
    public $adresse;
    public $ville;
    public $cp;
                        // villes,Paris
    public function __set($nom, $valeur)
    {
        echo "La propriété <strong>$nom</strong> n'a pas été déclarée,la valeur <strong>$valeur</strong> n'a donc pas été affectée!!<hr>";
    }
    //__set() est une méthode magique qui se déclenche uniquement en cas de tentative d'affectation sur une propriété qui n'existe pas

    public function __get($nom)
    {
       echo "La propriété <strong>$nom</strong> n'a pas été déclarée,on ne peut donc pas l'afficher !!<hr>"; 
    }
    //__get() est une méthode magiques qui se déclenche dans le cas où l'on tente d'afficher une propriété qui n'a pas été déclarée
                          //sefzefzef, (1, 'test', true)
    public function __call($nom, $argument)
    {       
          //$argument : tableau ARRAY qui receptionne les arguments de la méthode executée
        //   echo '<pre>'; print_r($argument); echo '</pre>';
          echo "La méthode <strong>$nom</strong> n'a pas été déclarée,les arguments étaient <strong>" .implode("-", $argument) . "</strong> !!<hr>"; 
    }
    // __call() est une méthode magique qui s'éxécute automatiquement en cas de tentative d'execution d'une méthode qui m'a pas été déclarée
}
// on va instancier ma class
$societe = new Societe;

$societe->villes = "Paris"; // tentative d'affectation d'une propriété qui n'a pas été déclarée


echo $societe->titre; // tentative d'affichage d'une propriété qui n'a pas été déclarée

echo $societe->sefzefzef(1, 'test', true); // tentative d'execution d'une méthode qui n'existe pas

 echo '<pre>'; print_r($societe); echo '</pre>';

 /*
    Il y a trop d'erreur "sale' en PHP, les méthodes magiques permettent d'afficher des erreurs 'propres' en français
 */
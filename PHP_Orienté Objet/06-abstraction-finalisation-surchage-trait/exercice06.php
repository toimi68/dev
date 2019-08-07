<?php 
abstract class Vehicule
{
    // Réponse 2 : 
    final public function demarrer()
    {
        return "Je démarre<hr>";
    }
    // Réponse 3 :
    abstract public function carburant();
    public function nombreDeTestObligatoire()
    {
        return 100;
    }
}
//-----------------------------------------------------------
// Réponse 1 :
// $v = new Vehicule;
//-----------------------------------------------------------
class Peugeot extends Vehicule
{
    public function carburant()
    {
        return "Essence";
    }
    public function nombreDeTestObligatoire() // redéfinition + surcharge
    {
        $resultat = parent::nombreDeTestObligatoire();
        return $resultat + 70;
    }
}
//-----------------------------------------------------------
class Renault extends Vehicule
{
    public function carburant()
    {
        return "diesel";
    }
    public function nombreDeTestObligatoire() // redéfinition + surcharge
    {
        $resultat = parent::nombreDeTestObligatoire();
        return $resultat + 30;
    }
}
//-----------------------------------------------------------
/*
    1. Faire en sorte de ne pas avoir d'objet Vehicule
    2. Obligation pour la Renault et la peugeot de posséder la même méthode demarrer()
    3. Obligation pour la Renault de déclarer un carburant 'diesel' et pour la peugeot un carburant 'Essence'
    4. La Renault doit faire 30 tests de plus qu'un véhicule de base.
    5. La Peugeot doit faire 70 tests de plus qu'un véhicule de base.
    6. Effectuer les affichages nécessaires.
*/
$peugeot = new Peugeot;
echo $peugeot->demarrer();
echo "La peugeot consomme du carburant : " . $peugeot->carburant() . "<hr>";
echo "Nbre de test pour la peugeot : " . $peugeot->nombreDeTestObligatoire() . "<hr>";

$renault = new Renault;
echo $renault->demarrer();
echo "La renault consomme du carburant : " . $renault->carburant() . "<hr>";
echo "Nbre de test pour la renault : " . $renault->nombreDeTestObligatoire() . "<hr>";



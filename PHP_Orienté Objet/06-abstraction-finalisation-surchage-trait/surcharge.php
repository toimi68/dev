<?php
class A
{
    public function calcul()
    {
        return 10;
    }
}
//----------------------------------------------------------
class B extends A
{
     public function calcul() // redéfinition
    {
        $nb = parent::calcul(); // parent fonctionne pour appeler une méthode d'une classe parente lors d'une surcharge (override)
        // Une surcharge permet de prendre en compte le comportement de ma fonction d'origine et d'y ajouter un traitement complémentaire
        if($nb <= 100) return "$nb est inférieur à 100<hr>";
        else           return "$nb est supérieur à 100";
    }
}
//---------------------------------------------------------
// Pour la surcharge, si on faisait pas ça dans wordpress, on ne pourrais pas metre à jour les CMS, on modifierait directement les fonctions du  coeur.
// Exo : instancier la classe B et afficher le résultat de la condition
$babar = new B;
echo $babar->calcul();
 echo '<pre>'; print_r($babar); echo '</pre>';

<?php               //$liste, Mario
function recherche($tab, $elem)
{                // $liste
    if(!is_array($tab))
    {
        die('Vous devez envoyer un ARRAY');// si die() s'execute,tout les traitements suivants ne sortent pas
        // die() permet de gérer les erreurs et d'afficher des erreurs 'propres' en français

    }                       //'Mario', $liste
    $position = array_search($elem, $tab); // array_search() est une fonction prédéfinie qui permet de trouver la position d'un élément dans un tableau ARRAY, la fonction retourne l'indice auquel se trouve l'élément
    return $position;
}
//---------------------------------------------
$liste = array('Mario', 'Yoshi','Toad','Bowser');

echo "Position de <strong> 'Mario'</strong> dans le tableau ARRAY : <strong>" . recherche($liste, 'Mario') . '</strong><hr>';

echo "Position de <strong> 'Toad'</strong> dans le tableau ARRAY : <strong>" . recherche($liste, 'Toad') . '</strong><hr>';

echo "position de <strong> 'Yoshi'</strong> dans la table ARRAY : <strong>" . recherche($liste, 'Yoshi'). '<hr>';

echo "Position de <strong> 'Bowser'</strong> dans le tableau ARRAY : <strong>" . recherche('dfdjfngdfg', 'Bowser') . '</strong><hr>';// à ce moment la,die() s'execute,le script s'arrête et tout les traitements suivants ne sont pas executé
echo 'Traitements.....';// ne s'affiche pas puisque le die() est executée ci-dessus

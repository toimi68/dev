<?php
$perso = array("m" => "Mario", "1" => "Luigi", "t" => "Toad", "b" => "Bowser");

$it1 = new ArrayIterator($perso);
echo '<pre>'; var_dump($it1); echo '</pre>';
echo '<pre>'; print_r(get_class_methods($it1)); echo'</pre>';

$it1->rewind();
while($it1->valid())
{
    echo $it1->key() . ' - ' . $it1->current() . '<br>';
    $it1->next();
}

/*
    rewind() permet de se palcer au début du fichier/array/dossier
    valid() : permet de vérifier s'il y a des informtiojs
    key() : permet d'afficher l'indice
    current() : afficer 
    nex() : permet de passer à l'élément suivant (comparable à $i++, incrémentation)
*/

//-----------------------------------------------------------------------
$it2 = new SimpleXmlIterator('liste.xml', null, true);
echo '<pre>'; var_dump($it2); echo '</pre>';
echo '<pre>'; print_r(get_class_methods($it2)); echo '</pre>';

$it2->rewind();
while($it2->valid())
{
    echo $it2->key() . ' - ' . $it2->current() . '<br>';
    $it2->next();
}
// Itérator est ce qu'on appel un design pattern; qui permet de définir une solution pratique à un problème fréquent. 

// Exo : faire la même chose avec la classe DirectoryIterator(..) ,qui va recuperer la hierarchie du dossier ou on se trouve
$it3 = new DirectoryIterator('..');// ou ('C://')
echo '<pre>'; var_dump($it3); echo '</pre>';
echo '<pre>'; print_r(get_class_methods($it3)); echo '</pre>';

$it3->rewind();
while($it3->valid())
{
    echo $it3->key() . ' - ' . $it3->current() . '<br>';
    $it3->next();
}
// Dans les 3 cas, nous avons des données de type différentes,mais nous avons la même structure de code permettant de parcourir les données,les mêmes méthodes sont présentes dans les 3 classes différentes
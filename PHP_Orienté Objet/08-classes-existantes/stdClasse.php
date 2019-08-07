<?php
echo '<pre>';print_r(get_declared_classes());echo '</pre>';

$tab = array('Mario', 'Yoshi', 'Toad', 'Bowser');
$objet = (object) $tab; // cast: transformation 
echo '<pre>';var_dump($objet );echo '</pre>';// un objet fait parti de la classe STDCLASS (class standard de php) lorsque celui-ci est orphelin et n'a pas été instancier par un 'new', l'objet n'est issu d'aucune classe en particulier

// Exo : afficher 'Yoshi' en passant par l'objet StdClass '$objet'

echo $objet->{1} .'<hr>'; // permet d'afficher un élément de l'objet
// pour affichier plusieurs à la suite , ecrira a coté '-' . $objet->{2};

// la boucle foreach permet de parcourir les données d'un tableau ARRAY mais aussi d'un OBJET!! 
foreach($objet as $key => $value)
{
    echo "$key - $value<br>";
}
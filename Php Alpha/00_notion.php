<style>

    h2 {color: blue;}

</style>

<?php

//---------------------------------

echo '<h2>  --- Les balises PHP --- </h2>';

//---------------------------------

?>

<?php
// Pour ouvrir un passage en PHP, on utilise la balise précédente.
// Pour fermer un passage en PHP, on utilise la balise suivante.
// que du code php ou sqp qui peut entrer entre les chevrons
?>

<p>Bonjour</p> 
<!--En dehors des balises d'ouverture et de fermeture du PHP, nous pouvons écrire de HTML quand on est dans un fichier ayant l'extension .php -->
<?php

// Vous n'êtes pas obligé de fermer un passage en PHP en fin de script.

//---------------------------------

echo '<h2> --- Affichage --- </h2>';

//---------------------------------

echo 'Bonjour <br>'; // echo est une instruction qui permet d'afficher dans le navigateur. Toutes les instructions se termine par un point virgule. Dans un echo nous pouvons mettre aussi du HTML.

print 'Nous sommes mardi <br>';// print est une autre instruction d'affichage. Pas ou peu de difference avec echo.

 // Autres instruction d'affichage que nous verrons plus loin :

 //  => print_r();

 //  => var_dump();

 // Pour faire un commentaire sur une seule ligne.

 # autre syntaxe de commentaire sur une seule ligne.

 /*

    Pourfaire 

    un commentaire sur

    plusieurs lignes

 */

 //--------------------------------------------------------------------

echo '<h2> --- Variable / Déclaration / Affectation / Types --- </h2>';

//---------------------------------------------------------------------

// Définition : Une variable est un espace mémoire qui porte un nom et permettant de conserver une valeur. 

// En PHP on déclare une variable avec le signe $.

$a = 127; // affectation de la valeur 127 à ma variable $a.

echo gettype($a); // gettype() est une fonction prédéfinie qui indique le type d'une variable, ici il s'agit d'un integer (entier). 

echo '<br>';

$a = 'une chaine de caractère';

echo gettype($a); // affiche string.

echo '<br>';

$b = '127';

echo gettype($b); // affiche string car un nombre écrit entre quote est interprété comme un string.

echo '<br>';

$a = true;

echo gettype($a); // affiche boolean.

// Par convention un nom de variable commence ^par une lettre minuscule puis on met une majuscule à chaque mot. Il peut contenir des chiffres (jamais au début) ou un underscore (jamais au début car signification particulière en objet) ni à la fin.

//---------------------------------------

echo '<h2>  --- Concaténation --- </h2>';

//---------------------------------------

$x = ' Bonjour ';

$y = 'tout le monde';

echo $x . $y . '<br>'; // le point de concaténation peut être traduit par 'suivi de'.

// Remarque sur echo : 

echo $x, $y, '<br>'; //Dans l'instruction echo, on peut séparer les éléments affiché par une virgule. Cette syntaxe est spécifique au echo et ne marche pas avec print.

//-------

// Concaténation lors de l'affectation :

$prenom1 = 'Bruno';

$prenom1 = 'Claire';

echo $prenom1 . '<br>'; // Affiche Claire.

$prenom2 = 'Nicolas';

$prenom2 .= ' Marie'; // .= opérateur combiné, il prend la valeur précédente pour y ajouter une seconde valeur.

echo $prenom2 . '<br>'; // Affiche "Nicolas Marie" grâce à l'opérateur combiné. La valeur "Marie" vient se concaténé à la valeur "Nicola "sans la remplacer.

//----------------------------------------------

echo '<h2>  --- Guillemets et quotes --- </h2>';

//----------------------------------------------

$message = "Aujourd'hui";

// ou bien

$message = 'Aujourd\'hui'; // on échappe les apostrophe dans les quotes simple avec \ (alt gr + 8).

$txt = 'Bonjour';

echo "$txt tout le monde <br>";// Dans les guillemets, la variable est évalué : c'est sont contenu qui est affiché 'ici bonjour).

echo '$txt tout le monde <br>'; // Dans les quotes simple, la variable n'est pas évalué : elle est traité comme du texte brute (affiche $txt). 

echo $txt .'tout le monde <br>';

// on fait un formulaire en html,puis dans form method on rajouter "post" et ds action ecrire "liste.php" pour rajouter liste d'une autre page php.

//Si on souhaite intégrer ds la base de donée "haribo" ds le formulaire php,on fait:

//on se met au dessu de doctype on met le code php suivant": 
// <?php
 ?> 
<?php


$mdp = 'soleil';
echo $mdp . '<br>';

$mdp_crypte =md5 ($mdp);
echo $mdp_crypte . '<hr>';


$mdp = '123456';
echo $mdp . '<br>';

$mdp_crypte =md5 ($mdp);
echo $mdp_crypte . '<hr>';

//---------------------------------
// salt c'est l'idée de créer une chaine de caractère dont je suis le seul à connaitre
// la première façon est d'avoir une phrase clé (le developpeur est le seul à connaitre)
// deuxième étape: faire un salt aléatoire (ajouter ds le mdp un grain de sel afin d'avoir un paramètre impossible à crypter)
//



$mdp = '123456';
salt
echo $mdp . '<br>';
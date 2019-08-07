<?php

class Autoload
{
    public static function chargement($class){
    // une class c'est le plan de fabrication,et l'objet c'est la propriété
    require('Controller/' . $class . '.php');
    // require('Controller/User.php'); 
    }



}
//--------------------
spl_autoload_register(array('Autolad', 'chargement'));
// s'éxécute à chaque fois que le mot 'new' apparaît.
// Il va apporter en argument de notre fonction ce qui suit après le 'new'


/*
$a = new Autoload;
$a -> chargement(); fonction normal d'une class

Autoload::chargement('User'); c'est une fonction static, ici apportera la fonction 'user'

ex : new User:
        require('User.php');
*/
<?php


// sylvain : Inscription
namespace Membre;// les namespace sont toujours placés au tt début de code

use PDO;
// use Commentaire; pour prendre le code d'aziz
class User
 {
    private $pdo;

    public function setPdo(){
        $pdo = new PDO(); // on aurait pu utiliser new \PDO(); 
    }


 }

 // Aziz : Commentaire
 namespace Commentaire;
 class User
 {

 }

$user = new Membre\User;
$user = new Commentaire\User;

// Le namespace sont des tiroirs virtuel dans lequel on range nos class
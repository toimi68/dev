<?php

// user.php

class User{

    private $pseudo;
    private $prenom;
    private $email;
    protected $password;
    private $date_naissance;
    //...

    public function getPrenom(){
        return $this -> prenom;
    }

    public function setPrenom($prenom) {
        if(!empty($prenom)){
           if(strlen($prenom) >= 3 && strlen($prenom) <= 20) {
               $user-> prenom = $prenom;
            }
        }
    }
}
class Admin extends User
{
    public function setPassword($password) {
        $this -> password = $password;
    }
}

$user = new User;

// enregistrement du prénom
// vérification des données

$user -> setPrenom($_POST['prenom']);

echo 'prenom : ' .$user -> prenom;
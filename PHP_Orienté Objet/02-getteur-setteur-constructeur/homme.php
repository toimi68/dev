<?php
class Homme
{
    private $error;
    private $prenom;
    private $nom;
    public function setPrenom($prenom)
    {
        if(is_string($prenom))
        {
            $this->prenom = $prenom;

            //$homme->prenom = "Nassim";
        }
        else
        {
            $this->error = "ce n'est pas un string !!";
            return $this->error;
        }
    }
    //---------------------------------------------
    public function getPrenom() // un getteur ne reçoit jamais d'argument
    {
        return $this->prenom;
    }
    //---------------------------------------------

    public function setNom($nom)
    {
        if((iconv_strlen($nom) > 2) && (iconv_strlen($nom) <= 20 ))
        {
            $this->nom = $nom;
        }
        else
        {
            $this->error = "Veuillez saisir un nom entre 2 et 20 caractères !!";
            return $this->error;
        }
    }
    //---------------------------------------------

    public function getNom()// un getteur ne reçoit jamais d'argument

    {
        return $this->nom;
    }
    // par convention, on place toujours 'set' et 'get' davant le nom des méthodes    
}
$homme = new Homme;
echo '<pre>'; var_dump($homme); echo '</pre>';
// $homme->prenom = 'Emma'; /!\ erreur !! il n'est pas possible d'acceder et d'affecter une valeur à une propriete 'private', cela permet de ne pas entrer n'importe quoi dans les proprietés
$homme->setPrenom("Amara"); // OU $homme->setPrenom($_POST['prenom']); (exactement pareil 'on recupere le contenu du champs nom sais dand le formulaire)
 echo "Mon prénom est : " .$homme->getPrenom(). '<hr>';
// echo $homme->setPrenom(28); // un message d'erreur s'affiche : "ce n'est pas un string !!",

// un setteur permet de controler les données saisie d'un formulaire.

// un getteur permet de voir les données finales, c'est à dire les données qui ont été contrôlées, par exemple, on peut se servir des methodes getteurs pour enregistrer des données dans une BDD

echo $homme->setNom("Amara");
echo "Votre nom est :".$homme->getNom(). '<hr>';
echo $homme->setNom("E"). '<hr>';
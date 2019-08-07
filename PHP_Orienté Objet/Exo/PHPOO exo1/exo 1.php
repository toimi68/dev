<?php
class Etudiant
{
    //Variable :
    private $prenom;
    private $nom;
    private $email;
    private $telephone;

    //setter & getter $prenom:

    public function setPrenom($prenom)
    {
        if(iconv_strlen($prenom) > 3 && iconv_strlen($prenom)< 20 )
        {
            $this->prenom = $prenom;
        }
        else
        {
            $this->error ="Saisissez un prenom entre 3 et 20 caratères !";
            return $this->error;
        }
    }
    public function getPrenom()
    {
            return $this->prenom;
    }

    //-----------------------NOM------------------------
    public function setNom($nom)
    {
        if(iconv_strlen($nom) > 3 && iconv_strlen($nom)< 20 )
        {
            $this->nom = $nom;
        }
        else
        {
            $this->error ="Saisissez un prenom entre 3 et 20 caratères !";
            return $this->error;
        }
    }
    public function getNom()
    {
            return $this->nom;
    }


    //-----------------Email---------------------
public function setEmail($email)
    {
        // si le champs 'email' n'est pas (!) au bon format alors on entre dans les accolades du IF
             if(filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $this->email = $email;
        }
        else
        {
            $this->error ="Email non valide !!";
            return $this->error;
        }
    }
    public function getEmail()
    {
            return $this->email;
    }


    //-----------------TELEPHONE---------------------
public function setTelephone($telephone)
    {
        if(!preg_match('#^[0-9]{10}+$#', ($telephone)))
        {
            $this->telephone = $telephone;
        }
        else
        {
            $this->error ="Téléphone non valide, caractères non autorisés !!";
            return $this->error;
        }
    }
    public function getTelephone()
    {
            return $this->telephone;
    }
}
//---------------------------------------------------------------------


$etudiant1 = new Etudiant;
echo '<pre>';print_r($etudiant1);echo '</pre>';
    // affichage du prénom 
echo $etudiant1->setPrenom('Nassim');
echo "Mon prénom est : " .$etudiant1->getPrenom() .'<hr>';
    // affichage du nom
echo $etudiant1->setNom('Amara');
echo "Mon nom est : " .$etudiant1->getNom() .'<hr>';
    // affichage de l'email
echo $etudiant1->setEmail('nassim.amara@lepoles.com');
echo "Mon adresse mail est : " .$etudiant1->getEmail() .'<hr>';
    // affichage du telephone
echo $etudiant1->setTelephone('06-15-91-96-16');
echo "Mon numéro de telephone est : " .$etudiant1->getTelephone() .'<hr>';
 
// étudiant 2

$etudiant2 = new Etudiant;
echo '<pre>';print_r($etudiant2);echo '</pre>';
    // affichage du prénom2
echo $etudiant2->setPrenom('Djamila');
echo "Mon prénom est : " .$etudiant2->getPrenom() .'<hr>';
    // affichage du nom2
echo $etudiant2->setNom('Chabane');
echo "Mon nom est : " .$etudiant2->getNom() .'<hr>';
    // affichage de l'email2
echo $etudiant2->setEmail('djamila.chabane@lepoles.com');
echo "Mon adresse mail est : " .$etudiant2->getEmail() .'<hr>';
    // affichage du telephone2
echo $etudiant2->setTelephone('07-53-26-85-76');
echo "Mon numéro de telephone est : " .$etudiant2->getTelephone() .'<hr>';

// étudiant 3

$etudiant3 = new Etudiant;
echo '<pre>';print_r($etudiant3);echo '</pre>';
    // affichage du prénom2
echo $etudiant3->setPrenom('aziz');
echo "Mon prénom est : " .$etudiant3->getPrenom() .'<hr>';
    // affichage du nom2
echo $etudiant3->setNom('tobbal');
echo "Mon nom est : " .$etudiant3->getNom() .'<hr>';
    // affichage de l'email2
echo $etudiant3->setEmail('aziz.tobbal@lepoles.com');
echo "Mon adresse mail est : " .$etudiant3->getEmail() .'<hr>';
    // affichage du telephone2
echo $etudiant3->setTelephone('06-71-62-07-54');
echo "Mon numéro de telephone est : " .$etudiant3->getTelephone() .'<hr>';

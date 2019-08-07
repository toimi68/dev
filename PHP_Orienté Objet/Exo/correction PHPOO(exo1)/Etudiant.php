<?php
class Etudiant
{
    private $prenom;
    private $nom;
    private $email;
    private $telephone;

public function setPrenom($prenom)

    // traitement de sécurité de mon code
    // on aura une page qui va centralisé tt notre code,tt le processus va s'automatiser,on aura pas besoin de retaper le code à chaque fois(tt l'intérét de l'objet)
    {
        if(iconv_strlen($prenom) < 5 || iconv_strlen($prenom) > 30 ){
            $this->error = 'p>Le prenom doit contenir entre 5 et 30 caractères max !</p>';
            return $this->error;

        } else{
            $this->prenom = $prenom;
            return $this;
        }
    }
    public function getPrenom()
    {
        return $this->prenom;
    }
 //--------------------------------------NOM 
public function setNom($nom)
   {
        if(iconv_strlen($nom) < 5 || iconv_strlen($nom) > 30 ){
            // echo 'p>Le prenom doit contenir entre 5 et 30 caractères max !</p>';
            $this->error = 'p>Le prenom doit contenir entre 5 et 30 caractères max !</p>';
            return $this->error;

        } else{
            $this->nom = $nom;
            return $this;
        }
    }
    public function getNom()
    {
        return $this->nom;
    }
//--------------------------------------EMAIL

public function setEmail($email)
{
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) { // on commence par la condition fausse
            // echo 'p>Le prenom doit contenir entre 5 et 30 caractères max !</p>';
            $this->error = "p>Email n'\'est pas valide !</p>";
            return $this->error;

        } else{
            $this->email = $email;
            return $this;
        }
    }
    public function getEmail()
    {
        return $this->email;
    }

// ------------------------------TELEPHONE

public function setTelephone($telephone)

    {
        if(!preg_match('#^[0-9]{10}+$#', $telephone)) {

            $this->error = 'p>Saisissez un numéro de téléphone valide !</p>';
            return $this->error;
        } else{
            $this->telephone = $telephone;
            return $this;
        }
    }
    public function getTelephone()
    {
        return $this->telephone;
    }

//------------GET INFO
    public function getInfos()
    {
        $info['prenom'] = $this->getPrenom();
        $info['nom'] = $this->getNom();
        $info['email'] = $this->getEmail();
        $info['telephone'] = $this->getTelephone();

        return $info;

    }

}
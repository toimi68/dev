<?php
class Electricien
{
    public function getSpecialiste()
    {
        return "pose de cables, tableaux ou armoires électriques...<hr>";
    }
    public function getHoraires()
    {
        return "10h/ 18H <hr>";
    }
}
//-------------------------------------------------------------------------
class Plombier
{
    public function getSpecialiste()
    {
        return "tuyau, robinet, chauffe-eau, compteurs...<hr>";
    }
    public function getHoraires()
    {
        return "8h/ 19H <hr>";
    }
}
//-------------------------------------------------------------------------
class Entreprise
{                      // 1  
                       //2
    public $numero = 0; 
                        // Plombier 
                        // Electricien
    public function appelUnEmploye($employe)
    {
        $this->numero++; // on incremente 
        // $this->monEmploye1 = new Plombier 
        // $this->monEmploye2 = new Electricien

        $this->{"monEmploye" . $this->numero} = new $employe;// A chaque fois que l'on execute la méthode appelUnEmploye(), celà génère dans le même temps une propriété dans laquelle est stocké une instance d'une classe

        return $this->{"monEmploye" . $this->numero}; // on retourne l'objet généré
        // return $entreprise->monEmployé1;
        // return  $entreprise->monEmployé2;
    }
}
$entreprise = new Entreprise;
//-----------------------------------------------------------------------
$entreprise->appelUnEmploye('Plombier');
// Afficher les méthodes de la class 'Plombier' via l'objet issu de la classe 'Entreprise'

echo $entreprise->monEmploye1->getSpecialiste();
echo $entreprise->monEmploye1->getHoraires();

// echo '<strong>Autre méthode : </strong><hr>'; 

// echo $entreprise->appelUnEmploye('Plombier')->getSpecialiste();
// echo $entreprise->appelUnEmploye('Plombier')->getHoraires();

//-------------------------------------------------------------------------
$entreprise->appelUnEmploye('Electricien');
echo $entreprise->monEmploye2->getSpecialiste();
echo $entreprise->monEmploye2->getHoraires();


<?php
 // exemple sur le jeu GTA 'interface mouvement' est le contrôle pour gérer la manette 
 // l'interface est une norme,contrat 
interface Mouvement
{
    public function start();
    public function turnRight();
    public function turnLeft();
}


// Aurélia
class Avion extends Vehicule implements Mouvement // class Avion implements Mouvement
{
    public function demarrer(){
    }
    public function tourneDroite(){
    }
    public function tourneGauche(){
    }
}

// Iuliia
class Bateau extends Vehicule implements Mouvement // class Bateau implements Mouvement 
{
    public function start(){
    }
    public function turnRight(){
    }
    public function turnLeft(){
    }
}
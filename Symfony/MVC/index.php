
<?php 
// MVC/index.php


// www.boutique.com/index.php?controller=produits&action = boutique&id=165
// $a = new produitsController;
// $a ->boutique();

// www.boutique.com/index.php?controller=produits&action = affichage&id=165
// $a = new produitsController;
// $a ->affichage(165);

// www.boutique.com/index.php?controller=users&action = inscription
// $a = new usersController;
// $a ->inscription();

// //réécriture d'URL : 
// www.boutique.com/produits/affichage/165
// $a = new produitsController;
// $a ->affichage(165);

// //routing : 
// www.boutique.com/products/show/165
// $a = new produitsController;
// $a ->affichage(165);

require('produitsController.php');
// localhost/symfony/MVC/index.php 

$a = new produitsController;
$a->boutique();

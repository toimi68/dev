<?php

// procédural (hors MVC)
/*
www.maboutique.com/index.php
www.maboutique.com/boutique.php
www.maboutique.comfiche_produit.php?id=12
www.maboutique.com/inscription.php
*/

// En MVC (Model View Controller)

// www.maboutique.php/index.php?controller=produits&action=boutique
// $a = new produitsController;
// $a -> boutique();

// www.maboutique.php/index.php?controller=produits&action=affichage&id=165
// $a = new produitsController;
// $a -> affichage(165);

// www.maboutique.php/index.php?controller=user&action=inscrption
// $a = new usersController;
// $a -> inscription();

// réécriture d'URL
// www.maboutique.com/produits/affichage/165
// $a = new produitsController;
// $a -> affichage(165);

// inurl id=

// routing : (permet de décolorer l'url au code lui même)
 // va falloir changer le code
// $a = new productController;
// $a -> show(165); 

// il va falloir créer un fichier(liste de route) et dire à quoi correspondra tel fonction

require('produitsController.php');
// localhost/sympfony/PHP OO/MVC/index.php
$a = new produitsController;
$a -> boutique();

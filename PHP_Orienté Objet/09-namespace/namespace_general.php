<?php
namespace General; // correspondent à des dossiers physiques

require_once('namespace_commerce.php');

USE Commerce1, Commerce2, Commerce3;// permet de préciser quel namespace je souhaite importer du fichier namespace_commerce.php

echo __NAMESPACE__. '<hr>'; // constante magique qui permet d'afficher dans quel namespace on se trouve

$std = new \StdClass(); // sans le anti-slash --> erreur !! l'Interpreteur va chercher si la méthode StdClass() est déclarée dans le namespace 'General', donc pour revenir dans l'espace global de php le temps de ligne, nous devons mettre un anti-slash '\' devant la class
var_dump($std);

$commande = new Commerce1\Commande;
// $commande = new nom_du_namespace\nom_de_la_classe
echo "Nombre de commande : " . $commande->nbCommande . '<hr>';
// var_dump($commande);

// Exo: créer un objet de toute les classes déclarées et faire les affichages des propriétés
$produit = new Commerce2\Produit;
echo "Nombre de Produit : " . $produit->nbProduit . '<hr>';
// var_dump($produit);

$produit = new Commerce3\Produit;
echo "Nombre de Produit : " . $produit->nbProduit . '<hr>';
// var_dump($produit);

$panier = new Commerce3\Panier;
echo "Nombre de Produit dans le panier : " . $panier->nbProduit . '<hr>';
// var_dump($panier);
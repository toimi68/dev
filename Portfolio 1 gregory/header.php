<!DOCTYPE html>
<html <?php language_attributes(); // fonction wordpress qui retourne la langue du site ?>>
<head>
    <meta charset="<?php bloginfo('charset'); // fonction wordpress qui retourne le bon encodage ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/style.css"><!-- bloginfo('template_directory') fonction wordpress qui retourne l'URL du thème portfolio -->   

    <title><?php bloginfo('name'); ?></title>
    <?php wp_head(); // wp_head() charge des fichiers indispensables à wordpress (fichier js, css, etc...) et permet de récupérer la sidebar noire en haut de la page ?>
</head>
<body <?php body_class(); // appel à des classes de wordpress ?>>
    
<div class="container-fluid px-0">
    <div class="d-flex">
        <div class="col-md-4 bg-success hauteur">
            <?php dynamic_sidebar('Haut-gauche') ?>
        </div>
        <div class="col-md-4 bg-warning hauteur">
             <?php dynamic_sidebar('Haut-centre') ?>
        </div>
        <div class="col-md-4 bg-info hauteur">
             <?php dynamic_sidebar('Haut-droit') ?>
        </div>
    </div>

    <div class="col-md-12 px-0 bg-danger h-entetes">
        <?php dynamic_sidebar('entete') ?>
    </div>
</div>

<section class="ma-section">


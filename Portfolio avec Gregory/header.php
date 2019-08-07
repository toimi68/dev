<!DOCTYPE html>
<html <?php language_attributes(); // fonction wordpress qui retourne la langue du site  ?>>
<head>
    <meta charset="<?php bloginfo('charset'); // fonction wordpress qui retourne l'encodage  du site ?>"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    
    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Permanent+Marker" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Maiden+Orange" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Akronim|Henny+Penny|Maiden+Orange" rel="stylesheet"> 

    <!-- lien Bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/style.css"><!-- bloginfo('template_directory') fonction wordpress qu retourne l'URL du thème portfolio -->

    <title><?php bloginfo('name'); ?></title>
    <?php wp_head();// wp_head() permet de charger des fichiers indispensable à wordpress (fichier js, css,etc...) et permet de récuperer la sidebar noire en haut de la page ?>
</head>
<body <?php body_class(); // appel à des classes de wordpress  ?>>

<div class="container-fluid px-0">

    <div class="d-flex">
        <div class="col-md-3 pt-3 hauteur">
            <?php  dynamic_sidebar('Haut-gauche')  ?>

        </div>
        <div class="col-md-5 pt-3 hauteurr">
             <?php  dynamic_sidebar('Haut-centre')  ?>
        </div>
        <div class="col-md-4 pt-3 hauteur">
             <?php  dynamic_sidebar('Haut-droit')  ?>
        </div>
    </div>

<nav class="navbar navbar-expand-md navbar-dark bg-dark">
   
  <a class="navbar-brand" href="#"><?php bloginfo('name'); ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExample04">
    <ul class="navbar-nav mr-auto">

     <!-- wp_nav_menu() fonction wordpress qui permet d'importer le menu principal que l'on a créer dans le fichier functions.php container_class' => 'menu_header : le menu aura comme class 'menu-header'
    'theme_location' => 'primary' : permet de préciser que c'est le menu principal 
-->
    <?php wp_nav_menu(array('container_class' => 'menu_header','theme_location' => 'primary'))?>
    
    </ul>
    <form class="form-inline my-2 my-md-0">
      <input class="form-control" type="text" placeholder="Search">
    </form>
  </div>
</nav>





    <div class="col-md-12 px-0 h-entetes">
        <?php  dynamic_sidebar('entetes')  ?>
    </div>
</div>

<section class="ma-section">

    

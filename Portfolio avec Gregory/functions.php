<?php
add_action('widgets_init', 'portfolio_init_sidebar'); //On créer un 'hook' , c'est à dire qu'on accroche une fonction de wordpress pour pouvoir s'en servir
// widgets_init_sidebar -> fonction utilisateur que l'on va déclarer ci-dessous


add_action('init', 'portfolio_init_menu'); // permet de récupérer les fonctionnalités du menu wordpress dans le backOffice

// fonction permettant de créer des régions , on les retrouvent dans le backoffice de wordpress dans apparences ->widgets
function portfolio_init_sidebar()
{
    register_sidebar(array(
        'name' => __('Haut gauche', 'Portfolio'),
        'id'   => 'Haut-gauche',
        'description' => __('région en haut à gauche', 'Portfolio')
    ));
    // Exo : créer les différentes régions : haut-centre, haut-droit, entetes, bas-gauche, bas-centre, bas-droit
 register_sidebar(array(
        'name' => __('Haut centre', 'Portfolio'),
        'id'   => 'Haut-centre',
        'description' => __('région en haut centre', 'Portfolio')
    ));
    // register_sidebar () fonction wordpress qui permet de créer une région que l'on retrouve dans les widgets
 register_sidebar(array(
        'name' => __('Haut droit', 'Portfolio'),
        'id'   => 'Haut-droit',
        'description' => __('région en haut à droite', 'Portfolio')
    ));
 register_sidebar(array(
        'name' => __('entetes', 'Portfolio'),
        'id'   => 'entetes',
        'description' => __('région entetes', 'Portfolio')
    ));
 register_sidebar(array(
        'name' => __('Bas gauche', 'Portfolio'),
        'id'   => ' Bas-gauche',
        'description' => __('région en bas à gauche', 'Portfolio')
    ));
 register_sidebar(array(
        'name' => __('Bas centre', 'Portfolio'),
        'id'   => 'Bas-centre',
        'description' => __('région en bas au centre', 'Portfolio')
    ));
 register_sidebar(array(
        'name' => __('Bas droit', 'Portfolio'),
        'id'   => 'Bas-droit',
        'description' => __('région en bas à droite', 'Portfolio')
    ));

}
// Function qui permet de créer le menu principal du thème 'portfolio' que nous allons positionner dans le code
function portfolio_init_menu()
{
    register_nav_menu('primary', __('Primary Menu', 'Portfolio'));
}





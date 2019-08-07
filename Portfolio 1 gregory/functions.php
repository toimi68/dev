<?php 
add_action('widgets_init', 'portfolio_init_sidebar'); // on crée un 'hook', c'est à dire qu'on accroche une fonction de wordpress pour pouvoir s'en servir
// widgets_init -> fonction wordpress
// portfolio_init_sidebar -> fonction utilisateur que l'on va déclarer ci-dessous

// fonction permettant de créer des régions, on les retrouvent dans le backoffice de wordpress dans apparences->widgets
function portfolio_init_sidebar()
{
    register_sidebar(array(
        'name' => __('Haut gauche', 'Portfolio'),
        'id'   => 'Haut-gauche',
        'description' => __('Région en haut à gauche', 'Portfolio')
    ));

    // Exo : creér les différentes régions : haut-centre, haut-droit, entetes, bas-gauche, bas-centre, bas-droit
    register_sidebar(array(
        'name' => __('Haut centre', 'Portfolio'),
        'id'   => 'Haut-centre',
        'description' => __('Région en haut au centre', 'Portfolio')
    ));

    // register_sidebar() fonction wordpress qui permet de créer une région que l'on retrouve dans les widgets
    register_sidebar(array(
        'name' => __('Haut droit', 'Portfolio'),
        'id'   => 'Haut-droit',
        'description' => __('Région en haut à droite', 'Portfolio')
    ));

    register_sidebar(array(
        'name' => __('Entête', 'Portfolio'),
        'id'   => 'Entete',
        'description' => __('Région en entête', 'Portfolio')
    ));

    register_sidebar(array(
        'name' => __('Bas gauche', 'Portfolio'),
        'id'   => 'Bas-gauche',
        'description' => __('Région en bas à gauche', 'Portfolio')
    ));

    register_sidebar(array(
        'name' => __('Bas centre', 'Portfolio'),
        'id'   => 'Bas-centre',
        'description' => __('Région en bas au centre', 'Portfolio')
    ));

    register_sidebar(array(
        'name' => __('Bas droit', 'Portfolio'),
        'id'   => 'Bas-droit',
        'description' => __('Région en bas à droite', 'Portfolio')
    ));
}


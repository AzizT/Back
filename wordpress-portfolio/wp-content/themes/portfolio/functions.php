<?php
add_action('widgets_init', 'portfolio_init_sidebar');
// on crée un "hook", c' est a dire qu' on accroche une fonction de WP pour pouvoir s' en servir
// widgets_init est une focntion WP, alors que portfolio_init_sidebar est une fonction que je declare moi même pour pouvoir ensuite l' utiliser

add_action('init', 'portfolio_init_menu');
// "hook" qui va nous permettre de récupérer le menu wordpress dans le back-office

function portfolio_init_sidebar()
// fonction qui nouspermettra de créer des régions, on les retrouve dans le back-office de WP dans apparence => widgets
{
    register_sidebar(array(
        // register_sidebar permet de créer une région que l' on retrouvera ensuite dans les widgets

        'name'=> __('Haut gauche', 'Portfolio'),
        'id'  => 'Haut-gauche',
        'description' => __('region en haut a gauche', 'Portfolio')
    ));

    register_sidebar(array(

        'name' => __('Haut centre', 'Portfolio'),
        'id'  => 'Haut-centre',
        'description' => __('region en haut au centre', 'Portfolio')
    ));

    register_sidebar(array(

        'name' => __('Haut droite', 'Portfolio'),
        'id'  => 'Haut-droite',
        'description' => __('region en haut a droite', 'Portfolio')
    ));

    register_sidebar(array(

        'name' => __( 'entete', 'Portfolio'),
        'id'  => 'entete',
        'description' => __( 'region en haut entete', 'Portfolio')
    ));

    register_sidebar(array(

        'name' => __('Bas gauche', 'Portfolio'),
        'id'  => 'Bas-gauche',
        'description' => __('region en bas a gauche', 'Portfolio')
    ));

    register_sidebar(array(

        'name' => __('Bas centre', 'Portfolio'),
        'id'  => 'Bas-centre',
        'description' => __('region en bas au centre', 'Portfolio')
    ));

    register_sidebar(array(

        'name' => __('Bas droite', 'Portfolio'),
        'id'  => 'Bas-droite',
        'description' => __('region en bas a droite', 'Portfolio')
    ));
}

function portfolio_init_menu(){
    // fonction qui nous permet de creer le menu principal du theme 'portfolio' que nous allons positionner dans le code
    register_nav_menu('primary', __('Primary Menu', 'Portfolio'));
}
?>
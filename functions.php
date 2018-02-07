<?php

add_action('wp_enqueue_scripts','custom_style'); // j'ajoute une action supplémentaire à l'action WP prédéfinie.

function custom_style(){ // creation d'une fonction me permettant d'appeler les feuilles de style que je souhaite.

    
    wp_enqueue_style('parent-style',get_template_directory_uri() .'/style.css'); // selection de template wp (parent)
    wp_enqueue_style('child-style',get_stylesheet_directory_uri() .'/style.css'); // selection de ma propre feuille de style perso(enfant)

}

// Ajouter une zone de menu personnalisée
if ( function_exists('register_nav_menus') )
{
    register_nav_menus( array(
        'menufooter' => 'Menu du bas',
    ));
}
//Ajouter une zone de widgets
if ( function_exists('register_sidebar') )
{
    register_sidebar(array(
        'name' => 'Zone de widgets personelle',
        'id'   => 'sidebar-perso',
        'before-widget' => '<div class="embed-responsive embed-responsive-16by9">',
        'after-widget' => '</div>',
    ));
    // les deux dernières entrées sont valables si on est certain de ne mettre qu'une video 16/9 dans le widget
}

// Déclaration du répertoire ou seront stockés les fichiers de traduction du text-domain
add_action('after_setup_theme','busiprofchild_load_textdomain');
function busiprofchild_load_textdomain(){
    load_theme_textdomain('busiprofchild',get_stylesheet_directory().'/languages');
}

?>
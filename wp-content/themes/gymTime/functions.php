<?php 


// Menus de Navegación, para add más  usar el arreglo
function gym_menus(){

    register_nav_menus(array(
        'menu-principal' => __( 'Menu Principal Sobrino' , 'gymfitness'),
        'menu-footer' => __( 'Menu de Footer Sobrino' , ' gymfitnes')
        
        ));

}

add_action('init','gym_menus');

// Scripts y Styles

function gymFitness_scripts_styles(){

    wp_enqueue_style('normalize', get_template_directory_uri() . '/css/normalize.css' , array(), '8.0.1');

    wp_enqueue_style('slicknav', get_template_directory_uri() . '/css/slicknav.min.css' , array(), '1.0.0');

    wp_enqueue_style('googleFont',"https://fonts.googleapis.com/css?family=Open+Sans|Raleway:400,700,900|Staatliches&display=swap", array() ,'1.0.0');


    //La hora de estilos principal
    wp_enqueue_style('style', get_stylesheet_uri(), array('normalize','googleFont'), '1.0.0');
   
    wp_enqueue_style('jqueryUpdate',get_template_directory_uri(). '/js/jqueryUpdate.js', array() ,'3.4.1');

    wp_enqueue_script('slicknavJS', get_template_directory_uri() . '/js/jquery.slicknav.min.js', array('jqueryUpdate'), '1.0.0', true);

    wp_enqueue_script('scripts', get_template_directory_uri() . '/js/scripts.js', array('jqueryUpdate','slicknavJS'), '1.0.0', true);
    
}

add_action('wp_enqueue_scripts', 'gymFitness_scripts_styles');


?>
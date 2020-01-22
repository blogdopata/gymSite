


<?php 



/** Consukltas Reutilizables  */

require get_template_directory() . '/inc/queries.php' ;



/* Fin Consultas */
// Cuando el tema es activado 

function gymfitness_setup(){

    // Para habilitar imagenes destacadas
    add_theme_support('post-thumbnails');

    // Agrega Imagenes de tamaño Personalizado
    // usaar plugin Regenerate Thumbnails
    add_image_size('square', 350, 350, true);
    add_image_size('portrait', 350, 724, true);
    add_image_size('cajas', 400, 375, true);
    add_image_size('mediano', 700, 400, true);
    add_image_size('blog',966, 644, true);
    
}

add_action( 'after_setup_theme','gymfitness_setup' );


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
   
  
    wp_deregister_script('jquery');

    wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js', array(), null);
    
    
    wp_enqueue_script('slicknavJS', get_template_directory_uri() . '/js/jquery.slicknav.min.js', array('jquery'), null );

    wp_enqueue_script('scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery','slicknavJS'), null );
    
}

add_action('wp_enqueue_scripts', 'gymFitness_scripts_styles');


?>
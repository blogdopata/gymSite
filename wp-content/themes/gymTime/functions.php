

<?php 


/** Consukltas Reutilizables  */

require get_template_directory() . '/inc/queries.php' ;
require get_template_directory() . '/inc/shortcode.php' ;



/* Fin Consultas */
// Cuando el tema es activado 

function gymfitness_setup(){

    // Para habilitar imagenes destacadas
    add_theme_support('post-thumbnails');

    //TITULOS SEO

    
    add_theme_support('title-tag');

    // Agrega Imagenes de tamaño Personalizado
    // usaar plugin Regenerate Thumbnails
    add_image_size('square', 350, 350, true);
    add_image_size('portrait', 350, 724, true);
    add_image_size('cajas', 400, 375, true);
    add_image_size('mediano', 550, 300, true);
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


    if(is_page('galeria')):
         wp_enqueue_style('lightboxCSS', get_template_directory_uri() . '/css/lightbox.min.css' , array(), '2.11.0');
    endif;



    if(is_page('contacto')):
        wp_enqueue_style('leaftletCSS','https://unpkg.com/leaflet@1.6.0/dist/leaflet.css' , array(), '1.6.0');
   endif;

   
    //La hora de estilos principal
    wp_enqueue_style('style', get_stylesheet_uri(), array('normalize','googleFont'), '1.0.0');
   
  
    wp_deregister_script('jquery');

    wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js', array(), null);
    
    
    wp_enqueue_script('slicknavJS', get_template_directory_uri() . '/js/jquery.slicknav.min.js', array('jquery'), null );

    if(is_page('galeria')):
        wp_enqueue_script('lightboxJS', get_template_directory_uri() . '/js/lightbox.min.js', array('jquery'),'12.11.0', null );
    endif;


    
    if(is_page('contacto')):
        wp_enqueue_script('leatfelt','https://unpkg.com/leaflet@1.6.0/dist/leaflet.js', array('jquery'),'1.6.0', null );
    endif;
 

    wp_enqueue_script('scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery','slicknavJS'), null );
    

}

add_action('wp_enqueue_scripts', 'gymFitness_scripts_styles');



// Definir Zona d eWidgets

function gymfitness_widgets(){
    register_sidebar(array(
        'name' => 'Sidebar 1',
        'id' => 'sidebar_1',
        'before_widget' => '<div class="widget">',
        'after_widget'  => '</div>',
        'before_title' =>  '<h3 class="texto-primario text-center">',
        'after_title' => '</h3>'

    ));

    register_sidebar(array(
        'name' => 'Sidebar 2',
        'id' => 'sidebar_2',
        'before_widget' => '<div class="widget">',
        'after_widget'  => '</div>',
        'before_title' =>  '<h3 class="texto-primario text-center">',
        'after_title' => '</h3>'

    ));
}

add_action('widgets_init', 'gymfitness_widgets');


/** imagen hero **/

function gymfitness_hero_image(){

   
        // obtener ID d pagina principal
        $from_page_id = get_option('page_on_front');
        // Obtener ID imagen
        $id_imagen = get_field('image_hero', $from_page_id); 
        // Obtener la imagen
        $imagen = wp_get_attachment_image_src($id_imagen, 'full')[0];
    
        // Style CSS
        wp_register_style('custom', false);
        wp_enqueue_style('custom');

        $imagen_destacada_css = "
            body.home .site-header {
                background-image: linear-gradient( rgba(0,0,0,0.75), rgba(0,0,0,0.75)) , url($imagen) ;
            }
        ";
        wp_add_inline_style('custom', $imagen_destacada_css) ;
    
}
add_action( 'init', 'gymfitness_hero_image' );

?>
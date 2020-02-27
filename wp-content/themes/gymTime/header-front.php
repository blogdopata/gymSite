<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!--  <title>Document</title>-->
    <?php wp_head();?>
</head>
<body <?php body_class() ;?>>
    
<header class="site-header">
    <div class="contenedor header-grid">
        <div class="barra-navegacion">
            <div class="logo">
           
                <img src="<?php echo get_template_directory_uri(); ?>/img/logo.svg" alt="Logo site ">

            </div>
            
       

            <?php 
                $args = array(
                    'theme_location' => 'menu-principal',
                    'container' => 'nav',
                    'container_class' => 'menu-principal',
                    'menu_id' => 'LOL'

                );
                wp_nav_menu($args);
            ?>
                
      
        </div> <!-- Barrad navegacion -->

        <div class="tagline text-center">
           
            <h1><?php the_field('encabezado_hero') ; ?></h1>
            <p><?php the_field('contenido_hero') ; ?></p>
                
        </div>


    </div>
</header>

<hr>
<?php
/*
* Template Name: Template para Galerias
*/

get_header();

?>


<main class="contenedor pagina seccion ">
    <div class="contenido-principal">

        <?php  while( have_posts() ): the_post(); ?>

        <h1 class="text-center texto-primario">
            <?php the_title(); ?>
        </h1>

        
        <?php 
            // Obtener la galeria de la pagina actual
            $galeria = get_post_gallery(get_the_ID(), false);

             // Obtener los IDS    
            $galeria_imagenes_ID = explode(',',$galeria['ids']);

          //  echo "<pre>";
            //var_dump($galeria['ids']);
            //var_dump($galeria_imagenes_ID);
            //echo "</pre>"
        
        ;?>
        <ul class="galeria-imagenes">
                <?php 
                    $i = 1;
                    foreach($galeria_imagenes_ID as  $id):
                        $size = ($i == 4 || $i ==6 ) ? 'portrait' : 'square';
                        $imagenThumb = wp_get_attachment_image_src($id, $size)[0]  ;    
                        $imagen =  wp_get_attachment_image_src($id, 'full')[0]  ;
                            
                        // echo "<pre>";
                        // var_dump($imagenThumb[0]);
                        // echo "</pre>";
                    ?>

                    <li>
                        <a href="<?php echo $imagen; ?>" data-lightbox="galeria">
                            <img src="<?php echo $imagenThumb; ?>" alt="imagen">
                        </a>
                    </li>

 

                    <?php $i++; endforeach;?>



        </ul>


        <?php endwhile; ?>
    </div>
    



</main>




<?php get_footer();?>
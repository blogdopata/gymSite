<?php get_header() ;?>




</h2>
<main class="pagina seccion no-sidebars contenedor">

    <h2 class="text-center texto-primario">
        <?php $autor = get_queried_object() ;?>


            Autor: <?php echo $autor->data->display_name;?>

       <!--    <?php 
     echo "<pre>";
     var_dump($autor);
      echo "</pre>";

      ?> -->
            <p class="text-center">
                <?php  echo get_the_author_meta('description', $autor->data->ID) ; ?>
   
            </p>
 


        <?php  get_template_part('template-parts/loop','blog') ;?>
</main>





<?php get_footer() ;?>
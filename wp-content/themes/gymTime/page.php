<?php get_header();?>



<?php  while( have_posts() ): the_post(); ?>

<h1> <?php the_title(); ?></h1>


<?php 

// para agregar la imagen se puede enviar d parametros lo sgt:
// https://developer.wordpress.org/reference/functions/the_post_thumbnail/  
    if(has_post_thumbnail() ):
            the_post_thumbnail('blog');
            


    //else:
      //  echo 'No hay nada ';
    endif;   
    ?>


<?php the_content(); ?>





<!--    Escribo por : <//? php the_author() ;  ?>  
    <//?php  the_date(); ?>-->

<?php endwhile; ?>

<hr>


<h3> WTF</h3>



<?php get_footer();?>
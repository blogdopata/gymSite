<?php  while( have_posts() ): the_post(); ?>

<h1 class="text-center texto-primario"> 
   <?php the_title(); ?>
</h1>

<?php 
  // para agregar la imagen se puede enviar d parametros lo sgt:
  // https://developer.wordpress.org/reference/functions/the_post_thumbnail/  
      if(has_post_thumbnail() ):
              the_post_thumbnail('mediano', array('class' => 'imagen-destacada'));
              
      //else:
        //  echo 'No hay nada ';
      endif;   
?>

      <?php 
        if(get_post_type() === 'gymfitness_clases'){
                $hora_inicio =  get_field('hora_inicio');
                $hora_fin=  get_field('hora_fin');
      ?>


      <p class="informacion-clases"> <?php the_field('dias_clase') ;?> - <?php echo $hora_inicio . " a " . $hora_fin ;?> </p>
     
    <?php } ?>

<?php the_content(); ?>

    <!--    Escribo por : <//? php the_author() ;  ?>  
    <//?php  the_date(); ?>-->

<?php endwhile; ?>

<hr>
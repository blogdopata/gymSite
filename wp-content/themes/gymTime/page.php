
<?php echo 'Hola desde Page.php  (Seccion  paginas ) ' ?>

<br>
<br>

<?php get_header();?>



<?php  while( have_posts() ): the_post(); ?>   

    <h1> <?php the_title(); ?></h1>
    <?php the_content();?>
    Escribo por : <?php the_author() ;  ?> 
    <?php  the_date(); ?>

<?php endwhile; ?>



<?php get_footer();?>
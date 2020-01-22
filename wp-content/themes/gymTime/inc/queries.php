
<?php  
    
function gymfitnesss_lista_clases(){ ?>

    <ul class="lista-clases">

        <?php 
            $args = array(
                'post_type' => 'gymfitness_clases',
                 'posts_per_page' => 10,
                 'orderby' => 'title',
                 'order' => 'ASC'



            );
            $clases  = new WP_Query($args);
                while( $clases->have_posts()): $clases->the_post(); ?>
                    <li class="clase card">
                        <?php the_post_thumbnail('mediano') ;?>
                    </li>
                <?php endwhile; wp_reset_postdata(); ?>     
    </ul>



<?php  }?>
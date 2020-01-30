<?php 

/*
    Plugin Name:  Gym Fitneesss - Widgets
    Plugin URI:
    Description: Añade Widgets Personaliadas al sitio Gym Fitnness
    Version: 1.0.0
    Author: Victor Caballero :D
    Author URI: https://twitter.com/vict0rcaballero
    Text Domain: GymFitness

*/
if(!defined('ABSPATH')) die(); // Para q nadie pueda acccedeer  a este  codigo
 

/**
 * GymFitness_widget Class
 */
class GymFitness_widget extends WP_Widget {
    /** constructor */
    function GymFitness_widget() {
        parent::WP_Widget(false, $name = 'GymFitness_widget');	
    }

    /** @see WP_Widget::widget */
    function widget($args, $instance) {		
        extract( $args );
        $title = apply_filters('GymFitness Clases', $instance['title']);
        ?>
        <?php echo $before_widget; ?>

        <?php if ( $title )
                                echo $before_title . $title . $after_title;
                                
                                
                                
                                ?>

        <ul>
            <?php  $args= array(
                                'post_type' => 'gymfitness_clases',
                                'posts_per_page' => 3,
                               // 'orderby' => 'rand'
                                );
                                $clases= new WP_Query($args);
                                while($clases->have_posts()): $clases -> the_post();
                                ?>

            <li class="class-sidebar">
                <div class="imagen">
                    <?php the_post_thumbnail('thumbnail') ;?>
                </div>
                <div class="contenido-clase">
                    <a href="<?php the_permalink();  ?>">
                        <h3><?php the_title(); ;?></h3>
                    </a>

                    <?php 

                                        $hora_inicio =  get_field('hora_inicio');
                                        $hora_fin=  get_field('hora_fin');
                                    ?>


                    <p><?php the_field('dias_clase') ;?> - <?php echo $hora_inicio . " a " . $hora_fin ;?> </p>
                </div>
            </li>

            <?php endwhile; wp_reset_postdata();?>

        </ul>



<?php echo $after_widget; ?>
<?php
    }


    /** @see WP_Widget::update */ /* Contenido que se va a mmostrar en el panel de control */


    function update($new_instance, $old_instance) {				
	$instance = $old_instance;
	$instance['cantidad'] = strip_tags($new_instance['cantidad']);
        return $instance;
    }




    /** @see WP_Widget::form */
    public function form($instance) {	
        $cantidad = !empty($instance['cantidad']) ? $instance['cantidad'] : esc_html__('¿Cuantas clases debeas mostrar?' ,'gymfitness');  ?>
        <p> 
            <label for="<?php echo esc_attr( $this->get_field_id('cantidad') ) ?>">
                <?php esc_attr_e('¿Cuántas Clases deseas mostrar?', 'gymfitness') ;?>
            
            </label>
            <input type="number" 
            
                class="widefat"
                id="<?php echo esc_attr( $this->get_field_id('cantidad') ) ?>"
                name="<?php echo esc_attr( $this->get_field_id('cantidad') ) ?>"
                value="<?php echo esc_attr( $cantidad) ?>"
            >

        </p>

<?php 
    }

} // clase FooWidget



// registrar el widget FooWidget
add_action('widgets_init', create_function('', 'return register_widget("GymFitness_widget");'));




















;?>
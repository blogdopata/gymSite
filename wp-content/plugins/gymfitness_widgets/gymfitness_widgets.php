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
 * Adds GymFitness_Class_widget.
 */
class GymFitness_Class_widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'GymFitness', // Base ID
			esc_html__( 'GymFitness ClasesxD', 'text_domain' ), // Name
			array( 'description' => esc_html__( 'agrega clases en el widget', 'text_domain' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}
       
        //echo esc_html__( 'Hello, World!', 'text_domain' );
        ?>
        
        <ul>
        
             <?php 
                $args = array(
                    'post_type'  => 'gymfitness_clases',
                    'posts_per_page' =>  3,
                    //orderby' => rand,

                );

                $clases = new WP_Query($args);
                while($clases -> have_posts()): $clases->the_post();
     
             ?>

             <li class="clase-sidebar">
                <div>
                    <?php the_post_thumbnail('thumbnail') ;?>
                </div>
                <div class="contenido-clase">
                    <a href="<?php the_permalink() ?>">
                        <h3><?php the_title() ;?></h3>
                    </a>

                    <?php 

                    $hora_inicio =  get_field('hora_inicio');
                    $hora_fin=  get_field('hora_fin');
                    ?>


                    <p><?php the_field('dias_clase') ;?> - <?php echo $hora_inicio . " a " . $hora_fin ;?> </p>



                </div>

             </li>

             <?php endwhile; wp_reset_postdata(); ?>
        </ul>
        
        
        
        <?php 
        

		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {

        $cantidad = !empty($instance['cantidad'] ) ? $instance['cantidad'] : esc_html__('¿Cuantas Clases deseas mostrar?','gymfitness') ; ?>
        <p>

            <label for="<?php echo esc_attr( $this->get_field_id('cantidad') ) ?>" >
                    <?php  esc_attr_e('¿Cuantas Clases Deseas Mostrar zz?','gymfitness') ;?>
            
            </label>

            <input 
                class="widefat" 
                id="<?php echo esc_attr( $this->get_field_id('cantidad') ) ?>"
                name="<?php echo esc_attr( $this->get_field_id('cantidad') ) ?>"
                type="number" 
                value="<?php echo esc_attr('$cantidad') ?>"
            />
        
        </p>
        



		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';

		return $instance;
	}

} // class Foo_Widget



// registrar el widget FooWidget

function registrar_Gyfitenesss_widget() {
    register_widget( 'GymFitness_Class_widget' );
}
add_action( 'widgets_init', 'registrar_Gyfitenesss_widget' );




















;?>
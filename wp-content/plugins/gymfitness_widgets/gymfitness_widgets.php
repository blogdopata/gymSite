<?php 

/*
    Plugin Name:  Gym Fitneesss - Widgets
    Plugin URI:
    Description: Añade Widgets Personaliadas al sitio Gym Fitnness
    Version: 1.0.0
    Author: Victor Caballero
    Author URI: https://twitter.com/vict0rcaballero
    Text Domain: GymFitness

*/
if(!defined('ABSPATH')) die(); // Para q nadie pueda acccedeer  a este  codigo
 

/**
 * FooWidget Class
 */
class FooWidget extends WP_Widget {
    /** constructor */
    function FooWidget() {
        parent::WP_Widget(false, $name = 'FooWidget');	
    }

    /** @see WP_Widget::widget */
    function widget($args, $instance) {		
        extract( $args );
        $title = apply_filters('widget_title', $instance['title']);
        ?>
              <?php echo $before_widget; ?>
                  <?php if ( $title )
                        echo $before_title . $title . $after_title; ?>
                  Hello, World!
              <?php echo $after_widget; ?>
        <?php
    }

    /** @see WP_Widget::update */
    function update($new_instance, $old_instance) {				
	$instance = $old_instance;
	$instance['title'] = strip_tags($new_instance['title']);
        return $instance;
    }

    /** @see WP_Widget::form */
    function form($instance) {				
        $title = esc_attr($instance['title']);
        ?>
            <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
        <?php 
    }

} // clase FooWidget



// registrar el widget FooWidget
add_action('widgets_init', create_function('', 'return register_widget("FooWidget");'));




















;?>
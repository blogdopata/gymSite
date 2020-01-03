<?php 

function gym_menus(){

    register_nav_menus(array(
        'menu-principal' => __('Menu Principal', 'gymfitness'),
      


    ));

}

add_action('init','gym_menus');


?>
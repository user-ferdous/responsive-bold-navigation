<?php
/**
 * Plugin Name: Responsive Bold Navigation
 * Description: Add a cool and bold Responsive Menu in your WordPress site. 
 * Version: 1.0.0
 * Author: M. I. A. Ferdous 
 * Author URI: http://miaferdous.com
 * License: GPL2
 */

include( plugin_dir_path( __FILE__ ) . 'walker.php');



// register style on initialization
add_action( 'wp_enqueue_scripts', 'prefix_add_my_stylesheet' );

function prefix_add_my_stylesheet() {
    wp_register_style( 'rbn-style', plugins_url('styles.css', __FILE__) );
     wp_register_style( 'rbn-fa', plugins_url('inc/font-awesome/css/font-awesome.min.css', __FILE__) );
    wp_enqueue_style( 'rbn-style');
     wp_enqueue_style( 'rbn-fa');
}

function rbn_output() {
wp_nav_menu(array(
    'theme_location' => 'rbnmenu',
     'container' => false,
    'walker' => new RBN_Walker(),
    'items_wrap' => '<input type="checkbox" class="cd-nav-checkbox" autocomplete="off" data-menu-toggler id="js-offcanvas-navigation-toggler" />
<label for="js-offcanvas-navigation-toggler" class="cd-nav-trigger">
	Menu<span><!-- used to create the menu icon --></span>
</label><nav id="cd-nav" class="cd-nav-container">  <header>
    <label for="js-offcanvas-navigation-toggler" class="cd-close-nav">Close</label>
  </header> <ul class="cd-nav">%3$s</ul></nav>'
));
}
add_action('wp_footer', 'rbn_output');










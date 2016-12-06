<?php
   /*
   Plugin Name: Boot Plus
   Plugin URI: http://breonwilliams.com
   Description: adds shortcodes
   Version: 1.1
   Author: Breon Williams
   Author URI: http://breonwilliams.com
   License: GPL2
   */
$bootplus_shortcodes_path = dirname(__FILE__);
$bootplus_shortcodes_main_file = dirname(__FILE__).'/bootplus.php';
$bootplus_shortcodes_directory = plugin_dir_url($bootplus_shortcodes_main_file);
$bootplus_shortcodes_name = "Boot Plus";

/* Add shortcodes scripts file */
function bootplus_shortcodes_add_scripts() {
  global $bootplus_shortcodes_directory, $bootplus_shortcodes_path;
  if(!is_admin()) {
    
    /* Includes */
    include($bootplus_shortcodes_path.'/assets/functions.php');
      wp_enqueue_style('style-css', $bootplus_shortcodes_directory.'assets/css/style.css');
      wp_register_style( 'events-css', plugins_url( '/assets/css/recent-events.css', __FILE__ ), array(), '1.0.0', all );
      wp_register_style( 'lity-css', plugins_url( '/assets/css/lity.css', __FILE__ ), array(), '1.0.0', all );
      wp_register_style( 'bgvid-css', plugins_url( '/assets/css/background-vid.css', __FILE__ ), array(), '1.0.0', all );
      wp_register_style( 'slick-css', plugins_url( '/assets/css/slick.css', __FILE__ ), array(), '1.0.0', all );
      wp_register_style( 'slick-theme', plugins_url( '/assets/css/slick-theme.css', __FILE__ ), array(), '1.0.0', all );
      wp_register_style( 'masonry-css', plugins_url( '/assets/css/masonry/styles.css', __FILE__ ), array(), '1.0.0', all );
      wp_register_style( 'pmenu-style', plugins_url( '/assets/css/menu/style.css', __FILE__ ), array(), '1.0.0', all );
      wp_register_style( 'search-css', plugins_url( '/assets/css/search-overlay.css', __FILE__ ), array(), '1.0.0', all );
        }}
add_filter('init', 'bootplus_shortcodes_add_scripts');



function wpb_adding_scripts() {
  global $bootplus_shortcodes_directory, $bootplus_shortcodes_path;
    wp_register_script( 'lity-js', $bootplus_shortcodes_directory.'assets/js/lity.js', 'jquery','1.0',true);
    wp_register_script( 'bgvid', $bootplus_shortcodes_directory.'assets/js/jquery.background-video.js', 'jquery','1.0',true);
    wp_register_script( 'bgvid-js', $bootplus_shortcodes_directory.'assets/js/background-video.js', 'jquery','1.0',true);
    wp_register_script( 'slick-js', $bootplus_shortcodes_directory.'assets/js/slick.js', 'jquery','1.0',true);
    wp_register_script( 'slick-init', $bootplus_shortcodes_directory.'assets/js/slick-init.js', 'jquery','1.0',true);
    wp_register_script( 'parallax', $bootplus_shortcodes_directory.'assets/js/parallax.js', 'jquery','1.0',true);
    wp_register_script( 'modal', $bootplus_shortcodes_directory.'assets/js/modal.js', 'jquery','1.0',true);
    wp_register_script( 'masonry-min', $bootplus_shortcodes_directory.'assets/js/masonry/masonry.pkgd.min.js', 'jquery','1.0',true);
    wp_register_script( 'masonry-init', $bootplus_shortcodes_directory.'assets/js/masonry/masonry-init.js', 'jquery','1.0',true);
    wp_register_script( 'pmenu-main', $bootplus_shortcodes_directory.'assets/js/menu/main.js', 'jquery','1.0',true);
    wp_register_script( 'search-overlay', $bootplus_shortcodes_directory.'assets/js/search-overlay.js', 'jquery','1.0',true);
}

add_action( 'wp_enqueue_scripts', 'wpb_adding_scripts' ); 








   
// Add Formats Dropdown Menu To MCE
if ( ! function_exists( 'wpex_style_select' ) ) {
  function wpex_style_select( $buttons ) {
    array_push( $buttons, 'styleselect' );
    return $buttons;
  }
}
add_filter( 'mce_buttons', 'wpex_style_select' );



// Hooks your functions into the correct filters
function my_add_mce_button() {
  // check user permissions
  if ( !current_user_can( 'edit_posts' ) && !current_user_can( 'edit_pages' ) ) {
    return;
  }
  // check if WYSIWYG is enabled
  if ( 'true' == get_user_option( 'rich_editing' ) ) {
    add_filter( 'mce_external_plugins', 'my_add_tinymce_plugin' );
    add_filter( 'mce_buttons', 'my_register_mce_button' );
  }
}
add_action('admin_head', 'my_add_mce_button');

// Declare script for new button
function my_add_tinymce_plugin( $plugin_array ) {

    $plugin_array['my_mce_button'] = plugins_url( '/assets/js/mce-button.js', __FILE__ );

  return $plugin_array;
}

// Register new button in the editor
function my_register_mce_button( $buttons ) {
  array_push( $buttons, 'my_mce_button' );
  return $buttons;
}

include($bootplus_shortcodes_path.'/assets/custom-meta.php');
include($bootplus_shortcodes_path.'/assets/recent-events.php');
include($bootplus_shortcodes_path.'/assets/recent-posts.php');
include($bootplus_shortcodes_path.'/assets/thumbnails.php');
include($bootplus_shortcodes_path.'/assets/google-map.php');
include($bootplus_shortcodes_path.'/assets/menu-shortcode.php');



<?php
define('CHILD_THEME_DIR', get_stylesheet_directory());
define('CHILD_ADMIN_DIR', CHILD_THEME_DIR . '/admin');
define('CHILD_THEME_URI', get_stylesheet_directory_uri());

require_once CHILD_ADMIN_DIR.'/admin_initialize.php';

function my_theme_enqueue_styles()
{
    $parentStyle = 'parent-style'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.
    wp_enqueue_style( $parentStyle, get_template_directory_uri() . '/style.css' );
    wp_register_style( 'child-style',
      get_stylesheet_directory_uri() . '/style.css',
      array( $parentStyle ),
      wp_get_theme()->get('Version')
      );
    wp_enqueue_style('child-style');
    wp_register_style('ChildCustomizations',
      CHILD_THEME_URI.'/resources/css/custom.css',
      array('custom-css','bootstrap-css','theme-css',
        'responsive-css','winter-lato','tw-style','font-awesome','animate-css',
        'font-css','pretty-photo','typography-select')
      );
    wp_enqueue_style('ChildCustomizations');

  }
  function team_add_excerpt(){
    $args = get_post_type_object("team");
    $args->supports[] = "excerpt";
    register_post_type($args->name, $args);
  }
  add_action( 'init', 'team_add_excerpt' ,20);
  add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' ,11);






add_action( 'admin_menu', 'my_remove_meta_boxes' );
function my_remove_meta_boxes() {
  // if ( ! current_user_can( 'manage_options' ) ) {
    remove_meta_box('team_exInfo', 'service', 'side' );
  // }
}
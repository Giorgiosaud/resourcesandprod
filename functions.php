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






/**
 * Edit/remove meta boxes already registered by a parent theme / plugin
 * Priority 20 makes sure all meta boxes are already registered
 */
add_filter( 'rwmb_meta_boxes', 'prefix_edit_meta_boxes', 20 );
function prefix_edit_meta_boxes( $meta_boxes )
{
  // Loop throught all meta boxes to find the ones we need
  foreach ( $meta_boxes as $k => $meta_box )
  {
    // Remove "Personal Information" meta box
    if ( isset( $meta_box['id'] ) && 'service_icon_info' == $meta_box['id'] )
    {
      unset( $meta_boxes[$k] );
    }
    // Edit "Address Info" meta box
    // if ( isset( $meta_box['id'] ) && 'address' == $meta_box['id'] )
    // {
      // Change title to "Address"
      // $meta_boxes[$k]['title'] = 'Address';
      // Loop through all fields
      // foreach ( $meta_box['fields'] as $j => $field )
      // {
        // Add description for "Street" field
        // if ( 'your_prefix_street' == $field['id'] )
        // {
          // $meta_boxes[$k][$j]['desc'] = 'Enter street adress';
        // }
      // }
      // Add field "zip_code" to this meta box
      // $meta_boxes[$k]['fields'][] = array(
        // 'name' => 'Zip code',
        // 'id'   => 'zip_code',
        // 'type' => 'text',
      // );
    // }
  }
  // Return edited meta boxes
  return $meta_boxes;
}


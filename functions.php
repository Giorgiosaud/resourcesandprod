<?php
function my_theme_enqueue_styles()
{
    $parentStyle = 'parent-style'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.
    wp_enqueue_style( $parentStyle, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parentStyle ),
        wp_get_theme()->get('Version')
    );
    wp_enqueue_style('ChildCustomizations',
      get_stylesheet_directory_uri().'/resources/css/custom.css',
      array('custom-css','bootstrap-css','theme-css','color-preset')
    );
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

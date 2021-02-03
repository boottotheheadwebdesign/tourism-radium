<?php

// Useful for Custom Post Types to flush
//
// flush_rewrite_rules( false );


// Add Vendor scripts and custom CSS & JavaScript
function tourism_radium_scripts_styles() {  
  //wp_enqueue_script('slick', get_stylesheet_directory_uri().'/vendor/slick/slick.js', array('jquery'), 1.0, true);
  //wp_enqueue_script('tourism-radium', get_stylesheet_directory_uri().'/js/tourism-radium.js', array('jquery'), 1.0, true);   
  //wp_enqueue_style('slick', get_stylesheet_directory_uri() . '/vendor/slick/slick.css', '', 1.0, false);
  //wp_enqueue_style('slick-theme', get_stylesheet_directory_uri() . '/vendor/slick/slick-theme.css', '', 1.0, false);
  wp_enqueue_style('tourism-radium', get_stylesheet_directory_uri() . '/css/tourism-radium.css', '', 1.0, false); // false loads this as last CSS, need this *
}
add_action( 'wp_enqueue_scripts', 'tourism_radium_scripts_styles', 99);


// Hide Comments in Admin left navigation
add_action('admin_menu', function () {
    remove_menu_page('edit-comments.php');
});

// Add page slug as BODY class
function add_slug_body_class( $classes ) {
  global $post;
  if ( isset( $post ) ) {
    $classes[] = $post->post_type . '-' . $post->post_name;
  }
  return $classes;
}
add_filter( 'body_class', 'add_slug_body_class' );

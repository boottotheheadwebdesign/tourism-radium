<?php

// Add Vendor scripts and custom CSS & JavaScript
function tourism_radium_scripts_styles() {  
  wp_enqueue_script('slick', get_stylesheet_directory_uri().'/vendor/slick/slick.js', array('jquery'), 1.0, true);
  wp_enqueue_script('tourism-radium', get_stylesheet_directory_uri().'/js/tourism-radium.js', array('jquery'), 1.0, true);   
  wp_enqueue_style('slick', get_stylesheet_directory_uri() . '/vendor/slick/slick.css', '', 1.0, false);
  wp_enqueue_style('slick-theme', get_stylesheet_directory_uri() . '/vendor/slick/slick-theme.css', '', 1.0, false);
  wp_enqueue_style('tourism-radium', get_stylesheet_directory_uri() . '/css/tourism-radium.css', '', 1.0, false); // false loads this as last CSS, need this *
}
add_action( 'wp_enqueue_scripts', 'tourism_radium_scripts_styles', 99);


// Google map api key
function my_acf_google_map_api( $api ){
    $api['key'] = 'AIzaSyCSF2m2IH8GoUISFWodLVlpMscf87mnDnI';
    return $api;
}
add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');


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

// Useful for Custom Post Types to flush
flush_rewrite_rules( false );


/* Add Custom Post Types - Accomodations, Service Providers, Offers */

// ** Accomodations
function create_accomodation_post_type() {

  register_post_type( 'accommodation',
    array(
      'labels' => array(
        'name'               => _x( 'Accommodations', 'post type general name' ),
        'singular_name'      => _x( 'Accommodation', 'post type singular name' ),
        'add_new'            => _x( 'Add New', 'accommodation' ),
        'add_new_item'       => __( 'Add New Accommodation' ),
        'edit_item'          => __( 'Edit Accommodation' ),
        'new_item'           => __( 'New Accommodation' ),
        'all_items'          => __( 'All Accommodations' ),
        'view_item'          => __( 'View Accommodations' ),
        'search_items'       => __( 'Search Accommodations' ),
        'not_found'          => __( 'No accommodations found' ),
        'not_found_in_trash' => __( 'No accommodations found in the Trash' ), 
        //'parent_item_colon'  => __( 'Parent accommodation', 'accommodation' ),
        'menu_name'          => 'Accommodations',
        'can_export'          => true,       
      ),
      'public' => true,
      'has_archive' => true,
      'taxonomies' => array('category', 'post_tag'),
      'supports' => array('title','editor','thumbnail'),
      'show_in_rest' => true,
      'menu_icon' => 'dashicons-store',
      'menu_position' => 2,
      'rewrite' => ['slug' => 'accommodations'],
      //'taxonomies' => ['accommodation_type']
    )
  );
}
add_action( 'init', 'create_accomodation_post_type' );

// ** Promotions
function create_promotion_post_type() {

  register_post_type( 'promotion',
    array(
      'labels' => array(
        'name'               => _x( 'Promotions', 'post type general name' ),
        'singular_name'      => _x( 'Promotion', 'post type singular name' ),
        'add_new'            => _x( 'Add New', 'promotion' ),
        'add_new_item'       => __( 'Add New Promotion' ),
        'edit_item'          => __( 'Edit Promotion' ),
        'new_item'           => __( 'New Promotion' ),
        'all_items'          => __( 'All Promotions' ),
        'view_item'          => __( 'View Promotions' ),
        'search_items'       => __( 'Search Promotions' ),
        'not_found'          => __( 'No promotions found' ),
        'not_found_in_trash' => __( 'No promotions found in the Trash' ), 
        //'parent_item_colon'  => __( 'Parent accommodation', 'accommodation' ),
        'menu_name'          => 'Promotions',
        'can_export'          => true,       
      ),
      'public' => true,
      'has_archive' => true,
      'taxonomies' => array('category', 'post_tag'),
      'supports' => array('title','editor','thumbnail'),
      'show_in_rest' => true,
      'menu_icon' => 'dashicons-store',
      'menu_position' => 2,
      'rewrite' => ['slug' => 'promotions'],
      //'taxonomies' => ['accommodation_type']
    )
  );
}
add_action( 'init', 'create_promotion_post_type' );

// Register Blocks
add_action('acf/init', 'my_register_blocks');
function my_register_blocks() {

    // check function exists.
    if( function_exists('acf_register_block_type') ) {

        // Accommodation Block
        acf_register_block_type(array(
            'name'				=> 'accommodation',
            'title'				=> __( 'Accommodations'),
            'description'		=> __( 'A custom accommodation block.'),
            'render_template'   => 'template-parts/blocks/accommodation/block.php',
            'category'			=> 'formatting',
            'icon'				=> 'admin-comments',
            'keywords'			=> array( 'hotel', 'condo', 'accommodation', 'camping' )
        ));     
        
        // Promotion Block
        acf_register_block_type(array(
            'name'				=> 'promotion',
            'title'				=> __( 'Promotions'),
            'description'		=> __( 'A custom promotion block.'),
            'render_template'   => 'template-parts/blocks/promotion/block.php',
            'category'			=> 'formatting',
            'icon'				=> 'admin-comments',
            'keywords'			=> array( 'promo', 'offer' )
        ));           
    }
}
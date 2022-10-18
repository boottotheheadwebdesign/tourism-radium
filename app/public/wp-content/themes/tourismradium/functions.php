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

//estimated reading time
function reading_time() {
$content = get_post_field( 'post_content', $post->ID );
$word_count = str_word_count( strip_tags( $content ) );
$readingtime = ceil($word_count / 200);
if ($readingtime == 1) {
$timer = " Min";
} else {
$timer = " Min";
}
$totalreadingtime = $readingtime . $timer;
return $totalreadingtime;
}


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
      'supports' => array('title','editor','thumbnail', 'page-attributes'),
      'show_in_rest' => true,
      'menu_icon' => 'dashicons-store',
      'hierachical' => true,
      'menu_position' => 21,
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
      'supports' => array('title','editor','thumbnail', 'page-attributes'),
      'show_in_rest' => true,
      'menu_icon' => 'dashicons-awards',
      'menu_position' => 22,
      'hierachical' => true,
      'rewrite' => ['slug' => 'promotions'],
      //'taxonomies' => ['accommodation_type']
    )
  );
}
add_action( 'init', 'create_promotion_post_type' );

// ** Services
function create_service_post_type() {

  register_post_type( 'service',
    array(
      'labels' => array(
        'name'               => _x( 'Services', 'post type general name' ),
        'singular_name'      => _x( 'Service', 'post type singular name' ),
        'add_new'            => _x( 'Add New', 'service' ),
        'add_new_item'       => __( 'Add New Service' ),
        'edit_item'          => __( 'Edit Service' ),
        'new_item'           => __( 'New Service' ),
        'all_items'          => __( 'All Services' ),
        'view_item'          => __( 'View Services' ),
        'search_items'       => __( 'Search Services' ),
        'not_found'          => __( 'No services found' ),
        'not_found_in_trash' => __( 'No services found in the Trash' ), 
        'menu_name'          => 'Services',
        'can_export'          => true,       
      ),
      'public' => true,
      'has_archive' => true,
      'taxonomies' => array('category', 'post_tag'),
      'supports' => array('title','editor','thumbnail', 'page-attributes'),
      'show_in_rest' => true,
      'menu_icon' => 'dashicons-admin-multisite',
      'menu_position' => 23,
      'hierachical' => true,
      'rewrite' => ['slug' => 'services'],
      //'taxonomies' => ['accommodation_type']
    )
  );
}
add_action( 'init', 'create_service_post_type' );

// ** Events
function create_event_post_type() {

  register_post_type( 'event',
    array(
      'labels' => array(
        'name'               => _x( 'Events', 'post type general name' ),
        'singular_name'      => _x( 'Event', 'post type singular name' ),
        'add_new'            => _x( 'Add New', 'event' ),
        'add_new_item'       => __( 'Add New Event' ),
        'edit_item'          => __( 'Edit Event' ),
        'new_item'           => __( 'New Event' ),
        'all_items'          => __( 'All Events' ),
        'view_item'          => __( 'View Events' ),
        'search_items'       => __( 'Search Events' ),
        'not_found'          => __( 'No Events found' ),
        'not_found_in_trash' => __( 'No Events found in the Trash' ), 
        'menu_name'          => 'Events',
        'can_export'          => true,       
      ),
      'public' => true,
      'has_archive' => true,
      'taxonomies' => array('category', 'post_tag'),
      'supports' => array('title','editor','thumbnail', 'page-attributes'),
      'show_in_rest' => true,
      'menu_icon' => 'dashicons-megaphone',
      'menu_position' => 24,
      'hierachical' => true,
      'rewrite' => ['slug' => 'events']
    )
  );
}
add_action( 'init', 'create_event_post_type' );


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
            'category'			=> 'misc',
            'icon'				=> 'awards',
            'keywords'			=> array( 'promo', 'offer' )
        ));    
        
        // Service Block
        acf_register_block_type(array(
            'name'				=> 'service',
            'title'				=> __( 'Services'),
            'description'		=> __( 'A custom local service providers block.'),
            'render_template'   => 'template-parts/blocks/service/block.php',
            'category'			=> 'admin',
            'icon'				=> 'admin-multisite',
            'keywords'			=> array( 'service', 'local', 'dine', 'restaurant' )
        ));    
        
        // Featured Stories Block
        acf_register_block_type(array(
            'name'				=> 'featured-stories',
            'title'				=> __( 'Featured Stories'),
            'description'		=> __( 'A Featured Stories carousel block.'),
            'render_template'   => 'template-parts/blocks/stories/block.php',
            'category'			=> 'admin',
            'icon'				=> 'book',
            'keywords'			=> array( 'stories', 'news' )
        ));      
        
        // Feature Article
        acf_register_block_type(array(
            'name'				=> 'feature-article',
            'title'				=> __( 'Feature Article'),
            'description'		=> __( 'A Feature Article callout'),
            'render_template'   => 'template-parts/blocks/feature-article/block.php',
            'category'			=> 'admin',
            'icon'				=> 'book',
            'keywords'			=> array( 'article', 'feature' )
        ));    
        
        
        // Service Block
        acf_register_block_type(array(
            'name'				=> 'event',
            'title'				=> __( 'Events'),
            'description'		=> __( 'An upcoming events block.'),
            'render_template'   => 'template-parts/blocks/event/block.php',
            'category'			=> 'admin',
            'icon'				=> 'megaphone',
            'keywords'			=> array( 'event', 'seasonal' )
        ));           
    }
}

function custom_post_type_navigation() {

    the_posts_pagination(
      array(
        'before_page_number' => esc_html__( 'Page', 'twentytwentyone' ) . ' ',
        'mid_size'           => 0,
        'prev_text'          => sprintf(
          '%s <span class="nav-prev-text">%s</span>',
          is_rtl() ? twenty_twenty_one_get_icon_svg( 'ui', 'arrow_right' ) : twenty_twenty_one_get_icon_svg( 'ui', 'arrow_left' ),
          wp_kses(
            __( 'Previous <span class="nav-short"></span>', 'twentytwentyone' ),
            array(
              'span' => array(
                'class' => array(),
              ),
            )
          )
        ),
        'next_text'          => sprintf(
          '<span class="nav-next-text">%s</span> %s',
          wp_kses(
            __( 'Next <span class="nav-short"></span>', 'twentytwentyone' ),
            array(
              'span' => array(
                'class' => array(),
              ),
            )
          ),
          is_rtl() ? twenty_twenty_one_get_icon_svg( 'ui', 'arrow_left' ) : twenty_twenty_one_get_icon_svg( 'ui', 'arrow_right' )
        ),
      )
    );  
}
  

// Remove pagination on accommodation index page
function no_nopaging_accommodation_index($query) {
    if (is_post_type_archive('accommodation') && $query->is_main_query()) {
        $query->set('nopaging', 1);
        $query->set( 'posts_per_page', -1 );
    }
}
add_action('parse_query', 'no_nopaging_accommodation_index');

// Add settings page for each of the Events, Promotions, Services and Accommodations landing pages
// Feature Image, Headline, Subheading

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Landing Pages',
		'menu_title'	=> 'Landing Pages',
		'menu_slug' 	=> 'landing-page-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false,
    'icon_url'      => 'dashicons-screenoptions',
    'position'      => 20    
	));
	
}

add_action('wp_head', 'add_cpt_og_image');
function add_cpt_og_image(){
    if( is_post_type_archive( 'accommodation') ) {
      if( get_field('accommodations_page_banner', 'option') ):
        echo '<meta property="og:image" content="'.get_field('accommodations_page_banner', 'option').'" />';
      else:
          echo '<meta property="og:image" content="'.get_stylesheet_directory_uri().'/images/accommodations/banner-where-to-stay.jpg" />';
      endif;
      echo '<meta property="og:description" content="Radium is a place full of character and offers a variety of accommodations." />';
    }
    if( is_post_type_archive( 'event') ) {
      if( get_field('events_page_banner', 'option') ):
        echo '<meta property="og:image" content="'.get_field('events_page_banner', 'option').'" />';
      else:
          echo '<meta property="og:image" content="/wp-content/uploads/2022/03/banner-getting-around.jpg" />';
      endif;   
        echo '<meta property="og:description" content="Our event calendar is full of community and seasonal events in Radium and the Columbia Valley." />';
    }     
    if( is_post_type_archive( 'promotion') ) {
      if( get_field('accommodations_page_banner', 'option') ):
        echo '<meta property="og:image" content="'.get_field('promotions_page_banner', 'option').'" />';
      else:
          echo '<meta property="og:image" content="/wp-content/uploads/2022/03/banner-getting-around.jpg" />';
      endif;         
      echo '<meta property="og:description" content="Discover our nearby national parks, hit the trails or relax and rejuvenate at the spa. There’s no shortage of things to see and do in Radium." />';
    }
    if( is_post_type_archive( 'service') ) {
      if( get_field('services_page_banner', 'option') ):
        echo '<meta property="og:image" content="'.get_field('services_page_banner', 'option').'" />';
      else:
          echo '<meta property="og:image" content="'.get_stylesheet_directory_uri().'/images/accommodations/banner-where-to-stay.jpg" />';
      endif;
        echo '<meta property="og:description" content="Radium Hot Springs is a mountain village with great local amenities." />';
    }           
}

// function ag_yoast_seo_fb_share_images( $img ) {
// 	if( is_post_type_archive( 'accommodation') ) {
// 		$img = get_stylesheet_directory_uri().'/images/accommodations/banner-where-to-stay.jpg';
// 	}
// 	return $img;
// };
// add_filter( 'wpseo_opengraph_image', 'ag_yoast_seo_fb_share_images', 10, 1 );
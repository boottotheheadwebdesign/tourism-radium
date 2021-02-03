<?php
/**
 * Block Patterns
 *
 * @package twentig
 */

/**
 * Retrieves all block pattern categories.
 */
function twentig_get_registered_pattern_categories() {

	return array(
		array(
			'name'  => 'columns',
			'label' => _x( 'Columns', 'Block pattern category', 'twentig' ),
		),
		array(
			'name'  => 'columns-text',
			'label' => _x( 'Text Columns', 'Block pattern category', 'twentig' ),
		),
		array(
			'name'  => 'text-image',
			'label' => _x( 'Text & Image', 'Block pattern category', 'twentig' ),
		),
		array(
			'name'  => 'text',
			'label' => _x( 'Text', 'Block pattern category', 'twentig' ),
		),
		array(
			'name'  => 'hero',
			'label' => _x( 'Hero, Page Title Section', 'Block pattern category', 'twentig' ),
		),
		array(
			'name'  => 'cover',
			'label' => _x( 'Cover', 'Block pattern category', 'twentig' ),
		),
		array(
			'name'  => 'cta',
			/* translators: leave the acronym "CTA" in English if it's used in your language */
			'label' => _x( 'Call To Action (CTA)', 'Block pattern category', 'twentig' ),
		),
		array(
			'name'  => 'list',
			'label' => _x( 'List', 'Block pattern category', 'twentig' ),
		),
		array(
			'name'  => 'numbers',
			'label' => _x( 'Numbers, Stats', 'Block pattern category', 'twentig' ),
		),
		array(
			'name'  => 'gallery',
			'label' => _x( 'Gallery', 'Block pattern category', 'twentig' ),
		),
		array(
			'name'  => 'video-audio',
			'label' => _x( 'Video, Audio', 'Block pattern category', 'twentig' ),
		),
		array(
			'name'  => 'latest-posts',
			'label' => _x( 'Latest Posts', 'Block pattern category', 'twentig' ),
		),
		array(
			'name'  => 'contact',
			'label' => _x( 'Contact', 'Block pattern category', 'twentig' ),
		),
		array(
			'name'  => 'team',
			'label' => _x( 'Team', 'Block pattern category', 'twentig' ),
		),
		array(
			'name'  => 'testimonials',
			'label' => _x( 'Testimonials', 'Block pattern category', 'twentig' ),
		),
		array(
			'name'  => 'logos',
			'label' => _x( 'Logos, Clients', 'Block pattern category', 'twentig' ),
		),
		array(
			'name'  => 'pricing',
			'label' => _x( 'Pricing', 'Block pattern category', 'twentig' ),
		),
		array(
			'name'  => 'faq',
			'label' => _x( 'FAQ', 'Block pattern category', 'twentig' ),
		),
		array(
			'name'  => 'events',
			'label' => _x( 'Events, Schedule', 'Block pattern category', 'twentig' ),
		),
	);
}

/**
 * Retrieves all page categories.
 */
function twentig_get_registered_page_categories() {

	return array(
		array(
			'name'  => 'page-home',
			'label' => _x( 'Homepage', 'Block pattern category', 'twentig' ),
		),
		array(
			'name'  => 'page-about',
			'label' => _x( 'About', 'Block pattern category', 'twentig' ),
		),
		array(
			'name'  => 'page-services',
			'label' => _x( 'Services', 'Block pattern category', 'twentig' ),
		),
		array(
			'name'  => 'page-contact',
			'label' => _x( 'Contact', 'Block pattern category', 'twentig' ),
		),
	);
}

require_once TWENTIG_PATH . 'inc/class-twentig-block-patterns-registry.php';

/**
 * Registers block patterns.
 */
function twentig_register_patterns() {

	$path = TWENTIG_PATH . 'inc/patterns/twentytwentyone/';
	if ( 'twentytwenty' === get_template() ) {
		$path = TWENTIG_PATH . 'inc/patterns/twentytwenty/';
	}

	require_once $path . 'columns.php';
	require_once $path . 'columns-text.php';
	require_once $path . 'contact.php';
	require_once $path . 'text-image.php';
	require_once $path . 'cover.php';
	require_once $path . 'cta.php';
	require_once $path . 'events.php';
	require_once $path . 'columns-text.php';
	require_once $path . 'faq.php';
	require_once $path . 'gallery.php';
	require_once $path . 'hero.php';
	require_once $path . 'latest-posts.php';
	require_once $path . 'list.php';
	require_once $path . 'logos.php';
	require_once $path . 'numbers.php';
	require_once $path . 'pricing.php';
	require_once $path . 'team.php';
	require_once $path . 'testimonials.php';
	require_once $path . 'text.php';
	require_once $path . 'video-audio.php';
	require_once $path . 'pages.php';
}
add_action( 'init', 'twentig_register_patterns' );

/**
 * Retrieves the url of asset stored inside the plugin that can be used in block patterns.
 *
 * @param string $asset_name Asset name.
 */
function twentig_get_pattern_asset( $asset_name ) {
	return esc_url( TWENTIG_ASSETS_URI . '/images/patterns/' . $asset_name );
}

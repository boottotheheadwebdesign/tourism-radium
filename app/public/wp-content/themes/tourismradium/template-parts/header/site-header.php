<?php
/**
 * Displays the site header.
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

$wrapper_classes  = 'site-header';
$wrapper_classes .= has_custom_logo() ? ' has-logo' : '';
$wrapper_classes .= true === get_theme_mod( 'display_title_and_tagline', true ) ? ' has-title-and-tagline' : '';
$wrapper_classes .= has_nav_menu( 'primary' ) ? ' has-menu' : '';
?>

<div class="notification-bar">
	<div class="notification-bar-wrapper">
	<p><strong>WELCOME BACK TO RADIUM.</strong> Safety is the top priority of local businesses as we adjust to new procedures. <a href="#">Learn more ></a></p>
	<a class="close-notification" href="#">X</a>
</div>
</div>

<header id="masthead" class="<?php echo esc_attr( $wrapper_classes ); ?>" role="banner">

	<?php get_template_part( 'template-parts/header/site-branding' ); ?>
	<?php get_template_part( 'template-parts/header/site-nav' ); ?>

<div id="utility-nav">
	<?php
	wp_nav_menu(
		array(
			'menu'  => 'utility-menu',
			'menu_class'      => 'utility-menu-wrapper',
			'items_wrap'      => '<ul id="utility-menu-list" class="%2$s">%3$s</ul>',
			'fallback_cb'     => false,
		)
	);
	?>
	<!--ul class="header-actions">
		<li class="menu-search">
			<form role="search" method="get" class="search-form" action="http://tourism-radium.local/">
				<label for="search-form-1" class="screen-reader-text">Search…</label>
				<input type="search" autocomplete="off" id="search-form-1" placeholder="Search…" class="search-field" value="" name="s">
				<button type="submit" class="search-submit">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M1.5 11.4a8.323 8.323 0 008.25 8.25 7.86 7.86 0 005.4-2.1l5.1 4.35 1.5-1.65-5.1-4.5a7.937 7.937 0 001.35-4.5A8.323 8.323 0 009.75 3a8.355 8.355 0 00-8.25 8.4zm2.25-.15a6 6 0 116 6 6.018 6.018 0 01-6-6z"></path></svg>
				</button>
			</form>
		</li>
	</ul-->
</div>
</header><!-- #masthead -->


<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header();
?>
<section class="banner" style="background-image:url(/wp-content/themes/tourismradium/images/services/banner-getting-around.jpg)">
	<div class="banner__content">
		<h1>Services</h1>
		<p>Radium Hot Springs is a mountain village with great local amenities.</p>
	</div>
</section>

<?php
/* Start the Loop */
while ( have_posts() ) :
	the_post();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content">

		<?php if( get_field('service_name') ): ?>
			<h1><?php the_field('service_name'); ?></h1>
		<?php endif; ?>  
		
		<?php if( get_field('service_short_description') ): ?>
			<div class="short-description">
				<?php the_field('service_short_description'); ?>
			</div>	
		<?php endif; ?>  

		<ul class="contact-details">
			<?php if( get_field('service_address') ): ?>
				<li class="address"><?php the_field('service_address'); ?></li>
			<?php endif; ?>  	
			<?php if( get_field('service_phone') ): ?>
				<li class="phone"><?php the_field('service_phone'); ?></li>
			<?php endif; ?>  	
			<?php if( get_field('service_website') ): ?>
				<li class="website"><a href="<?php the_field('service_website'); ?>" target="_blank">Visit website</a></li>
			<?php endif; ?>  					
		</ul> 

		<section class="service-featured-photo">
	<?php
//Displays the featured image in a <img> tag resized to the 'large' thumbnail size (use this in a loop)
echo get_the_post_thumbnail( get_the_ID(), 'large' );
?>
		</section>
	
		<p class="center"><a class="btn yellow-blue" href="/services">All Services</a></p>

	</div><!-- .entry-content -->

	<!-- Extra page blocks here like Promotions and You might also like -->
	<?php the_content(); ?>
	
</article><!-- #post-<?php the_ID(); ?> -->

<?php
endwhile; // End of the loop.

get_footer();

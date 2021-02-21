
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
<section class="banner">
	<div class="banner__content">
		<h2>Where To Stay</h2>
		<p>Radium is a place full of character and offers a variety of accommodations.</p>
	</div>
</section>

<?php
/* Start the Loop */
while ( have_posts() ) :
	the_post();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content">

		<?php if( get_field('accommodation_name') ): ?>
			<h1><?php the_field('accommodation_name'); ?></h1>
		<?php endif; ?>  
		
		<?php if( get_field('accommodation_short_description') ): ?>
			<div class="short-description">
				<?php the_field('accommodation_short_description'); ?>
			</div>	
		<?php endif; ?>  

		<?php if( get_field('accommodation_address') ): ?>
			<p><?php the_field('accommodation_address'); ?></p>
		<?php endif; ?>  	
		<?php if( get_field('accommodation_phone') ): ?>
			<p><?php the_field('accommodation_phone'); ?></p>
		<?php endif; ?>  	
		<?php if( get_field('accommodation_website_url') ): ?>
			<p><a href="<?php the_field('accommodation_website_url'); ?>" target="_blank">Visit website</a></p>
		<?php endif; ?>  					

		<section class="accommodation-gallery">
		<?php 
		$images = get_field('accommodation_gallery');
		$size = 'full'; // (thumbnail, medium, large, full or custom size)
		if( $images ): ?>
			<div class="accommodation-gallery-slider">
				<?php foreach( $images as $image_id ): ?>
				<figure>
					<img src="<?php echo $image_id; ?>" alt=""/>
				</figure>
				<?php endforeach; ?>
			</div>
			<div class="accommodation-gallery-slider-nav">
				<?php foreach( $images as $image_id ): ?>
				<div>
					<img src="<?php echo $image_id; ?>" alt=""/>
				</div>
				<?php endforeach; ?>				
			</div>	
		<?php endif; ?>	
		</section>
		
		<?php if( get_field('accommodation_long_description') ): ?>
			<div class="long-description">
				<?php the_field('accommodation_long_description'); ?>
			</div>	
		<?php endif; ?>  		
		
		<?php 
		$terms = get_field('accommodation_amenities');
		if( $terms ): ?>
			<div class="amenities">
				<h3>Amenities</h3>
				<ul>
				<?php foreach( $terms as $term ): ?>
					<li><?php echo $term->name; ?></li>
				<?php endforeach; ?>
				</ul>
			</div>
		<?php endif; ?>		

		<?php if( get_field('accommodation_book_now_url') ): ?>
			<p class="center"><a class="btn" href="<?php the_field('accommodation_book_now_url'); ?>" target="_blank">Book Now</a></p>
		<?php endif; ?>  

	</div><!-- .entry-content -->

	<!-- Extra page blocks here like Promotions and You might also like -->
	<?php the_content(); ?>
	
</article><!-- #post-<?php the_ID(); ?> -->

<?php
endwhile; // End of the loop.

get_footer();

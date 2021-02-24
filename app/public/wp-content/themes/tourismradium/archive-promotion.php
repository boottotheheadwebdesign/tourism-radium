<?php
/**
 * The template for displaying Promotions & Offers
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header();
?>

<section class="banner" style="background-image:url(/wp-content/themes/tourismradium/images/services/banner-getting-around.jpg)">
	<div class="banner__content">
		<h1>Promotions</h1>
		<p>Discover our nearby national parks, hit the trails or relax and rejuvenate at the spa. There’s no shortage of things to see and do in Radium.</p>
	</div>
</section>

<section class="page-heading">
    <h1 class="heading-2">Lorem Ipsum</h1>
    <p class="intro-text">Spring and summer in Radium is a magical time for hiking, biking and birding. Unwind with a round of golf, enjoy a river float or white water rafting.</p>
</section>

<div class="current-promotions">
    
	<h2>All Current Promotions</h2>	

    <section class="page-grid">

        <div class="page-grid-results">

        <?php if ( have_posts() ) : ?>

			<?php while ( have_posts() ) : ?>

				<?php the_post(); ?>

				<div class="promotion-item">         
					<article class="card">
						<div class="thumbnail">
							<?php if( get_field('promotion_logo', get_the_ID()) ): ?>
								<img src="<?php the_field('promotion_logo', get_the_ID()); ?>" alt="<?php the_field('promotion_company', get_the_ID()); ?> logo">
							<?php else : ?>
								<img src="/wp-content/themes/tourismradium/images/services/logos/logo-fpo-wide.jpg" alt="FPO logo">
							<?php endif; ?>  
						</div>
						<div class="card-content">
						<?php if( get_field('promotion_title', get_the_ID()) ): ?>
							<p class="title"><?php the_field('promotion_title', get_the_ID()); ?></p>
						<?php endif; ?>   
						<?php if( get_field('promotion_subtitle', get_the_ID()) ): ?>
							<p class="subtitle"><?php the_field('promotion_subtitle', get_the_ID()); ?></p>
						<?php endif; ?> 
						<?php if( get_field('promotion_details', get_the_ID()) ): ?>
							<p class="details"><?php the_field('promotion_details', get_the_ID()); ?></p>
						<?php endif; ?> 
						<?php if( get_field('promotion_url', get_the_ID()) ): ?>
							<p class="promotion-url">
								<a class="lnk-book-now" href="<?php the_field('promotion_url', get_the_ID()); ?>" target="_blank">
									View Offer
								</a>                            
							</p>
						<?php endif; ?>                                                             
						</div>
					</article>
				</div> <!--/.promotion-item-->

			<?php endwhile; ?>

        <?php else : ?>
            <p class="page-grid__no-results">Sorry there are no promotions currently.</p>
        <?php endif; ?> 
            <?php wp_reset_postdata(); ?> 
        </div> <!--/.page-grid-results -->
        
        <!-- Pagination -->
        <?php twenty_twenty_one_the_posts_navigation(); ?>
    
    </section> <!--/.page-grid -->

<?php get_footer(); ?>

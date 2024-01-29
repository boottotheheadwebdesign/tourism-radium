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

// Get values for banner, headline and subheading from CMS if they exist
// Banner
if( get_field('promotions_page_banner', 'option') ):
	$banner = get_field('promotions_page_banner', 'option');
else:
    $banner = '/wp-content/themes/tourismradium/images/services/banner-getting-around.jpg';
endif; 

// Headline
if( get_field('promotions_page_headline', 'option') ):
	$headline = get_field('promotions_page_headline', 'option');
else:
    $headline = "Promotions";
endif;

// Subheadline
if( get_field('promotions_page_subheadline', 'option') ):
	$subheadline = get_field('promotions_page_subheadline', 'option');
else:
    $subheadline = "Discover our nearby national parks, hit the trails or relax and rejuvenate at the spa. There's no shortage of things to see and do in Radium.";
endif;
?>

<section class="banner" style="background-image:url(<?php echo $banner; ?>)">
	<div class="banner__content">
		<h1><?php echo $headline; ?></h1>
		<p><?php echo $subheadline; ?></p>
	</div>
</section>

<section class="page-heading">
    <h2 class="heading-2">Book Direct and Save</h1>
    <p class="intro-text">Find great packages and promotions in the Village of Radium, all year round. From savings great activities in the area, to special room rates, plan your next adventure in Radium Hot Springs.</p>
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
        <?php custom_post_type_navigation(); ?>
    
    </section> <!--/.page-grid -->

<?php get_footer(); ?>

<?php
/**
 * The template for displaying Events
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
if( get_field('events_page_banner', 'option') ):
	$banner = get_field('events_page_banner', 'option');
else:
    $banner = '/wp-content/themes/tourismradium/images/services/banner-getting-around.jpg';
endif; 

// Headline
if( get_field('events_page_headline', 'option') ):
	$headline = get_field('events_page_headline', 'option');
else:
    $headline = 'Events';
endif;

// Subheadline
if( get_field('events_page_subheadline', 'option') ):
	$subheadline = get_field('events_page_subheadline', 'option');
else:
    $subheadline = 'Our event calendar is full of community and seasonal events in Radium and the Columbia Valley.';
endif;
?>

<section class="banner" style="background-image:url(<?php echo $banner; ?>)">
	<div class="banner__content">
		<h1><?php echo $headline; ?></h1>
		<p><?php echo $subheadline; ?></p>
	</div>
</section>

<section class="page-heading">
    <h2 class="heading-2">What's Happening</h2>
    <p class="intro-text">Learn more about seasonal and community events.</p>
</section>

<div class="featured-events">
    
	<h2>Featured Events</h2>	

    <section class="page-grid">

        <div class="page-grid-results events-listing">

        <?php if ( have_posts() ) : ?>

			<?php while ( have_posts() ) : ?>

				<?php the_post(); ?>

            <div class="event-item">    
                <?php $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); ?>
                <article class="event">
                    <div class="event-bg" style="background-image:url('<?php echo $backgroundImg[0] ?>')">
                    <?php if( get_field('event_start_date') ): ?>
                        <div class="event-date"><?php the_field('event_start_date'); ?></div>
                    <?php endif; ?>
                    </div>
                    <div class="event-details"> 
                    
                    <?php if( get_field('event_name', get_the_ID()) ): ?>
                        <?php if( get_field('event_website_url', get_the_ID()) ): ?>
                            <h3><a href="<?php the_field('event_website_url', get_the_ID()); ?>" target="_blank"><?php the_field('event_name', get_the_ID()); ?></a></h3>
                        <?php else: ?> 
                            <h3><?php the_field('event_name', get_the_ID()); ?></h3>
                        <?php endif; ?> 
                    <?php endif; ?>                      

                    <?php if( get_field('event_short_description') ): ?>
                        <p><?php the_field('event_short_description'); ?></p>
                    <?php endif; ?>     
                    </div>
                </article>
            </div> <!--/.event-item-->

			<?php endwhile; ?>

        <?php else : ?>
            <p class="page-grid__no-results">Sorry there are no events currently.</p>
        <?php endif; ?> 
            <?php wp_reset_postdata(); ?> 
        </div> <!--/.page-grid-results -->
        
        <!-- Pagination -->
        <?php custom_post_type_navigation(); ?>
    
    </section> <!--/.page-grid -->
	
	<!-- Event Calendar -->
	<div class="event-calendar" style="padding-top:75px;">
		<h2>Event Calendar</h2>
		<div style="text-align:center; padding-bottom:25px;">
			<em>This events calendar is managed by &amp; provided courtesy of the <a href="https://www.cvchamber.ca/events-calendar/" target="_blank">Columbia Valley Chamber of Commerce</a>.</em>
		</div>
		<script src="https://calendar.time.ly/embed.js" data-src="https://calendar.time.ly/hu57y36c/month" data-max-height="0"  id="timely_script" class="timely-script"></script>
	</div>
	<!--/ Event Calendar -->

<?php get_footer(); ?>
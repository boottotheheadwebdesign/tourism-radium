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

$description = get_the_archive_description();
?>

<section class="banner">
	<div class="banner__content">
		<h1>Promotions</h1>
		<p>Discover our nearby national parks, hit the trails or relax and rejuvenate at the spa. There’s no shortage of things to see and do in Radium.</p>
	</div>
</section>


<?php if ( have_posts() ) : ?>

    <h2>Lorem Ipsum</h2>
    <p>Spring and summer in Radium is a magical time for hiking, biking and birding. Unwind with a round of golf, enjoy a river float or white water rafting.</p>

	<?php while ( have_posts() ) : ?>
		<?php the_post(); ?>
		<?php get_template_part( 'template-parts/content/content', get_theme_mod( 'display_excerpt_or_full_post', 'excerpt' ) ); ?>
	<?php endwhile; ?>

	<?php twenty_twenty_one_the_posts_navigation(); ?>

<?php else : ?>
	<?php get_template_part( 'template-parts/content/content-none' ); ?>
<?php endif; ?>

<?php get_footer(); ?>

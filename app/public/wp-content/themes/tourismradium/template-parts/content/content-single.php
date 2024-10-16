<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>

<header class="entry-header alignwide">
    <?php 
    $category = get_the_category();                    
    ?>   
    <span class="eyebrow"><?php echo $category[0]->cat_name ?></span>
    <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
    <!--div class="entry-header__excerpt">
        <?php the_excerpt(); ?>
    </div--> 
    <p class="entry-header__date">
        By Tourism Radium on <?php echo get_the_date(); ?>  
    </p>          
</header>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php twenty_twenty_one_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
		the_content();

		wp_link_pages(
			array(
				'before'   => '<nav class="page-links" aria-label="' . esc_attr__( 'Page', 'twentytwentyone' ) . '">',
				'after'    => '</nav>',
				/* translators: %: page number. */
				'pagelink' => esc_html__( 'Page %', 'twentytwentyone' ),
			)
		);
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer default-max-width">
		<?php twenty_twenty_one_entry_meta_footer(); ?>
	</footer><!-- .entry-footer -->

	<?php if ( ! is_singular( 'attachment' ) ) : ?>
		<?php get_template_part( 'template-parts/post/author-bio' ); ?>
	<?php endif; ?>

</article><!-- #post-<?php the_ID(); ?> -->

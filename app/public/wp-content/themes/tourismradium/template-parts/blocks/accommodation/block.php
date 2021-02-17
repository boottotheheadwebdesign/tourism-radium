<?php
/**
 * Block Name: Accommodations
 *
 * This is the template that displays the accommodations loop block.
 */

 // Create id attribute allowing for custom "anchor" value.
$id = 'accommodation-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'accommodation';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

$argType = get_field( 'loop_argument_type' );
if( $argType == "count" ) :
  $args = array( 
    'orderby' => 'meta_value_num',
    'post_type' => 'accommodation',
    'posts_per_page' => get_field( 'accommodation_count' )
  );
else:
  $accommodations = get_field( 'select_accommodations' );
  $args = array( 
    'orderby' => 'post__in', //meta_value_num
    //'order' => 'asc',
    'post_type' => 'accommodation',
    'post__in' => $accommodations
  );
endif;

$the_query = new WP_Query( $args );
?>

<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">

<?php if( get_field('block_accommodation_title') ): ?>
    <h2><?php the_field('block_accommodation_title'); ?></h2>
<?php endif; ?>

<div class="accommodations-listing">
    <?php 
    if ( $the_query->have_posts() ) :
        while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
        
        <div class="accommodation-item">         
            <article class="card">
                <a href="<?php the_permalink(); ?>">
                    <div class="thumbnail">
                        <?php //the_post_thumbnail('post-thumbnail'); ?>
                    </div>
                    <div class="card-content">
                        <h4 class="card-content__name"><?php the_field('accommodation_name', get_the_ID()); ?></h4>                        
                    </div>
                </a>
            </article>
        </div> <!--/.accommodation-->
        
        <?php endwhile; ?>
    <?php endif;?>
    <?php wp_reset_postdata(); ?>    
  </div>

  

</section> <!--/.accommodations-->
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
$className = 'accommodation-block';
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
        <p><?php the_field('block_accommodation_paragraph'); ?></p>
    <?php endif; ?>

    <div class="accommodations-listing">
        <?php 
        if ( $the_query->have_posts() ) :
            while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
            
            <div class="accommodation-item">         
                <article class="card">
                    <div class="thumbnail">
                        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('post-thumbnail'); ?></a>
                    </div>
                    <div class="card-content">
                        <h4 class="card-content__name"><?php the_field('accommodation_name', get_the_ID()); ?></h4>  
                        <?php if( get_field('accommodation_address', get_the_ID()) ): ?>
                            <p><?php the_field('accommodation_address', get_the_ID()); ?></p>
                        <?php endif; ?>  	
                        <?php if( get_field('accommodation_phone', get_the_ID()) ): ?>
                            <p><?php the_field('accommodation_phone', get_the_ID()); ?></p>
                        <?php endif; ?>  	
                        <?php if( get_field('accommodation_website_url', get_the_ID()) ): ?>
                            <p><a href="<?php the_field('accommodation_website_url', get_the_ID()); ?>" target="_blank">Visit website</a></p>
                        <?php endif; ?>  
                        <?php if( get_field('accommodation_book_now_url', get_the_ID()) ): ?>
                            <a class="lnk-book-now" href="<?php the_field('accommodation_book_now_url', get_the_ID()); ?>" target="_blank">Book Now</a></p>
                        <?php endif; ?>                          
                    </div>
                </article>
            </div> <!--/.accommodation-item-->
            
            <?php endwhile; ?>
        <?php endif;?>
        <?php wp_reset_postdata(); ?>    
    </div> <!--/.accommodations-listing-->
<p class="center"><a class="btn outline arrow" href="/accommodations">All Accommodations</a></p>
</section> <!--/.accommodation-block-->
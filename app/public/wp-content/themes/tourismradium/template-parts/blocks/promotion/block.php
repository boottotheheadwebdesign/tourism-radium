<?php
/**
 * Block Name: Promotions
 *
 * This is the template that displays the promotions loop block.
 */

 // Create id attribute allowing for custom "anchor" value.
$id = 'promotion-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'promotion-block';
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
    'post_type' => 'promotion',
    'posts_per_page' => get_field( 'promotion_count' )
  );
else:
  $promotions = get_field( 'select_promotions' );
  $args = array( 
    'orderby' => 'post__in', //meta_value_num
    //'order' => 'asc',
    'post_type' => 'promotion',
    'post__in' => $promotions
  );
endif;

$the_query = new WP_Query( $args );
?>

<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">

    <?php if( get_field('block_promotion_title') ): ?>
        <h2><?php the_field('block_promotion_title'); ?></h2>
        <p><?php the_field('block_promotion_paragraph'); ?></p>
    <?php endif; ?>

    <div class="promotions-listing">
        <?php 
        if ( $the_query->have_posts() ) :
            while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
            
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
        <?php endif;?>
        <?php wp_reset_postdata(); ?>    
    </div> <!--/.promotions-listing-->
<p class="center"><a class="btn outline arrow" href="/promotions">All Promotions</a></p>
</section> <!--/.promotion-block-->
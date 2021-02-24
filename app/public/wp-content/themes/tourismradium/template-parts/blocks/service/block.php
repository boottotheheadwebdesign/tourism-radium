<?php
/**
 * Block Name: Services
 *
 * This is the template that displays the Local Service Providers loop block.
 */

 // Create id attribute allowing for custom "anchor" value.
$id = 'service-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'service-block';
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
    'post_type' => 'service',
    'posts_per_page' => get_field( 'service_count' )
  );
else:
  $services = get_field( 'select_services' );
  $args = array( 
    'orderby' => 'post__in', //meta_value_num
    //'order' => 'asc',
    'post_type' => 'service',
    'post__in' => $services
  );
endif;

$the_query = new WP_Query( $args );
?>

<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">

    <?php if( get_field('block_service_title') ): ?>
        <h2><?php the_field('block_service_title'); ?></h2>
        <p><?php the_field('block_service_paragraph'); ?></p>
    <?php endif; ?>

    <div class="services-listing">
        <?php 
        if ( $the_query->have_posts() ) :
            while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
            
            <div class="service-item">         
                <article class="card">
                    <div class="thumbnail">
                        <?php if( get_field('service_logo', get_the_ID()) ): ?>
                            <img src="<?php the_field('service_logo', get_the_ID()); ?>" alt="<?php the_field('service_name', get_the_ID()); ?> logo">
                        <?php else : ?>
                            <img src="/wp-content/themes/tourismradium/images/services/logos/logo-fpo.jpg" alt="FPO logo">
                        <?php endif; ?>  
                    </div>
                    <div class="card-content">
                        <h4 class="card-content__name"><?php the_field('service_name', get_the_ID()); ?></h4> 
                        <?php if( get_field('service_directions', get_the_ID()) ): ?>
                            <p class="address"><a href="<?php the_field('service_directions', get_the_ID()); ?>" target="_blank">Get Directions</a></p>
                        <?php endif; ?>                          	
                        <?php if( get_field('service_phone', get_the_ID()) ): ?>
                            <p class="phone"><a href="tel:<?php the_field('service_phone', get_the_ID()); ?>" target="_blank"><?php the_field('service_phone', get_the_ID()); ?></a></p>
                        <?php endif; ?>  	
                        <?php if( get_field('service_website', get_the_ID()) ): ?>
                            <p class="website"><a href="<?php the_field('service_website', get_the_ID()); ?>" target="_blank">Visit website</a></p>
                        <?php endif; ?>  
                    </div>
                </article>
            </div> <!--/.service-item-->
            
            <?php endwhile; ?>
        <?php endif;?>
        <?php wp_reset_postdata(); ?>    
    </div> <!--/.services-listing-->
<p class="center"><a class="btn outline arrow" href="/services">All Services</a></p>
</section> <!--/.service-block-->
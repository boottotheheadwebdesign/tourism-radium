<?php
/**
 * Block Name: Events
 *
 * This is the template that displays the events loop block.
 */

 // Create id attribute allowing for custom "anchor" value.
$id = 'event-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'event-block';
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
    'post_type' => 'event',
    'posts_per_page' => get_field( 'event_count' )
  );
else:
  $events = get_field( 'select_events' );
  $args = array( 
    'orderby' => 'post__in', //meta_value_num
    //'order' => 'asc',
    'post_type' => 'event',
    'post__in' => $events
  );
endif;

$the_query = new WP_Query( $args );
?>

<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">

    <?php if( get_field('block_event_title') ): ?>
        <h2><?php the_field('block_event_title'); ?></h2>
    <?php endif; ?>
    <?php if( get_field('block_event_paragraph') ): ?>
        <p><?php the_field('block_event_paragraph'); ?></p>
    <?php endif; ?>

    <div class="events-listing">
        <?php 
        if ( $the_query->have_posts() ) :
            while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
            
            <div class="event-item">    
                <?php $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); ?>
                <article class="event">
                    <div class="event-bg" style="background-image:url('<?php echo $backgroundImg[0] ?>')">
                    <?php if( get_field('event_start_date', get_the_ID()) ): ?>
                        <div class="event-date"><?php the_field('event_start_date', get_the_ID()); ?></div>
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
                    <?php if( get_field('event_short_description', get_the_ID()) ): ?>
                        <p><?php the_field('event_short_description', get_the_ID()); ?></p>
                    <?php endif; ?>     
                    </div>
                </article>
            </div> <!--/.event-item-->
            
            <?php endwhile; ?>
        <?php endif;?>
        <?php wp_reset_postdata(); ?>    
    </div> <!--/.events-listing-->
<p class="center"><a class="btn outline" href="/events">All Events</a></p>
</section> <!--/.event-block-->
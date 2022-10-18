
<?php
/**
 * Block Name: Stories
 *
 * This is the template that displays Featured Stories carousel section
 */

 // Create id attribute allowing for custom "anchor" value.
$id = 'featured-stories-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$className = 'featured-stories-block';
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
    'post_type' => 'post',
    'posts_per_page' => get_field( 'featured_stories_count' )
  );
else:
  $featuredStories = get_field( 'select_featured_stories' );
  $args = array( 
    'orderby' => 'post__in', //meta_value_num
    //'order' => 'asc',
    'post_type' => 'post',
    'post__in' => $featuredStories
  );
endif;

$the_query = new WP_Query( $args );

?>

<section id="<?php echo esc_attr($id); ?>" class="featured-stories <?php echo esc_attr($className); ?>">

    <?php if( get_field('block_featured_stories_title') ): ?>
        <h2><?php the_field('block_featured_stories_title'); ?></h2>
    <?php endif; ?>
    <?php if( get_field('block_featured_stories_paragraph') ): ?>
        <p><?php the_field('block_featured_stories_paragraph'); ?></p>
    <?php endif; ?>
    <div class="featured-stories-carousel">
       <?php 
        if ( $the_query->have_posts() ) :
            while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                <div class="story">
                    <article class="story-item" id="">
                        <div class="article-thumbnail">
                            <a href="<?php the_permalink(); ?>"><?php twenty_twenty_one_post_thumbnail(); ?></a>
                        </div>
                        <div class="article-content">
                            <?php 
                            $category = get_the_category();
                            //the_category('');                      
                            ?>  

                            <ul>
                                <li><a href="/stories"><?php echo $category[0]->cat_name ?></a></li>
                            </ul>
                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <a class="read-more" href="<?php the_permalink(); ?>"><?php echo reading_time();?> Read &gt;</a>
                            
                        </div>
                    </article>
                </div>
            <?php endwhile; ?>
        <?php endif;?>
        <?php wp_reset_postdata(); ?>    


      
    </div>
    <p class="center">
        <a class="btn outline" href="/stories">View All</a>
    </p>
</section>
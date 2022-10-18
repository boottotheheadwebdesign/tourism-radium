<?php
/**
 * Block Name: Feature Article
 *
 * This is a block that displays one "feature article" - current on Home page
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'feature-article-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$className = 'feature-article-block';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}
/*
$argType = get_field( 'loop_argument_type' );
if( $argType == "select" ) :

else:
  $args = array( 
    'orderby' => 'meta_value_num',
    'post_type' => 'post',
    'posts_per_page' => get_field( 'feature_article_count' )
  );
endif;
*/

$featureArticle = get_field( 'select_feature_article' );
$args = array( 
    'orderby' => 'post__in', //meta_value_num
    'post_type' => 'post',
    'posts_per_page' => 1,
    'post__in' => $featureArticle
);

$the_query = new WP_Query( $args );
?>

 <section id="<?php echo esc_attr($id); ?>" class="feature-article <?php echo esc_attr($className); ?>">

    <?php if( get_field('block_feature_article_title') ): ?>
        <h2><?php the_field('block_feature_article_title'); ?></h2>
    <?php endif; ?>

    <?php 
    if ( $the_query->have_posts() ) :
        while ( $the_query->have_posts() ) : $the_query->the_post();
            $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); ?>
            <article class="article-item" id="" style="background-image:url('<?php echo $backgroundImg[0] ?>')">
                <div class="article-content">
                    <span class="eyebrow">Featured</span>
                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <?php 
                    $category = get_the_category();
                    //the_category('');                      
                    ?>   
                    <ul>
                        <li><a href="/stories"><?php echo $category[0]->cat_name ?></a></li>
                    </ul>                  
                </div>
                <a class="btn yellow" href="<?php the_permalink(); ?>"><?php echo reading_time();?> Read &gt;</a>
            </article>
        <?php endwhile; ?>
    <?php endif;?>
    <?php wp_reset_postdata(); ?>    

 </section>
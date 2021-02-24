<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header();

//$description = get_the_archive_description();
?>

<section class="banner" style="background-image:url(/wp-content/themes/tourismradium/images/services/banner-getting-around.jpg)">
	<div class="banner__content">
		<h2>Getting Around</h2>
		<p>The sidewalks in the Village of Radium Hot Springs are quiet, pleasant and easy to walk. Our little village has everything you need for a peaceful mountain escape.</p>
	</div>
</section>

<section class="page-heading">
    <h1 class="heading-2">Welcome To Radium</h1>
    <p class="intro-text">Lorem ipsum dolor sit amet, Mei persius placerat et, qui et etiam veniam. Mei id suscipit definiebas vituperatoribus, altera admodum nec cu. Vel cu suas laboramus scripserit. An suas vidit reque vis, mel no tincidunt reprimique. His ad sanctus definitionem, habemus noluisse dignissim cum et.</p>
</section>

<div class="service-providers" id="results">
    <h2>Local Service Providers</h2>
    <section class="page-grid">
        <div class="page-grid-filters">
            <ul class="page-grid-nav">
                <li><a href="/services?cat=41#results">Eat & Drink</a></li>
                <li><a href="/services?cat=42#results">Retail & Services</a></li>
                <li><a href="/services?cat=43#results">Recreation</a></li>
                <li><a href="/services?cat=44#results">Wellness</a></li>
                <li><a href="/services#results">View All</a></li>
            </ul>
            <div class="page-grid-dropdowns">
                <?php
                $args = array(
                    'exclude' => '1',
                    //'show_option_all' => 'All',
                    'show_count' => 0,
                    'value_field'       => 'term_id',
                    'orderby'          => 'name',
                    'selected' => 2
                    //'echo'             => 0,
                );
                ?>
                <?php wp_dropdown_categories($args); ?>

    
                    <select name="sort-posts" id="sortbox" onchange="sessionStorage.setItem('sort-value',this.options[this.selectedIndex].id);document.location.href='?cat=<?php echo $_GET['cat']; ?>&'+this.options[this.selectedIndex].value;">
        
                <option value="orderby=title&order=asc#results">Sort</option>
                    <!-- <option id="post-sort-latest" value="orderby=date&order=desc">Latest</option>
                    <option id="post-sort-oldest" value="orderby=date&order=asc">Oldest</option> -->
                    <option id="post-sort-title-asc" value="orderby=title&order=asc#results">Title Asc</option>
                    <option id="post-sort-title-desc" value="orderby=title&order=desc#results">Title Desc</option>
                </select>

                <script>
                document.getElementById('cat').onchange = function(){
                    sessionStorage.setItem('category-value', this.selectedIndex);
                    // var selectedCategory = sessionStorage.getItem('category-value');
                    if( this.value !== '-1' ) {
                        window.location='/services?cat='+this.value+'#stories';
                    }
                }

                window.addEventListener('load', function(event) {
                    // Set "selected" for Sort dropdown 
                    var selectedSortbox = sessionStorage.getItem('sort-value');
                    if(selectedSortbox != undefined || selectedSortbox != null){    
                        document.getElementById( selectedSortbox).setAttribute('selected', 'selected');
                    }

                    // Set "selected" for Categories dropdown
                    var selectedCategory = sessionStorage.getItem('category-value');
                    if(selectedCategory != undefined || selectedCategory != null){   
                        sessionStorage.removeItem('sort-value'); 
                        document.getElementById('cat').selectedIndex = selectedCategory;
                    }

                });
                </script>    
            </div> <!--/.page-grid-dropdowns-->
        </div> <!--/.page-grid-filters -->

        <div class="page-grid-results">

            <?php if ( have_posts() ) : ?>

                <?php while ( have_posts() ) : ?>

                <?php the_post(); ?>

                <div class="accommodation-item">         
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
                </div> <!--/.accommodation-item-->


                    <?php //get_template_part( 'template-parts/content/content', get_theme_mod( 'display_excerpt_or_full_post', 'excerpt' ) ); ?>
                <?php endwhile; ?>

        <?php else : ?>
            <p class="page-grid__no-results">Sorry no results currently.</p>
        <?php endif; ?> 
            <?php wp_reset_postdata(); ?> 
        </div> <!--/.page-grid-results -->
        
        <!-- Pagination -->
        <?php twenty_twenty_one_the_posts_navigation(); ?>
    
    </section> <!--/.page-grid -->
</div> <!--/.service-providers-->

<?php 
  $args = array( 
    'orderby' => 'post__in', //meta_value_num
    //'order' => 'asc',
    'post_type' => 'accommodation',
    'post__in' => $accommodations,
    'posts_per_page' => 3,
    //'tag' => 'featured-eat-drink'
  );
$the_query = new WP_Query( $args ); 
?>
<section class="callout-where-to-stay">
    <div class="callout-heading">
        <h2>Where To Stay</h2>
        <p>Accommodations in the Radium area</p>
    </div>
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
</section>

<?php get_footer(); ?>

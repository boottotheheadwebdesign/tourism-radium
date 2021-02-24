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

<section class="banner" style="background-image:url(/wp-content/themes/tourismradium/images/accommodations/banner-where-to-stay.jpg)">
	<div class="banner__content">
		<h2>Where To Stay</h2>
		<p>Radium is a place full of character and offers a variety of accommodations.</p>
	</div>
</section>

<section class="page-heading">
    <h1 class="heading-2">Accommodations</h1>
    <p class="intro-text">Choose from amazing campgrounds, beautiful hotels and resorts, rustic cabins, charming B&B’s, unique throwback roadside motels and more!</p>
</section>

<section class="page-grid" id="results">
    <div class="page-grid-filters">
        <ul class="page-grid-nav">
            <li><a href="/accommodations?cat=38#results">Hotels & Resorts</a></li>
            <li><a href="/accommodations?cat=37#results">Condos & Cabins</a></li>
            <li><a href="/accommodations?cat=39#results">B&B's / Inns</a></li>
            <li><a href="/accommodations?cat=40#results">Motels</a></li>
            <li><a href="/accommodations?cat=12#results">Camping & RV</a></li>
            <li><a href="/accommodations#results">View All</a></li>
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
                    window.location='/accommodations?cat='+this.value+'#stories';
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
                        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('post-thumbnail'); ?></a>
                    </div>
                    <div class="card-content">
                        <h4 class="card-content__name"><a href="<?php the_permalink(); ?>"><?php the_field('accommodation_name', get_the_ID()); ?></a></h4>
                        <?php if( get_field('accommodation_address', get_the_ID()) ): ?>
                            <p class="address"><?php the_field('accommodation_address', get_the_ID()); ?></p>
                        <?php endif; ?>  	
                        <?php if( get_field('accommodation_phone', get_the_ID()) ): ?>
                            <p class="phone"><?php the_field('accommodation_phone', get_the_ID()); ?></p>
                        <?php endif; ?>  	
                        <?php if( get_field('accommodation_website_url', get_the_ID()) ): ?>
                            <p class="website"><a href="<?php the_field('accommodation_website_url', get_the_ID()); ?>" target="_blank">Visit website</a></p>
                        <?php endif; ?>  
                        <?php if( get_field('accommodation_book_now_url', get_the_ID()) ): ?>
                            <a class="lnk-book-now" href="<?php the_field('accommodation_book_now_url', get_the_ID()); ?>" target="_blank">Book Now</a></p>
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

<?php 
  $args = array( 
    'orderby' => 'post__in', //meta_value_num
    //'order' => 'asc',
    'post_type' => 'promotion',
    'post__in' => $promotions,
    'posts_per_page' => 3,
    //'tag' => 'featured-eat-drink'
  );
$the_query = new WP_Query( $args ); 
?>
<section class="callout-current-promotions">
    <div class="callout-heading">
        <h2>Current Promotions</h2>
    </div>
    <div class="promotions-listing">
        <?php 
        if ( $the_query->have_posts() ) :
            while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
            
            <div class="promotion-item">         
					<article class="card-alt">
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
    </div> <!--/.accommodations-listing-->

      <p class="center"><a class="btn outline arrow" href="/accommodations">All Promotions</a></p>                      
</section>


<?php get_footer(); ?>


<article id="" class="post- page type-page status-publish hentry entry">
    <div class="entry-content">
        
<?php 
function get_id_by_slug($page_slug) {
    $page = get_page_by_path($page_slug);
    if ($page) {
        return $page->ID;
    } else {
        return null;
    }
}
$pageId = get_page_by_path( 'blog' );

    //the_field('blog_banner', $pageId); 
    /*
     if( get_field('blog_banner', $pageId) ) {
     $heroimage = get_field('blog_banner', $pageId);
 } else {
    $heroimage = '/wp-content/themes/ascenthealth/images/banners/homepage-banner.jpg';
} */
?>

        <div class="wp-block-cover alignfull has-background-dim-20 has-black-background-color has-background-dim has-custom-content-position is-position-center-left hero" style="background-image:url(/wp-content/themes/tourismradium/images/stories/banner-our-stories.jpg);min-height:650px">
            <div class="wp-block-cover__inner-container">
                <h1><span>Our</span>Stories</h1>
                <div class="featured-post">

                <?php // This gets one post with tag of "featured" and displays
                    $args = array(
                        'tag' => 'featured',
                        'posts_per_page' => '1'
                    );
                    $the_query = new WP_Query($args);
                    if ( $the_query->have_posts() ) {
                        while ( $the_query->have_posts() ) {
                            $the_query->the_post();
                    ?>
                    
                        <p class="featured-post__title"><?php the_title(); ?></p>
                        <div class="featured-post__meta">
                            <p class="category"><?php the_category(', ');?></p>
                            <p class="authour"><?php the_author();?></p>
                           
                            <p class="read-time"><a href="<?php the_permalink();?>">
				<?php if( get_field('read_time_duration') ): ?>
					<?php the_field('read_time_duration'); ?> Min Read >>>
                <?php else: ?>  				                            
                            5 Min Read >
                <?php endif; ?>          
                            </a></p>
                        </div>
                    <?php            
                        }
                    } else {
                        // no posts found
                    }
                    wp_reset_postdata();              
                ?>
                </div>
            </div>
        </div>

        <div class="blog-heading" id="stories">
            <h2>All Stories</h2>
            
            <div class="blog-filters">
            <?php
            $args = array(
                'include' => '1,50,83',
                'show_option_all' => 'All Stories',
                'show_count' => 1,
                'value_field'       => 'term_id',
                'orderby'          => 'name',
                'selected' => 2
                // 'echo'             => 0,
            );
            ?>
        <?php wp_dropdown_categories($args); ?>


            <?php if ( is_archive() ) { ?>
                <select name="sort-posts" id="sortbox" onchange="document.location.href='?'+this.options[this.selectedIndex].value;">
            <?php } else { ?>
                <select name="sort-posts" id="sortbox" onchange="sessionStorage.setItem('sort-value',this.options[this.selectedIndex].id);document.location.href='?cat=<?php echo $_GET['cat']; ?>&'+this.options[this.selectedIndex].value;">
            <?php } ?>
                    <option id="post-sort-latest" value="orderby=date&order=desc#stories">Latest</option>
                    <option id="post-sort-oldest" value="orderby=date&order=asc#stories">Oldest</option>
                    <option id="post-sort-title-asc" value="orderby=title&order=asc#stories">Title Asc</option>
                    <option id="post-sort-title-desc" value="orderby=title&order=desc#stories">Title Desc</option>
                </select>

            </div>
        </div> <!--/.blog-heading-->

        <script>
        document.getElementById('cat').onchange = function(){
            //alert(this.selectedIndex);
            sessionStorage.setItem('category-value', this.selectedIndex);
            // var selectedCategory = sessionStorage.getItem('category-value');
            // alert(selectedCategory);

            if( this.value !== '-1' ){
            window.location='/stories?cat='+this.value+'#stories';
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

        <section class="blog-listings">

        <?php
        if ( have_posts() ) {

            // Load posts loop.
            while ( have_posts() ) {
                
                the_post();
                ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="card-wrapper">
                <div class="card">
                    <div class="thumbnail"><?php twenty_twenty_one_post_thumbnail(); ?></div>
                    <div class="card-content">
                        <div class="categories">
                        <?php 
                        $category = get_the_category();
                        echo $category[0]->cat_name;
                        ?>    
                        </div>
                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3> 
                        <p class="meta">
                            <a href="<?php the_permalink(); ?>">
                                <?php if( get_field('read_time_duration') ): ?><?php the_field('read_time_duration'); ?> Min Read<?php else: ?>5 Min Read<?php endif; ?>                        
                            </a>
                        </p>
                    </div>
                </div>
                            </div>
            </article>

        <?php        
            }
        ?>
        </section> <!--/.blog-listings-->

        <div class="navigation pagination">
            <?php   

                echo paginate_links();
                
                // Previous/next page navigation.
                //twenty_twenty_one_the_posts_navigation();

            } else {

                // If no content, include the "No posts found" template.
                get_template_part( 'template-parts/content/content-none' );

            }
            ?>
        </div> <!--/.pagination-->
        
    </div><!--/.entry-content-->
</article>
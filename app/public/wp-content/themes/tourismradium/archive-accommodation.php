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

<section class="banner">
	<div class="banner__content">
		<h2>Where To Stay</h2>
		<p>Radium is a place full of character and offers a variety of accommodations.</p>
	</div>
</section>

<div class="blog-filters" style="margin-top:150px">
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


            <?php if ( is_archive() ) { ?>
                <select name="sort-posts" id="sortbox" onchange="document.location.href='?'+this.options[this.selectedIndex].value;">
            <?php } else { ?>
                <select name="sort-posts" id="sortbox" onchange="sessionStorage.setItem('sort-value',this.options[this.selectedIndex].id);document.location.href='?cat=<?php echo $_GET['cat']; ?>&'+this.options[this.selectedIndex].value;">
            <?php } ?>
                    <option id="post-sort-latest" value="orderby=date&order=desc">Latest</option>
                    <option id="post-sort-oldest" value="orderby=date&order=asc">Oldest</option>
                    <option id="post-sort-title-asc" value="orderby=title&order=asc">Title Asc</option>
                    <option id="post-sort-title-desc" value="orderby=title&order=desc">Title Desc</option>
                </select>

            </div>

			     <script>
        document.getElementById('cat').onchange = function(){
            //alert(this.selectedIndex);
            sessionStorage.setItem('category-value', this.selectedIndex);
            // var selectedCategory = sessionStorage.getItem('category-value');
            // alert(selectedCategory);

            if( this.value !== '-1' ){
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
<?php if ( have_posts() ) : ?>

<h1>Accommodations</h1>
<p>Choose from amazing campgrounds, beautiful hotels and resorts, rustic cabins, charming B&B’s, unique throwback roadside motels and more!</p>

	<?php while ( have_posts() ) : ?>
		<?php the_post(); ?>
		<?php get_template_part( 'template-parts/content/content', get_theme_mod( 'display_excerpt_or_full_post', 'excerpt' ) ); ?>
	<?php endwhile; ?>

	<?php twenty_twenty_one_the_posts_navigation(); ?>

<?php else : ?>
	<?php get_template_part( 'template-parts/content/content-none' ); ?>
<?php endif; ?>

<?php get_footer(); ?>

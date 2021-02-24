
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

?>

<section id="<?php echo esc_attr($id); ?>" class="featured-stories <?php echo esc_attr($className); ?>">
    <h2>Featured Stories</h2>
    <div class="featured-stories-carousel">
        <div class="story">
            <article class="story-item" id="">
                <div class="article-thumbnail">
                    <a href="#"><img src="/wp-content/themes/tourismradium/images/article.png"></a>
                </div>
                <div class="article-content">
                    <ul>
                        <li><a href="#">Hiking</a></li>
                        <li><a href="#">Family Fun</a></li>
                        <li><a href="#">Our Parks</a></li>
                    </ul>
                    <h3><a href="#">Three awesome places to hike near Radium Hot Springs</a></h3>
                    <a class="read-more" href="#">6 Min Read &gt;</a>
                </div>
            </article>
        </div>
        <div class="story">
            <article class="story-item" id="">
                <div class="article-thumbnail">
                    <a href="#"><img src="/wp-content/themes/tourismradium/images/article.png"></a>
                </div>
                <div class="article-content">
                    <ul>
                        <li><a href="#">Hiking</a></li>
                        <li><a href="#">Family Fun</a></li>
                        <li><a href="#">Our Parks</a></li>
                    </ul>
                    <h3><a href="#">Three awesome places to hike near Radium Hot Springs</a></h3>
                    <a class="read-more" href="#">6 Min Read &gt;</a>
                </div>
            </article>
        </div>
        <div class="story">
            <article class="story-item" id="">
                <div class="article-thumbnail">
                    <a href="#"><img src="/wp-content/themes/tourismradium/images/article.png"></a>
                </div>
                <div class="article-content">
                    <ul>
                        <li><a href="#">Hiking</a></li>
                        <li><a href="#">Family Fun</a></li>
                        <li><a href="#">Our Parks</a></li>
                    </ul>
                    <h3><a href="#">Three awesome places to hike near Radium Hot Springs</a></h3>
                    <a class="read-more" href="#">6 Min Read &gt;</a>
                </div>
            </article>
        </div>
        <div class="story">
            <article class="story-item" id="">
                <div class="article-thumbnail">
                    <a href="#"><img src="/wp-content/themes/tourismradium/images/article.png"></a>
                </div>
                <div class="article-content">
                    <ul>
                        <li><a href="#">Hiking</a></li>
                        <li><a href="#">Family Fun</a></li>
                        <li><a href="#">Our Parks</a></li>
                    </ul>
                    <h3><a href="#">Three awesome places to hike near Radium Hot Springs</a></h3>
                    <a class="read-more" href="#">6 Min Read &gt;</a>
                </div>
            </article>
        </div>
        <div class="story">
            <article class="story-item" id="">
                <div class="article-thumbnail">
                    <a href="#"><img src="/wp-content/themes/tourismradium/images/article.png"></a>
                </div>
                <div class="article-content">
                    <ul>
                        <li><a href="#">Hiking</a></li>
                        <li><a href="#">Family Fun</a></li>
                        <li><a href="#">Our Parks</a></li>
                    </ul>
                    <h3><a href="#">Three awesome places to hike near Radium Hot Springs</a></h3>
                    <a class="read-more" href="#">6 Min Read &gt;</a>
                </div>
            </article>
        </div>
        <div class="story">
            <article class="story-item" id="">
                <div class="article-thumbnail">
                    <a href="#"><img src="/wp-content/themes/tourismradium/images/article.png"></a>
                </div>
                <div class="article-content">
                    <ul>
                        <li><a href="#">Hiking</a></li>
                        <li><a href="#">Family Fun</a></li>
                        <li><a href="#">Our Parks</a></li>
                    </ul>
                    <h3><a href="#">Three awesome places to hike near Radium Hot Springs</a></h3>
                    <a class="read-more" href="#">6 Min Read &gt;</a>
                </div>
            </article>
        </div>
    </div>
    <p class="center">
        <a class="btn outline" href="/stories">Our Stories</a>
    </p>
</section>
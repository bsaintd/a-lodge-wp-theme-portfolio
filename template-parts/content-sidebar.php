<?php

/**
 * Template part for displaying page blog-sidebar in blog and press templates
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Fueled_on_Bacon
 */

?>
<section class="blog-sidebar">
    
    <div class="search">
        <i class="material-icons">search</i>
        <form role="search" method="get" class="search-form" action="/">
            <label>
                <input type="search" class="search-field" placeholder="Search" value="<?php
                    echo isset($_GET["s"]) ? $_GET["s"] : "";
                    ?>" name="s" />
            </label>
            <input type="submit" class="search-submit" value="Search" />
        </form>
    </div>

    <div class="articles">
        <h3>Related Articles</h3>
        <div class="posts">
            <?php
            // really just recent posts
            $excluded = (isset($post)) ? array($post->ID) : NULL;
            $the_query = new WP_Query(array(
                'posts_per_page' => 3,
                'order_by' => 'post_date',
                'order' => 'DESC',
                'post__not_in' => $excluded
            ));

            if ($the_query->have_posts()) :
                while ($the_query->have_posts()) :
                    $the_query->the_post();
                    // loop through results
                    ?>
                    <div class="post">
                        <?php if (has_post_thumbnail()) : ?>
                            <a href="<?php echo get_the_permalink(); ?>">
                                <div class="post-img" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>');"></div>
                            </a>
                        <?php endif; ?>
                        <div class="post-content">
                            <h4>
                                <a href="<?php echo get_the_permalink(); ?>">
                                    <?php echo get_the_title(); ?>
                                </a>
                            </h4>
                        </div>
                    </div>

                <?php endwhile;
            endif; ?>
        </div>
    </div>
</section> <!-- end blog-sidebar -->
<?php
/* restore original post data */
wp_reset_postdata();
?>
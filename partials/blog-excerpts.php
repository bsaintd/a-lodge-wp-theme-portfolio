<?php
/**
 * This lists blog articles, drop it into the repeater
 *
 * @package Fueled_on_Bacon
 */

$section_heading_text = ( get_search_query() ) ? 'Looking for: '.get_search_query() :'Most Recent';

?>
<section class="content blog-list <?php echo (is_single()) ? 'single-post' : ''; ?>">
<div class="search mobile">
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
<?php if(!is_single()): ?>
<h2 class="section-heading underline"><?php echo $section_heading_text; ?></h2>
<?php endif; ?>
<?php
if ( have_posts() ) :

    while( have_posts() ) {
        the_post();

        /*
            * Include the Post-Type-specific template for the content.
            * If you want to override this in a child theme, then include a file
            * called content-___.php (where ___ is the Post Type name) and that will be used instead.
            */
        get_template_part( 'template-parts/content', 'multi-post' );

    }

    the_posts_navigation();

else :

    get_template_part( 'template-parts/content', 'none' );

endif; ?>
</section>
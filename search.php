<?php
/**
 * 
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Fueled_on_Bacon
 */
get_header();
?>

<div id="primary" class="content-area home">
  <main id="main" class="site-main">

	<?php
	  $sections = get_field('sections', get_page_by_path('blog')->ID);
	  $sections[0]["heading_copy"] = 'Search Results';
      fob_section_repeater($sections);
      get_template_part('partials/blog-section');
      get_template_part('template-parts/content-archives', '');
    ?>

  </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
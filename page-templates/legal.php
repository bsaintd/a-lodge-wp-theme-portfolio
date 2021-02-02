<?php
/**
 * Template Name: Legal
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Fueled_on_Bacon
 */
get_header();
?>

<div id="primary" class="content-area">
  
  <main id="main" class="site-main">

  <?php
    get_template_part( 'template-parts/content', 'page')
  ?>
  </main><!-- #main -->
  <?php get_template_part( 'template-parts/content-sidebar', 'legal'); ?>
</div><!-- #primary -->

<?php
get_footer();
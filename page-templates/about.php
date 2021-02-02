<?php
/**
 * Template Name: About
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Fueled_on_Bacon
 */
get_header();
?>

<div id="primary" class="content-area">
  <?php
    $sections = get_field('sections');
    $hero_array = array_slice($sections, 0, 1);
    $remaining_sections = array_slice($sections, 1);
    fob_section_repeater($hero_array);
  ?>
  <main id="main" class="site-main">

  <?php
    $remaining_sections = array_slice($sections, 1);
    fob_section_repeater($remaining_sections);
  ?>
  </main><!-- #main -->
  <?php get_template_part( 'template-parts/content-sidebar', 'toc'); ?>
</div><!-- #primary -->

<?php
get_footer();
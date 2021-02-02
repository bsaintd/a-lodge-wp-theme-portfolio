<?php
/**
 * Template Name: Home
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
      the_content();
      fob_section_repeater(get_field('sections'));
    ?>

  </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
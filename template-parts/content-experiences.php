<?php
/**
 * Template part for displaying individual experiences
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Fueled_on_Bacon
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php include(get_template_directory() . '/partials/slick-carousel.php'); ?>
	<div class="entry-content">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		<?php the_content(); ?>
		<a class="cta" href="/about#contact-us">Get In Touch</a>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->

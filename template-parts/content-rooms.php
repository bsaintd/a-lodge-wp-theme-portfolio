<?php
/**
 * Template part for displaying page content in page.php
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
		<a class="cta" href="/booking<?php
			$sfx = get_field('room_type_abbreviation');
			echo ($sfx) ? "?room_type=$sfx" : ""; ?>">Book Now</a>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->

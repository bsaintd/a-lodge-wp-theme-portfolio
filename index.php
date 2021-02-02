<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
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
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) :
				$hero = get_field("hero", get_option("page_for_posts"));
				?>
				<div class="nav-space not-on-dsktp"></div>
				<header class="hero">
					<div class="background desktop"
						style="background-image: url('<?php echo $hero['background']['url']; ?>')"></div>
					<div class="background mobile"
						style="background-image: url('<?php echo $hero['background_mobile']['url']; ?>')"></div>
					</header>
					<?php
			endif; ?>
			<div class="content">
					<h1 class="page-title"><?php echo $hero['heading']; ?></h1>
			<?php /* Start the Loop */
			if ( have_posts() ) {
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_type() );

			}

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>
		</div>
		<?php
		get_template_part( 'template-parts/content-sidebar' );
		?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();

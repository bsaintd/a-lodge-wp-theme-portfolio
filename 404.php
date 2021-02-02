<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Fueled_on_Bacon
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<?php 
					  $sections = get_field('sections', get_page_by_path('blog')->ID);
					  $sections[0]["heading_copy"] = '404: Not Found';
					  fob_section_repeater($sections);
			?>
			<section class="content error-404 not-found">
				<p><?php esc_html_e( 'It looks like nothing was found at this location. Try another page.', 'fueled-on-bacon' ); ?></p>
			</section>

			<?php 
			 get_template_part('template-parts/content-archives', '');
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();

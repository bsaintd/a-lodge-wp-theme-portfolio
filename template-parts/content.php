<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Fueled_on_Bacon
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<header class="entry-header <?php echo (is_singular()) ? 'underline' : ''; ?>">
		<?php
		if ( is_singular() ) :
			the_title( '<h2 class="section-heading">', '</h2>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;
		?>
		<div class="entry-meta">
			<?php
				the_date( 'F j, Y', '<h4>', '</h4>' );
			?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<?php fueled_on_bacon_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
		the_content( sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Read More<span class="screen-reader-text"> "%s"</span>', 'fueled-on-bacon' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
		) );

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'fueled-on-bacon' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
	<!--	<php fueled_on_bacon_entry_footer(); ?> -->
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->

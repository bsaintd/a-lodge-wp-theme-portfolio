<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Fueled_on_Bacon
 */

?>

</div><!-- #content -->

<footer id="colophon" class="site-footer">
	<?php
		fob_section_repeater(get_field('footer_sections', 'option'));
	?>
	<div class="bottom-bar">
		<div class="copyright"><?php echo '&copy; A-Lodge, ' . date("Y") . ' All Rights Reserved.'; ?></div>
		<div class="footer-links">
			<?php
				wp_nav_menu( array(
					'theme_location' => 'footer-menu',
					'menu_id'        => 'footer-menu'
				) );
			?>
		</div>
	</div>
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>
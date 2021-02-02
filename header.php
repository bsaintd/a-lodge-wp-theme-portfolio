<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Fueled_on_Bacon
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-K623JSH');</script>
	<!-- End Google Tag Manager -->
	<?php wp_head(); ?>
</head>

<body <?php body_class($post->post_name); ?>>
	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K623JSH"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'fueled-on-bacon' ); ?></a>
		<header id="masthead"
			class="site-header">
			<div class="site-branding">
				<?php
				the_custom_logo();
				if ( is_front_page() && is_home() ) : ?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php else : ?>
					<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php endif;
				$fueled_on_bacon_description = get_bloginfo( 'description', 'display' );
				if ( $fueled_on_bacon_description || is_customize_preview() ) : ?>
					<p class="site-description"><?php echo $fueled_on_bacon_description; /* WPCS: xss ok. */ ?></p>
				<?php endif; ?>
			</div><!-- .site-branding -->

			<nav id="site-navigation" class="main-navigation">
				<div class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
					<button id="openMobileMenu" class="hamburger hamburger--collapse" type="button">
						<span class="hamburger-box">
							<span class="hamburger-inner"></span>
						</span>
					</button>
				</div>
				<div id="mobile-nav-bg"></div>
				<?php
				wp_nav_menu( array(
					'theme_location' => 'topnav-menu',
					'menu_id'        => 'primary-menu'
				) );
				?>
			</nav><!-- #site-navigation -->
			<?php
			// Show GLOBAL structured data
			$global_strctrd_data = get_field('structured_data_for_seo', 'option', false);
			if( $global_strctrd_data ):
				echo $global_strctrd_data;
			endif;
			// Show PAGE structured data
			$pg_strctrd_data = get_field('structured_data_for_seo', false, false);
			if( $pg_strctrd_data ):
				echo $pg_strctrd_data;
			endif;
			?>
		</header><!-- #masthead -->

		<div id="content" class="site-content">
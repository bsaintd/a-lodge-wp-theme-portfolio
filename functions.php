<?php
/**
 * Fueled on Bacon functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Fueled_on_Bacon
 */

if ( ! function_exists( 'alodge_setup' ) ) :
	function alodge_setup() {
		load_theme_textdomain( 'fueled-on-bacon', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
			// 'menu-1' => esc_html__( 'Primary', 'alodge' ),
			'topnav-menu' => __( 'TopNav Menu' ),
			'footer-menu' => __( 'Footer Menu' )
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'alodge_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		// add_theme_support( 'custom-logo', array(
		// 	'height'      => 250,
		// 	'width'       => 250,
		// 	'flex-width'  => true,
		// 	'flex-height' => true,
		// ) );
	}
endif;
add_action( 'after_setup_theme', 'alodge_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function alodge_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'alodge_content_width', 640 );
}
add_action( 'after_setup_theme', 'alodge_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function alodge_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'alodge' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'alodge' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'alodge_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function alodge_scripts() {
	wp_enqueue_script( 'g-recaptcha', 'https://www.google.com/recaptcha/api.js?render=6LcJVLcUAAAAAB4RtgKu--t9-iXKAKEGjnwCJbB8', false, null, false );
	wp_enqueue_style( 'theme-style', get_stylesheet_uri() );
	/* Load topnavmenu.js to remove ability to scroll when mobile navigation menu is open - load in <head> */
	wp_enqueue_script( 'mobile-nav-fixed', get_template_directory_uri() . '/js/mobilenavmenu.js', array(), null, false );
	/* Load smooth-scroll-links.js for smooth scrolling on page links */
	wp_enqueue_script( 'smooth-scroll-links-js', get_template_directory_uri() . '/js/smooth-scroll-links.js', array('jquery'), null, true );

	wp_enqueue_style( 'alodge-slick-carousel', '/wp-content/themes/fueled-on-bacon/lib/slick-carousel/slick.css' );
	wp_enqueue_script( 'alodge-navigation', get_template_directory_uri() . '/js/navigation.js', array(), null, true );
	wp_enqueue_script( 'alodge-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), null, true );
	wp_enqueue_script( 'alodge-slick-carousel-lib', get_template_directory_uri() . '/lib/slick-carousel/slick.min.js', array(), null, true );
	wp_enqueue_script( 'alodge-slick-carousel', get_template_directory_uri() . '/src/js/slickcarousel.js', array(), null, true );
	wp_enqueue_script( 'bundled-js', get_template_directory_uri() . '/js/bundle.js', array(), null, true );
	/* Load js/css for datepicker on events page form */
	if (is_page ('events')){
		wp_enqueue_script( 'moment-js', 'https://cdn.jsdelivr.net/momentjs/latest/moment.min.js', array('jquery'), null, true );
		wp_enqueue_script( 'datepicker-js', 'https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js', array('jquery'), null, true );
		wp_enqueue_script( 'events-form-datepicker-js', get_template_directory_uri() . '/js/events-form-datepicker.js', array('jquery'), null, true );
		wp_enqueue_style( 'datepicker-css', 'https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css' );
	}

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'alodge_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Add ACF options pages to control Header and Footer settings
 */
if ( function_exists( 'acf_add_options_page' ) ) {
	acf_add_options_page();
	acf_add_options_sub_page('Header');
	acf_add_options_sub_page('Footer');

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Header Settings',
		'menu_title'	=> 'Header',
		'parent_slug'	=> 'theme-general-settings',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Footer Settings',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'theme-general-settings',
	));
}

/**
 * remove comments option
 */
add_action( 'admin_menu', 'remove_comment_menu' );

function remove_comment_menu() {
    remove_menu_page( 'edit-comments.php' );
}

/**
 * Begin custom post types
 */



function register_custom_posts_init(){

	/**
	 * Page section posts
	 */

	 $room_type_labels = array(
	 	'name'               => 'Room Types',
	 	'singular_name'      => 'Room Type',
	 	'menu_name'          => 'Room Types'
	 );

	 $room_type_args = array(
	 	'labels'             => $room_type_labels,
	 	'public'             => true,
	 	'capability_type'    => 'post',
	 	'has_archive'        => false,
	 	'supports'           => array( 'title', 'editor', 'excerpt', 'thumbnail', 'custom-fields' )
	 );

	register_post_type('rooms', $room_type_args);

	$amenities_labels = array(
		'name'               => 'Amenities',
		'singular_name'      => 'Amenity',
		'menu_name'          => 'Amenities'
	);

	$amenities_args = array(
		'labels'             => $amenities_labels,
		'public'             => true,
		'capability_type'    => 'post',
		'has_archive'        => false,
		'supports'           => array( 'title', 'editor', 'excerpt', 'thumbnail', 'custom-fields' )
	);

   register_post_type('amenities', $amenities_args);

   	$experiences_labels = array(
		'name'               => 'Experiences',
		'singular_name'      => 'Experience',
		'menu_name'          => 'Experiences'
	);

	$experiences_args = array(
		'labels'             => $experiences_labels,
		'public'             => true,
		'capability_type'    => 'post',
		'has_archive'        => false,
		'supports'           => array( 'title', 'editor', 'excerpt', 'thumbnail', 'custom-fields' )
	);

	register_post_type('experiences', $experiences_args);

	$press_links_labels = array(
		'name'               => 'Press Links',
		'singular_name'      => 'Press Link',
		'menu_name'          => 'Press Links'
	);

	$press_links_args = array(
		'labels'             => $press_links_labels,
		'public'             => true,
		'capability_type'    => 'post',
		'has_archive'        => false,
		'supports'           => array( 'title', 'excerpt', 'thumbnail', 'custom-fields' )
	);

	register_post_type('press-links', $press_links_args);
}

add_action('init', 'register_custom_posts_init');

function disable_press_link_single_post($queried_post_type) {

	if ( is_single() && 'press-links' ==  $queried_post_type ) {
		wp_redirect( home_url(), 301 );
		exit;
	}
}

/**
 * Filter the "read more" excerpt string link to the post.
 *
 * @param string $more "Read more" excerpt string.
 * @return string (Maybe) modified "read more" excerpt string.
 */
function blog_excerpt_more( $more ) {
    if ( ! is_single() ) {
        $more = sprintf( '<a class="read-more" href="%1$s">%2$s</a>',
            get_permalink( get_the_ID() ),
            __( 'Read More', 'textdomain' )
        );
    }
    return $more;
}
add_filter( 'excerpt_more', 'blog_excerpt_more' );

// Add IDs to wp_nav_menu links <a> for Google click tracking purposes
// hashed w/ crc32 from menu item title (copy) and menu item # assigned by WP
function add_id_to_menu_links ($atts, $item, $args) {
	$atts['id'] = hash('crc32', $item->title . $item->post_name);
	return $atts;
}
add_filter('nav_menu_link_attributes', 'add_id_to_menu_links', 10, 3);

add_action( 'template_redirect', 'disable_press_link_single_post' );

/* Social Media Accounts Structured Data for Search Engines */
function add_structured_data_header() {
?>
<script type=”application/ld+json”>
{
	“@context” : “http://schema.org”,
	“@type” : “Organization”,
	“name” : “A-Lodge”,
	“url” : “https://a-lodge.com”,
	“sameAs” : [
		“https://www.facebook.com/alodge”,
		“https://www.instagram.com/alodge/”,
		“https://twitter.com/alodge”,
		“https://www.linkedin.com/in/alodge/”,
		"https://vans.a-lodge.com",
		"https://lyons.a-lodge.com",
		"https://boulder.a-lodge.com"
	]
}
</script>
<?php
}
add_action('wp_head', 'add_structured_data_header');

/**
 * including this here so I can just refer to the function anywhere I want to use it.
 */
include get_template_directory() . '/partials/general-sections.php';
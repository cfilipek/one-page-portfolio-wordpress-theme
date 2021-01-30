<?php
/**
 * onepageportfolio functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package onepageportfolio
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'onepageportfolio_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function onepageportfolio_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on onepageportfolio, use a find and replace
		 * to change 'onepageportfolio' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'onepageportfolio', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
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
				'menu-1' => esc_html__( 'Primary', 'onepageportfolio' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'onepageportfolio_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'onepageportfolio_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function onepageportfolio_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'onepageportfolio_content_width', 640 );
}
add_action( 'after_setup_theme', 'onepageportfolio_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function onepageportfolio_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'onepageportfolio' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'onepageportfolio' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'onepageportfolio_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function onepageportfolio_scripts() {
	wp_enqueue_style( 'onepageportfolio-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'onepageportfolio-style', 'rtl', 'replace' );
	
		//here we load our custom.css file
		wp_enqueue_style( 'onepageportfolio-custom', get_template_directory_uri() . '/css/custom.css');

	wp_enqueue_script( 'onepageportfolio-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'onepageportfolio_scripts' );

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

// Register Custom Post Type
function custom_post_type() {

	$labels = array(
		'name'                  => _x( 'About', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'About', 'Post Type Singular Name', 'text_domain' ),
	);
	$args = array(
		'labels'                => $labels,
		'taxonomies'            => array( 'category' ),
		'public'                => true,
	);
	register_post_type( 'about', $args );

}
add_action( 'init', 'custom_post_type', 0 );


// Register Custom Post Type
function add_des_projects() {

	$labels = array(
		'name'                  => _x( 'Projects-des', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Project-des', 'Post Type Singular Name', 'text_domain' ),
	);
	$args = array(
		'labels'                => $labels,
		'taxonomies'            => array( 'category' ),
		'public'                => true,
	);
	register_post_type( 'project_des', $args );

}
add_action( 'init', 'add_des_projects', 0 );

// Register Custom Post Type
function add_dev_projects() {

	$labels = array(
		'name'                  => _x( 'Projects-dev', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Project-dev', 'Post Type Singular Name', 'text_domain' ),
	);
	$args = array(
		'labels'                => $labels,
		'taxonomies'            => array( 'category' ),
		'public'                => true,
	);
	register_post_type( 'project_dev', $args );

}
add_action( 'init', 'add_dev_projects', 0 );

add_action( 'wp_enqueue_scripts', 'tthq_add_custom_fa_css' );

function tthq_add_custom_fa_css() {
wp_enqueue_style( 'custom-fa', 'https://use.fontawesome.com/releases/v5.0.6/css/all.css' );
}

// Register Custom Post Type
function add_contact_form() {

	$labels = array(
		'name'                  => _x( 'Contacts', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Contact', 'Post Type Singular Name', 'text_domain' ),
	);
	$args = array(
		'labels'                => $labels,
		'taxonomies'            => array( 'category' ),
		'public'                => true,
	);
	register_post_type( 'contact', $args );

}
add_action( 'init', 'add_contact_form', 0 );
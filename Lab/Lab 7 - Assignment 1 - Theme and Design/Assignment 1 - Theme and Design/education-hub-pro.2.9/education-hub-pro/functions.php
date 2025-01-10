<?php
/**
 * Education Hub functions and definitions.
 *
 * @link https://codex.wordpress.org/Functions_File_Explained
 *
 * @package Education_Hub
 */

if ( ! function_exists( 'education_hub_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function education_hub_setup() {
		/*
		 * Make theme available for translation.
		 */
		load_theme_textdomain( 'education-hub', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 */
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'education-hub-thumb', 360, 270 );

		// This theme uses wp_nav_menu() in four location.
		register_nav_menus( array(
			'primary'     => esc_html__( 'Primary Menu', 'education-hub' ),
			'footer'      => esc_html__( 'Footer Menu', 'education-hub' ),
			'social'      => esc_html__( 'Social Menu', 'education-hub' ),
			'quick-links' => esc_html__( 'Quick Links Menu', 'education-hub' ),
			'notfound'    => esc_html__( '404 Menu', 'education-hub' ),
		) );

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

		/*
		 * Enable support for Post Formats.
		 */
		add_theme_support( 'post-formats', array(
			'aside',
			'image',
			'video',
			'quote',
			'link',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'education_hub_custom_background_args', array(
			'default-color'    => 'dfdfd0',
			'default-image'    => '',
			'wp-head-callback' => 'education_hub_custom_background_cb',
		) ) );

		/*
		 * Enable support for selective refresh of widgets in Customizer.
		 */
		add_theme_support( 'customize-selective-refresh-widgets' );

		/*
		 * Add editor style.
		 */
		$min = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
		add_editor_style( 'css/editor-style' . $min . '.css' );

		// Enable support for footer widgets.
		add_theme_support( 'footer-widgets', 4 );

		/*
		 * Enable support for custom logo.
		 */
		add_theme_support( 'custom-logo' );

		/**
		 * Enable support for WooCommerce
		 */
		add_theme_support( 'woocommerce' );
		add_theme_support( 'wc-product-gallery-lightbox' );

		// Load Supports.
		require get_template_directory() . '/inc/support.php';

		global $education_hub_default_options;
		$education_hub_default_options = education_hub_get_default_theme_options();

	}
endif;

add_action( 'after_setup_theme', 'education_hub_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function education_hub_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'education_hub_content_width', 640 );
}
add_action( 'after_setup_theme', 'education_hub_content_width', 0 );

/**
 * Register widget area.
 */
function education_hub_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Primary Sidebar', 'education-hub' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here to appear in your Primary Sidebar.', 'education-hub' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Secondary Sidebar', 'education-hub' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__( 'Add widgets here to appear in your Secondary Sidebar.', 'education-hub' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Front Page Widget Area', 'education-hub' ),
		'id'            => 'sidebar-front-page-widget-area',
		'description'   => esc_html__( 'Add widgets here to appear in your Front Page.', 'education-hub' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Front Page Lower Widget Area', 'education-hub' ),
		'id'            => 'sidebar-front-page-widget-area-lower',
		'description'   => esc_html__( 'Add widgets here to appear in your Front Page.', 'education-hub' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => sprintf( __( 'Extra Sidebar %d', 'education-hub' ), 1 ),
		'id'            => 'extra-sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => sprintf( __( 'Extra Sidebar %d', 'education-hub' ), 2 ),
		'id'            => 'extra-sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => sprintf( __( 'Extra Sidebar %d', 'education-hub' ), 3 ),
		'id'            => 'extra-sidebar-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => sprintf( __( 'Extra Sidebar %d', 'education-hub' ), 4 ),
		'id'            => 'extra-sidebar-4',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'education_hub_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function education_hub_scripts() {

	$min = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/third-party/font-awesome/css/font-awesome' . $min . '.css', '', '4.7.0' );

	$fonts_url = education_hub_fonts_url();
	if ( ! empty( $fonts_url ) ) {
		wp_enqueue_style( 'education-hub-google-fonts', $fonts_url, array(), null );
	}

	wp_enqueue_style( 'education-hub-style', get_stylesheet_uri(), array(), '2.9.0' );

	if ( has_header_image() ) {
		$custom_css = '#masthead{ background-image: url("' . esc_url( get_header_image() ) . '"); background-repeat: no-repeat; background-position: center center; }';
		wp_add_inline_style( 'education-hub-style', $custom_css );
	}

	wp_enqueue_script( 'education-hub-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix' . $min . '.js', array(), '20130115', true );

	wp_enqueue_script( 'jquery-cycle2', get_template_directory_uri() . '/third-party/cycle2/js/jquery.cycle2' . $min . '.js', array( 'jquery' ), '2.1.6', true );

	wp_enqueue_script( 'jquery-easy-ticker', get_template_directory_uri() . '/third-party/ticker/jquery.easy-ticker' . $min . '.js', array( 'jquery' ), '2.0', true );

	wp_enqueue_script( 'education-hub-custom', get_template_directory_uri() . '/js/custom' . $min . '.js', array( 'jquery' ), '1.0', true );

	wp_register_script( 'education-hub-navigation', get_template_directory_uri() . '/js/navigation' . $min . '.js', array(), '20160421', true );
	wp_localize_script( 'education-hub-navigation', 'Education_Hub_Screen_Reader_Text', array(
			'expand'   => '<span class="screen-reader-text">' . __( 'expand child menu', 'education-hub' ) . '</span>',
			'collapse' => '<span class="screen-reader-text">' . __( 'collapse child menu', 'education-hub' ) . '</span>',
	) );
	wp_enqueue_script( 'education-hub-navigation' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'education_hub_scripts' );

/**
 * Load init.
 */
require get_template_directory() . '/inc/init.php';

/**
 * Load theme updater functions.
 */
function education_hub_theme_updater() {
	if( is_admin() ) {
		require_once get_template_directory() . '/updater/theme-updater.php';
	}
}

add_action( 'after_setup_theme', 'education_hub_theme_updater' );

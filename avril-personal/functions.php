<?php
if ( ! function_exists( 'avril_setup' ) ) :
function avril_setup() {

/**
 * Define Constants
 */
define( 'AVRIL_THEME_VERSION', '1.0.40' );

// Root path/URI.
define( 'AVRIL_PARENT_DIR', get_template_directory() );
define( 'AVRIL_PARENT_URI', get_template_directory_uri() );

// Root path/URI.
define( 'AVRIL_PARENT_INC_DIR', AVRIL_PARENT_DIR . '/inc');
define( 'AVRIL_PARENT_INC_URI', AVRIL_PARENT_URI . '/inc');

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 */
	add_theme_support( 'title-tag' );
	
	add_theme_support( 'custom-header' );
	
	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 */
	add_theme_support( 'post-thumbnails' );
	
	//Add selective refresh for sidebar widget
	add_theme_support( 'customize-selective-refresh-widgets' );
	
	/*
	 * Make theme available for translation.
	 */
	load_theme_textdomain( 'avril-pro' );
		
	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary_menu' => esc_html__( 'Primary Menu', 'avril-pro' ),
		'footer_menu' => esc_html__( 'Footer Menu', 'avril-pro' ),
		'header_above_menu' => esc_html__( 'Header Above Menu', 'avril-pro' ),
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
	
	
	add_theme_support('custom-logo');
	
	/*
	 * WooCommerce Plugin Support
	 */
	add_theme_support( 'woocommerce' );
	
	// Gutenberg wide images.
		add_theme_support( 'align-wide' );
	
	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'assets/css/editor-style.css', avril_google_font() ) );
	
	//Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'avril_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'avril_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function avril_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'avril_content_width', 1170 );
}
add_action( 'after_setup_theme', 'avril_content_width', 0 );


/**
 * All Styles & Scripts.
 */
require_once get_template_directory() . '/inc/enqueue.php';

/**
 * Nav Walker fo Bootstrap Dropdown Menu.
 */

require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';

/**
 * Implement the Custom Header feature.
 */
require_once get_template_directory() . '/inc/custom-header.php';


/**
 * Called Breadcrumb
 */
require_once get_template_directory() . '/inc/breadcrumb/breadcrumb.php';

/**
 * Sidebar.
 */
require_once get_template_directory() . '/inc/sidebar/sidebar.php';

/**
 * Custom template tags for this theme.
 */
require_once get_template_directory() . '/inc/template-tags.php';

/**
 * Dynamic Style
 */
require_once get_template_directory() . '/inc/dynamic_style.php';
/**
 * Custom functions that act independently of the theme templates.
 */
require_once get_template_directory() . '/inc/extras.php';


/**
 * Customizer additions.
 */
 require_once get_template_directory() . '/inc/avril-customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require_once get_template_directory() . '/inc/jetpack.php';


/**
 * Customizer additions.
 */
 require get_template_directory() . '/inc/customizer/customizer-repeater/functions.php';
 
/**
 * CPT
 */
 require get_template_directory() . '/inc/cpt/cpt-main.php';
 
/**
 * Shortcode
 */
 require get_template_directory() . '/inc/shortcode/shortcode.php';


/**
 * Load Theme Updator File.
 */
function avril_theme_updater() {
	require( get_template_directory() . '/inc/updater/theme-updater.php' );
}
add_action( 'after_setup_theme', 'avril_theme_updater' );

/**
 * Called Required Plugin Features
 */
require( get_template_directory() . '/inc/required-plugin/index.php');

/**
 * Called Demo Import Features
 */
require( get_template_directory() . '/inc/demo-import/index.php');

/**
 * Hooks.
 */
require_once get_template_directory() . '/inc/hooks/avril-hooks-settings.php';
require_once get_template_directory() . '/inc/hooks/functions.php';
require_once get_template_directory() . '/inc/avril-hooks.php';


function woocommerce_product_loop_start() { 
echo '<div class="av-container woo-container"><div class="av-columns-area">'; 
}

function woocommerce_product_loop_end() { 
echo '</div></div>'; 
}
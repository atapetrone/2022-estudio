<?php
 /**
 * Enqueue scripts and styles.
 */
function avril_scripts() {
	
	// Styles	
	wp_enqueue_style('owl-carousel-min',get_template_directory_uri().'/assets/css/owl.carousel.min.css');

	wp_enqueue_style('owl-theme-default-min',get_template_directory_uri().'/assets/css/owl.theme.default.min.css');
	
	wp_enqueue_style('font-awesome',get_template_directory_uri().'/assets/css/fonts/font-awesome/css/font-awesome.min.css');
	
	wp_enqueue_style('animate',get_template_directory_uri().'/assets/css/animate.css');
	
	wp_enqueue_style('text-animate',get_template_directory_uri().'/assets/css/text-animate.css');
	
	wp_enqueue_style('magnific-popup',get_template_directory_uri().'/assets/css/magnific-popup.css');
	
	wp_enqueue_style('avril-editor-style',get_template_directory_uri().'/assets/css/editor-style.css');

	wp_enqueue_style('avril-default', get_template_directory_uri() . '/assets/css/color/default.css');

	wp_enqueue_style('avril-theme-css',get_template_directory_uri().'/assets/css/theme.css');

	wp_enqueue_style('avril-menus', get_template_directory_uri() . '/assets/css/menu.css');

	wp_enqueue_style('avril-widgets',get_template_directory_uri().'/assets/css/widgets.css');

	wp_enqueue_style('avril-main', get_template_directory_uri() . '/assets/css/main.css');
	
	wp_enqueue_style('avril-media-query', get_template_directory_uri() . '/assets/css/responsive.css');

	wp_enqueue_style('avril-woocommerce',get_template_directory_uri().'/assets/css/woo.css');
	
	wp_enqueue_style( 'avril-style', get_stylesheet_uri() );
	
	// Scripts
	wp_enqueue_script( 'jquery' );
	
	wp_enqueue_script('owl-carousel', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array('jquery'), true);

	wp_enqueue_script('jquery-ripples', get_template_directory_uri() . '/assets/js/jquery.ripples.min.js', array('jquery'),false, true);
	
	wp_enqueue_script('isotope-pkgd', get_template_directory_uri() . '/assets/js/isotope.pkgd.js', array('jquery'), true);
	
	wp_enqueue_script('countdown', get_template_directory_uri() . '/assets/js/countdown.js', array('jquery'), false, true);
	
	wp_enqueue_script('counterup', get_template_directory_uri() . '/assets/js/jquery.counterup.min.js', array('jquery'), false, true);
	
	wp_enqueue_script('magnific-popup', get_template_directory_uri() . '/assets/js/jquery.magnific-popup.min.js', array('jquery'), false, true);
	
	wp_enqueue_script('wow-min', get_template_directory_uri() . '/assets/js/wow.min.js', array('jquery'), false, true);
	
	wp_enqueue_script('circle-progress', get_template_directory_uri() . '/assets/js/circle-progress.min.js', array('jquery'), false, true);
	
	wp_enqueue_script('text-animate', get_template_directory_uri() . '/assets/js/text-animate.js', array('jquery'), false, true);

	wp_enqueue_script('avril-custom-js', get_template_directory_uri() . '/assets/js/custom.js', array('jquery'), false, true);
	
	wp_enqueue_script('avril-map-link', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyAqoWGSQYygV-G1P5tVrj-dM2rVHR5wOGY');

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'avril_scripts' );

//Admin Enqueue for Admin
function avril_admin_enqueue_scripts(){
	wp_enqueue_style('avril-admin-style', get_template_directory_uri() . '/inc/customizer/assets/css/admin.css');
}
add_action( 'admin_enqueue_scripts', 'avril_admin_enqueue_scripts' );
?>
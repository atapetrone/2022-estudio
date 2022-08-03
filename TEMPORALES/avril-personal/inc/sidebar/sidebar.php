<?php	
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package avril
 */

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */

function avril_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Header Widget Area 1', 'avril-pro' ),
		'id' => 'avril-header-above-first',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h5 class="widget-title">',
		'after_title' => '</h5>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Header Widget Area 2', 'avril-pro' ),
		'id' => 'avril-header-above-second',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h5 class="widget-title">',
		'after_title' => '</h5>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Sidebar Widget Area', 'avril-pro' ),
		'id' => 'avril-sidebar-primary',
		'description' => __( 'The Primary Widget Area', 'avril-pro' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h5 class="widget-title">',
		'after_title' => '</h5>',
	) );
	
	$footer_widget_layout = get_theme_mod('footer_widget_layout','4');
	for ($i=1; $i<=$footer_widget_layout; $i++) {
		register_sidebar( array(
			'name' => __( 'Footer  ', 'avril-pro' )  . $i,
			'id' => 'footer-' . $i,
			'description' => __( 'The Footer Widget Area', 'avril-pro' )  . $i,
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h5 class="widget-title">',
			'after_title' => '</h5>',
		) );
	}
	
	 
	register_sidebar( array(
		'name' => __( 'Footer Layout Section 1', 'avril-pro' ),
		'id' => 'avril-footer-layout-first',
		'description' => __( 'The Footer Layout Left', 'avril-pro' ),
		'before_widget' => ' <div class="widget-left text-av-left text-center"><aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside></div>',
		'before_title' => '<h5 class="widget-title">',
		'after_title' => '</h5>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Footer Layout Section 2', 'avril-pro' ),
		'id' => 'avril-footer-layout-second',
		'description' => __( 'The Footer Layout Second', 'avril-pro' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h5 class="widget-title">',
		'after_title' => '</h5>',
	) );
	
	register_sidebar( array(
		'name' => __( 'WooCommerce Widget Area', 'avril-pro' ),
		'id' => 'avril-woocommerce-sidebar',
		'description' => __( 'This Widget area for WooCommerce Widget', 'avril-pro' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h5 class="widget-title">',
		'after_title' => '</h5>',
	) );
}
add_action( 'widgets_init', 'avril_widgets_init' );
?>
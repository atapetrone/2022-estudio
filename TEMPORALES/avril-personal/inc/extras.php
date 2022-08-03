<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package avril
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function avril_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}
	
	// Header Type
	$avril_header_type	=	get_theme_mod('avril_header_type','header-default');
	$classes[] = esc_attr($avril_header_type);

	// Footer Type
	$avril_footer_type	=	get_theme_mod('avril_footer_type','footer-dark');
	$classes[] = esc_attr($avril_footer_type);
	
	return $classes;
}
add_filter( 'body_class', 'avril_body_classes' );

if ( ! function_exists( 'wp_body_open' ) ) {
	/**
	 * Backward compatibility for wp_body_open hook.
	 *
	 * @since 1.0.0
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
}

if (!function_exists('avril_str_replace_assoc')) {

    /**
     * avril_str_replace_assoc
     * @param  array $replace
     * @param  array $subject
     * @return array
     */
    function avril_str_replace_assoc(array $replace, $subject) {
        return str_replace(array_keys($replace), array_values($replace), $subject);
    }
}

// Comments Counts
if ( ! function_exists( 'avril_comment_count' ) ) :
function avril_comment_count() {
	$avril_comments_count 	= get_comments_number();
	if ( 0 === intval( $avril_comments_count ) ) {
		echo esc_html__( '0 Comments', 'avril-pro' );
	} else {
		/* translators: %s Comment number */
		 echo sprintf( _n( '%s Comment', '%s Comments', $avril_comments_count, 'avril-pro' ), number_format_i18n( $avril_comments_count ) );
	}
} 
endif;

//Background Image Pattern
function avril_background_pattern()
{
	$bg_pattern = get_theme_mod('bg_pattern','bg-img1.png');
	if($bg_pattern!='')
	{
	echo '<style>body.boxed { background:url("'.get_template_directory_uri().'/assets/images/bg-pattern/'.$bg_pattern.'");}</style>';
	}
}
add_action('wp_head','avril_background_pattern',10,0);


/**
 * Display Sidebars
 */
if ( ! function_exists( 'avril_get_sidebars' ) ) {
	/**
	 * Get Sidebar
	 *
	 * @since 1.0
	 * @param  string $sidebar_id   Sidebar Id.
	 * @return void
	 */
	function avril_get_sidebars( $sidebar_id ) {
		if ( is_active_sidebar( $sidebar_id ) ) {
			dynamic_sidebar( $sidebar_id );
		} elseif ( current_user_can( 'edit_theme_options' ) ) {
			?>
			<div class="widget">
				<p class='no-widget-text'>
					<a href='<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>'>
						<?php esc_html_e( 'Add Widget', 'avril-pro' ); ?>
					</a>
				</p>
			</div>
			<?php
		}
	}
}

/**
 * Get registered sidebar name by sidebar ID.
 *
 * @since  1.0.0
 * @param  string $sidebar_id Sidebar ID.
 * @return string Sidebar name.
 */
function avril_get_sidebar_name_by_id( $sidebar_id = '' ) {

	if ( ! $sidebar_id ) {
		return;
	}

	global $wp_registered_sidebars;
	$sidebar_name = '';

	if ( isset( $wp_registered_sidebars[ $sidebar_id ] ) ) {
		$sidebar_name = $wp_registered_sidebars[ $sidebar_id ]['name'];
	}

	return $sidebar_name;
}

// Avril Footer Group First
if ( ! function_exists( 'avril_footer_group_first' ) ) :
function avril_footer_group_first() {
	$footer_bottom_1 			= get_theme_mod('footer_bottom_1','custom');	
	$footer_first_custom 		= get_theme_mod('footer_first_custom','Copyright &copy; [current_year] [site_title] | Powered by [theme_author]');	
		// Custom
		if($footer_bottom_1 == 'custom'): ?>
			<?php  if ( ! empty( $footer_first_custom ) ){ ?>
				<?php 	
					$avril_copyright_allowed_tags = array(
						'[current_year]' => date_i18n('Y'),
						'[site_title]'   => get_bloginfo('name'),
						'[theme_author]' => sprintf(__('<a href="#">Avril WordPress Theme</a>', 'avril-pro')),
					);
				?>
				<div class="widget-center text-av-center text-center">                          
					<div class="copyright-text">
						<?php
							echo apply_filters('avril_footer_copyright', wp_kses_post(avril_str_replace_assoc($avril_copyright_allowed_tags, $footer_first_custom)));
						?>
					</div>
				</div>
			<?php } ?>
		<?php endif;
		
		// Widget
		 if($footer_bottom_1 == 'widget'): ?>
			<?php  avril_get_sidebars( 'avril-footer-layout-first' ); ?>
		<?php endif; 
		
		// Menu
		 if($footer_bottom_1 == 'menu'): ?>
			<aside class="widget widget_nav_menu">
				<div class="menu-pages-container">
					<?php 
						wp_nav_menu( 
							array(  
								'theme_location' => 'footer_menu',
								'container'  => '',
								'menu_class' => 'menu',
								'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
								'walker' => new WP_Bootstrap_Navwalker()
								 ) 
							);
					?>   
				</div>
			</aside>	
		<?php endif; ?>
	<?php 
	} 
endif;


// Avril Footer Group Second
if ( ! function_exists( 'avril_footer_group_second' ) ) :
function avril_footer_group_second() {
	$footer_bottom_2 			= get_theme_mod('footer_bottom_2','none');	
	$footer_second_custom 		= get_theme_mod('footer_second_custom');
		// Custom
		 if($footer_bottom_2 == 'custom'): ?>
			<?php 	
				$avril_copyright_allowed_tags = array(
					'[current_year]' => date_i18n('Y'),
					'[site_title]'   => get_bloginfo('name'),
					'[theme_author]' => sprintf(__('<a href="#">Avril WordPress Theme</a>', 'avril-pro')),
				);
			?>
			<div class="widget-center text-av-center text-center">                          
				<div class="copyright-text">
					<?php
						echo apply_filters('avril_footer_copyright', wp_kses_post(avril_str_replace_assoc($avril_copyright_allowed_tags, $footer_second_custom)));
					?>
				</div>
			</div>
		<?php endif; 
		
		// Widget
		 if($footer_bottom_2 == 'widget'): ?>
			<?php  avril_get_sidebars( 'avril-footer-layout-second' ); ?>
		<?php endif; 
		
		// Menu
		 if($footer_bottom_2 == 'menu'): ?>
			<aside class="widget widget_nav_menu">
				<div class="menu-pages-container">
					<?php 
						wp_nav_menu( 
							array(  
								'theme_location' => 'footer_menu',
								'container'  => '',
								'menu_class' => 'menu',
								'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
								'walker' => new WP_Bootstrap_Navwalker()
								 ) 
							);
					?>   
				</div>
			</aside>	
		<?php endif; ?>
	<?php 
	} 
endif;	



/**
 * Avril Above Header First
 */
if ( ! function_exists( 'avril_abv_hdr_group_1' ) ) {
	function avril_abv_hdr_group_1() {
		//above_header_first
		$above_header_first 			= get_theme_mod('above_header_first','social');	
		$hide_show_social_icon 		= get_theme_mod( 'hide_show_social_icon','1'); 
		$social_icons 				= get_theme_mod( 'social_icons',avril_get_social_icon_default());	
		$abv_hdr_first_shortcode 		= get_theme_mod('abv_hdr_first_shortcode');
		// Custom
			if($above_header_first == 'social'): ?>
				<?php if($hide_show_social_icon == '1') { ?>
					<aside class="widget widget_social_widget">
						<ul>
							<?php
								$social_icons = json_decode($social_icons);
								if( $social_icons!='' )
								{
								foreach($social_icons as $social_item){	
								$social_icon = ! empty( $social_item->icon_value ) ? apply_filters( 'avril_translate_single_string', $social_item->icon_value, 'Header section' ) : '';	
								$social_link = ! empty( $social_item->link ) ? apply_filters( 'avril_translate_single_string', $social_item->link, 'Header section' ) : '';
							?>
								<li><a href="<?php echo esc_url( $social_link ); ?>"><i class="fa <?php echo esc_attr( $social_icon ); ?>"></i></a></li>
							<?php }} ?>
						</ul>
					</aside>
				<?php } ?>
		<?php endif;
		
		// Widget
			 if($above_header_first == 'widget'): 
				$avril_above_widget_first = 'avril-header-above-first';
				  	if ( is_active_sidebar( $avril_above_widget_first ) ){ 
							dynamic_sidebar( 'avril-header-above-first' );
					}elseif ( current_user_can( 'edit_theme_options' ) ) {
						$avril_sidebar_name = avril_get_sidebar_name_by_id( $avril_above_widget_first );
						?>
						<div class="widget widget_none">
							<h4 class='widget-title'><?php echo esc_html( $avril_sidebar_name ); ?></h4>
							<p>
								<?php if ( is_customize_preview() ) { ?>
									<a href="JavaScript:Void(0);" class="" data-sidebar-id="<?php echo esc_attr( $avril_above_widget_first ); ?>">
								<?php } else { ?>
									<a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>">
								<?php } ?>
									<?php esc_html_e( 'Please assign a widget here.', 'avril-pro' ); ?>
								</a>
							</p>
						</div>
						<?php
					} 
			endif; 
		// Menu
		
			 if($above_header_first == 'menu'): ?>
				 <aside class="widget widget_nav_menu">
					<div class="menu-pages-container">
					<?php 
						wp_nav_menu( 
							array(  
								'theme_location' => 'header_above_menu',
								'container'  => '',
								'menu_class' => 'menu-wrap',
								'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
								'walker' => new WP_Bootstrap_Navwalker()
								 ) 
							);
						?>
						</div>
					</aside>	
						<?php
				 endif; 
		// Shortcode
			if($above_header_first == 'shortcode'): ?>
				<?php  if ( ! empty( $abv_hdr_first_shortcode ) ){ ?>
					<p class="m-0px"><?php echo do_shortcode($abv_hdr_first_shortcode); ?></p>
		<?php }endif;		
	}
}
add_action( 'avril_abv_hdr_data_first', 'avril_abv_hdr_group_1' );




/**
 * Avril Above Header Second
 */
if ( ! function_exists( 'avril_abv_hdr_group_2' ) ) {
	function avril_abv_hdr_group_2() {
		//above_header_second
		$above_header_second 			= get_theme_mod('above_header_second','contact');
		$abv_hdr_second_shortcode 		= get_theme_mod('abv_hdr_second_shortcode');
		
			// contact
				if($above_header_second == 'contact'): ?>
					
						<?php 
							$hide_show_cntct_details 	= get_theme_mod( 'hide_show_cntct_details','1'); $tlh_contct_icon 			= get_theme_mod( 'tlh_contct_icon','fa-clock-o'); 	
							$tlh_contact_title 			= get_theme_mod( 'tlh_contact_title','8:00AM - 6:00PM'); 
							$tlh_contact_sbtitle 		= get_theme_mod( 'tlh_contact_sbtitle','Monday to Saturday'); 
						?>
						<?php if($hide_show_cntct_details == '1') { ?>
							<aside class="widget widget-contact wgt-1">
								<div class="contact-area">
									<div class="contact-icon">
									   <i class="fa <?php echo  esc_attr($tlh_contct_icon); ?>"></i>
									</div>
									<a href="javascript:void(0)" class="contact-info">
										<span class="text"><?php echo esc_html($tlh_contact_title); ?></span>
										<span class="title"><?php echo esc_html($tlh_contact_sbtitle); ?></span>
									</a>
								</div>
							</aside>
						<?php } ?>
					<?php 
						$hide_show_email_details 	= get_theme_mod( 'hide_show_email_details','1');
						$tlh_email_icon 			= get_theme_mod( 'tlh_email_icon','fa-phone'); 	
						$tlh_email_title 			= get_theme_mod( 'tlh_email_title','Email Us'); 
						$tlh_email_sbtitle 			= get_theme_mod( 'tlh_email_sbtitle','email@email.com'); 
					?>	
					<?php if($hide_show_email_details == '1') { ?>
						<aside class="widget widget-contact wgt-2">
							<div class="contact-area">
								<div class="contact-icon">
									<i class="fa <?php echo  esc_attr($tlh_email_icon); ?>"></i>
								</div>
								<a href="mailto:email@email.com" class="contact-info">
									<span class="text"><?php echo esc_html($tlh_email_title); ?></span>
									<span class="title"><?php echo esc_html($tlh_email_sbtitle); ?></span>
								</a>
							</div>
						</aside>
					<?php } ?>	
					<?php 
						$hide_show_mbl_details 		= get_theme_mod( 'hide_show_mbl_details','1'); 	
						$tlh_mobile_icon 			= get_theme_mod( 'tlh_mobile_icon','fa-map-marker');
						$tlh_mobile_title 			= get_theme_mod( 'tlh_mobile_title','Online 24x7'); 
						$tlh_mobile_sbtitle 		= get_theme_mod( 'tlh_mobile_sbtitle','5589953904'); 
					?>
					<?php if($hide_show_mbl_details == '1') { ?>
						<aside class="widget widget-contact wgt-3">
							<div class="contact-area">
								<div class="contact-icon">
									<i class="fa <?php echo  esc_attr($tlh_mobile_icon); ?>"></i>
								</div>
								<a href="tel:5589953904" class="contact-info">
									<span class="text"><?php echo esc_html($tlh_mobile_title); ?></span>
									<span class="title"><?php echo esc_html($tlh_mobile_sbtitle); ?></span>
								</a>
							</div>
						</aside>
					<?php } ?>		
			<?php endif;
			
			// Widget
				 if($above_header_second == 'widget'):  
					  $avril_above_widget_second = 'avril-header-above-second';
				  	if ( is_active_sidebar( $avril_above_widget_second ) ){ 
							dynamic_sidebar( 'avril-header-above-second' );
					}elseif ( current_user_can( 'edit_theme_options' ) ) {
						$avril_sidebar_name = avril_get_sidebar_name_by_id( $avril_above_widget_second );
						?>
						<div class="widget widget_none">
							<h4 class='widget-title'><?php echo esc_html( $avril_sidebar_name ); ?></h4>
							<p>
								<?php if ( is_customize_preview() ) { ?>
									<a href="JavaScript:Void(0);" class="" data-sidebar-id="<?php echo esc_attr( $avril_above_widget_second ); ?>">
								<?php } else { ?>
									<a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>">
								<?php } ?>
									<?php esc_html_e( 'Please assign a widget here.', 'avril-pro' ); ?>
								</a>
							</p>
						</div>
						<?php
					} 
				endif; 
			// Menu
				 if($above_header_second == 'menu'): 
				 ?>
				  <aside class="widget widget_nav_menu">
					<div class="menu-pages-container">
						 <?php
								wp_nav_menu( 
									array(  
										'theme_location' => 'header_above_menu',
										'container'  => '',
										'menu_class' => 'menu-wrap',
										'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
										'walker' => new WP_Bootstrap_Navwalker()
										 ) 
									);
							?>
						</div>
					</aside>	
					<?php			
					 endif; 
			// Shortcode
				if($above_header_second == 'shortcode'): ?>
					<?php  if ( ! empty( $abv_hdr_second_shortcode ) ){ ?>
						<p class="m-0px"><?php echo do_shortcode($abv_hdr_second_shortcode); ?></p>
			<?php }endif;	
	}
}
add_action( 'avril_abv_hdr_data_second', 'avril_abv_hdr_group_2' );

 /**
 * Add WooCommerce Cart Icon With Cart Count (https://isabelcastillo.com/woocommerce-cart-icon-count-theme-header)
 */
function avril_add_to_cart_fragment( $fragments ) {
	
    ob_start();
    $count = WC()->cart->cart_contents_count;
	$header_cart				= get_theme_mod('header_cart','fa-shopping-cart'); 
    ?> 
	<a href="javascript:void(0)" class="cart-icon-wrap" id="cart" title="View your shopping cart"><i class="fa fa-cart-arrow-down"></i>
	<?php
    if ( $count > 0 ) { 
	?>
        <span><?php echo esc_html( $count ); ?></span>
	<?php            
    } else {
	?>	
		<span>0</span>
	<?php
	}
    ?></a><?php
 
    $fragments['a.cart-icon-wrap'] = ob_get_clean();
     
    return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'avril_add_to_cart_fragment' );



// Activate WordPress Maintenance Mode
$enable_comming_soon = get_theme_mod('enable_comming_soon');
  if($enable_comming_soon == '1') { 
	function wp_maintenance_mode() {
		if (!current_user_can('edit_themes') || !is_user_logged_in()) {
		   // wp_die('<h1>Under Maintenance</h1><br />Something aint right, but we are working on it! Check back later.');
		   $file = get_template_directory() . '/inc/maintenance.php';
				include($file);
				exit();
		}
	}
	add_action('get_header', 'wp_maintenance_mode');
 }
/*
 *
 * Social Icon
 */
function avril_get_social_icon_default() {
	return apply_filters(
		'avril_get_social_icon_default', json_encode(
				 array(
				array(
					'icon_value'	  =>  esc_html__( 'fa-facebook', 'avril-pro' ),
					'link'	  =>  esc_html__( '#', 'avril-pro' ),
					'id'              => 'customizer_repeater_header_social_001',
				),
				array(
					'icon_value'	  =>  esc_html__( 'fa-google-plus', 'avril-pro' ),
					'link'	  =>  esc_html__( '#', 'avril-pro' ),
					'id'              => 'customizer_repeater_header_social_002',
				),
				array(
					'icon_value'	  =>  esc_html__( 'fa-twitter', 'avril-pro' ),
					'link'	  =>  esc_html__( '#', 'avril-pro' ),
					'id'              => 'customizer_repeater_header_social_003',
				),
				array(
					'icon_value'	  =>  esc_html__( 'fa-linkedin', 'avril-pro' ),
					'link'	  =>  esc_html__( '#', 'avril-pro' ),
					'id'              => 'customizer_repeater_header_social_004',
				),
				array(
					'icon_value'	  =>  esc_html__( 'fa-behance', 'avril-pro' ),
					'link'	  =>  esc_html__( '#', 'avril-pro' ),
					'id'              => 'customizer_repeater_header_social_005',
				),
				array(
					'icon_value'	  =>  esc_html__( 'fa-vimeo', 'avril-pro' ),
					'link'	  =>  esc_html__( '#', 'avril-pro' ),
					'id'              => 'customizer_repeater_header_social_006',
				),
				array(
					'icon_value'	  =>  esc_html__( 'fa-skype', 'avril-pro' ),
					'link'	  =>  esc_html__( '#', 'avril-pro' ),
					'id'              => 'customizer_repeater_header_social_007',
				),
			)
		)
	);
}

/*
 *
 * Footer Above Default
 */
 function avril_get_footer_above_default() {
	return apply_filters(
		'avril_get_footer_above_default', json_encode(
				 array(
				array(
					'icon_value'       => 'fa-support',
					'title'           => esc_html__( 'Live Chat Support', 'avril-pro' ),
					'text'            => esc_html__( 'Lorem Ipsum simply dummy text printing.', 'avril-pro' ),
					'link'	  =>  esc_html__( '#', 'avril-pro' ),
					'id'              => 'customizer_repeater_footer_above_001',
					
				),
				array(
					'icon_value'       => 'fa-wechat',
					'title'           => esc_html__( 'Send Ticket', 'avril-pro' ),
					'text'            => esc_html__( 'Lorem Ipsum simply dummy text printing.', 'avril-pro' ),
					'link'	  =>  esc_html__( '#', 'avril-pro' ),
					'id'              => 'customizer_repeater_footer_above_002',
				
				),
				array(
					'icon_value'       => 'fa-file-zip-o',
					'title'           => esc_html__( 'Knowledge Base', 'avril-pro' ),
					'text'            => esc_html__( 'Lorem Ipsum simply dummy text printing.', 'avril-pro' ),
					'link'	  =>  esc_html__( '#', 'avril-pro' ),
					'id'              => 'customizer_repeater_footer_above_003',
			
				),
			)
		)
	);
}


/*
 *
 * Slider Default
 */
 function avril_get_slider_default() {
	return apply_filters(
		'avril_get_slider_default', json_encode(
				 array(
				array(
					'image_url'       => get_template_directory_uri() . '/assets/images/slider/img01.jpg',
					'title'           => esc_html__( 'Global Project Managment', 'avril-pro' ),
					'subtitle'         => esc_html__( 'Services & Solutions', 'avril-pro' ),
					'text'            => esc_html__( 'There are many variations of passages of Lorem Ipsum available but the majority have suffered injected humour dummy now.', 'avril-pro' ),
					'text2'	  =>  esc_html__( 'Get Started', 'avril-pro' ),
					'link'	  =>  esc_html__( '#', 'avril-pro' ),
					'button_second'	  =>  esc_html__( 'Read More', 'avril-pro' ),
					'link2'	  =>  esc_html__( '#', 'avril-pro' ),
					"slide_align" => "left", 
					'id'              => 'customizer_repeater_slider_001',
				),
				array(
					'image_url'       => get_template_directory_uri() . '/assets/images/slider/img02.jpg',
					'title'           => esc_html__( 'Develop Stronger Minds', 'avril-pro' ),
					'subtitle'         => esc_html__( 'Better Coaching Gets', 'avril-pro' ),
					'text'            => esc_html__( 'There are many variations of passages of Lorem Ipsum available but the majority have suffered injected humour dummy now.', 'avril-pro' ),
					'text2'	  =>  esc_html__( 'Get Started', 'avril-pro' ),
					'link'	  =>  esc_html__( '#', 'avril-pro' ),
					'button_second'	  =>  esc_html__( 'Read More', 'avril-pro' ),
					'link2'	  =>  esc_html__( '#', 'avril-pro' ),
					"slide_align" => "center", 
					'id'              => 'customizer_repeater_slider_002',
				),
				array(
					'image_url'       => get_template_directory_uri() . '/assets/images/slider/img03.jpg',
					'title'           => esc_html__( 'Industry Analysis', 'avril-pro' ),
					'subtitle'         => esc_html__( 'Marketing & Strategy', 'avril-pro' ),
					'text'            => esc_html__( 'There are many variations of passages of Lorem Ipsum available but the majority have suffered injected humour dummy now.', 'avril-pro' ),
					'text2'	  =>  esc_html__( 'Get Started', 'avril-pro' ),
					'link'	  =>  esc_html__( '#', 'avril-pro' ),
					'button_second'	  =>  esc_html__( 'Read More', 'avril-pro' ),
					'link2'	  =>  esc_html__( '#', 'avril-pro' ),
					"slide_align" => "right", 
					'id'              => 'customizer_repeater_slider_003',
			
				),
			)
		)
	);
}


/*
 *
 * Service Default
 */
 function avril_get_service_default() {
	return apply_filters(
		'avril_get_service_default', json_encode(
				 array(
				array(
					'title'           => esc_html__( 'Well Documented', 'avril-pro' ),
					'text'            => esc_html__( 'Lorem Ipsum is simply dummy of printing and typesetting and industry. Lorem Ipsum been.', 'avril-pro' ),
					'icon_value'       => 'fa-folder-open-o',
					'id'              => 'customizer_repeater_service_001',
					
				),
				array(
					'title'           => esc_html__( 'Simple To Use', 'avril-pro' ),
					'text'            => esc_html__( 'Lorem Ipsum is simply dummy of printing and typesetting and industry. Lorem Ipsum been.', 'avril-pro' ),
					'icon_value'       => 'fa-list',
					'id'              => 'customizer_repeater_service_002',				
				),
				array(
					'title'           => esc_html__( 'High Performance', 'avril-pro' ),
					'text'            => esc_html__( 'Lorem Ipsum is simply dummy of printing and typesetting and industry. Lorem Ipsum been.', 'avril-pro' ),
					'icon_value'       => 'fa-rocket',
					'id'              => 'customizer_repeater_service_003',
				),
				array(
					'title'           => esc_html__( 'Simple To Use', 'avril-pro' ),
					'text'            => esc_html__( 'Lorem Ipsum is simply dummy of printing and typesetting and industry. Lorem Ipsum been.', 'avril-pro' ),
					'icon_value'       => 'fa-reorder',
					'id'              => 'customizer_repeater_service_004',
				),
			)
		)
	);
}


/*
 *
 * Features Default
 */
 function avril_get_features_default() {
	return apply_filters(
		'avril_get_features_default', json_encode(
				 array(
				array(
					'title'           => esc_html__( 'Business Growth', 'avril-pro' ),
					'text'            => esc_html__( 'Many variations of at Lorem Ipsum but the majority have suffered. Lorem Ipsum the majority suffered.', 'avril-pro' ),
					'icon_value'       => 'fa-bar-chart',
					'id'              => 'customizer_repeater_features_001',
					
				),
				array(
					'title'           => esc_html__( 'Business Sustainability', 'avril-pro' ),
					'text'            => esc_html__( 'Many variations of at Lorem Ipsum but the majority have suffered. Lorem Ipsum the majority suffered.', 'avril-pro' ),
					'icon_value'       => 'fa-connectdevelop',
					'id'              => 'customizer_repeater_features_002',			
				),
				array(
					'title'           => esc_html__( 'Business Performance', 'avril-pro' ),
					'text'            => esc_html__( 'Many variations of at Lorem Ipsum but the majority have suffered. Lorem Ipsum the majority suffered.', 'avril-pro' ),
					'icon_value'       => 'fa-tachometer',
					'id'              => 'customizer_repeater_features_003',
				),
				array(
					'title'           => esc_html__( 'Business Organization', 'avril-pro' ),
					'text'            => esc_html__( 'Many variations of at Lorem Ipsum but the majority have suffered. Lorem Ipsum the majority suffered.', 'avril-pro' ),
					'icon_value'       => 'fa-user-secret',
					'id'              => 'customizer_repeater_features_004',
				),
				array(
					'title'           => esc_html__( 'Dedicated Teams', 'avril-pro' ),
					'text'            => esc_html__( 'Many variations of at Lorem Ipsum but the majority have suffered. Lorem Ipsum the majority suffered.', 'avril-pro' ),
					'icon_value'       => 'fa-folder-open-o',
					'id'              => 'customizer_repeater_features_005',
				),
				array(
					'title'           => esc_html__( '24X7 support', 'avril-pro' ),
					'text'            => esc_html__( 'Many variations of at Lorem Ipsum but the majority have suffered. Lorem Ipsum the majority suffered.', 'avril-pro' ),
					'icon_value'       => 'fa-users',
					'id'              => 'customizer_repeater_features_006',
				),
			)
		)
	);
}

/*
 *
 * Features2 Default
 */
 function avril_get_features2_default() {
	return apply_filters(
		'avril_get_features2_default', json_encode(
				 array(
				array(
					'title'           => esc_html__( 'Fully Responsive Layout', 'avril-pro' ),
					'text'            => esc_html__( 'Highly responsive design and structure that comes in handy when dealing with traffic. Theme is mobile friendly.', 'avril-pro' ),
					'text2'           => esc_html__( 'click Here', 'avril-pro' ),
					'icon_value'       => 'fa-mobile-phone',
					'id'              => 'customizer_repeater_features2_001',
					
				),
				array(
					'title'           => esc_html__( 'Customer Support', 'avril-pro' ),
					'text'            => esc_html__( 'We provide the most responsive and functional IT design for companies and businesses worldwide.', 'avril-pro' ),
					'text2'           => esc_html__( 'click Here', 'avril-pro' ),
					'icon_value'       => 'fa-support',
					'id'              => 'customizer_repeater_features2_002',			
				),
				array(
					'title'           => esc_html__( 'Google Map', 'avril-pro' ),
					'text'            => esc_html__( 'Google map features ready in premium version on the contact page. Show your business location on contact page.', 'avril-pro' ),
					'text2'           => esc_html__( 'click Here', 'avril-pro' ),
					'icon_value'       => 'fa-map-signs',
					'id'              => 'customizer_repeater_features2_003',
				),
				array(
					'title'           => esc_html__( 'Editable Post Slug', 'avril-pro' ),
					'text'            => esc_html__( 'Want to make SEO friendly URL"s in your website? Slug rewrites features is present in Avril.', 'avril-pro' ),
					'text2'           => esc_html__( 'click Here', 'avril-pro' ),
					'icon_value'       => 'fa-edit',
					'id'              => 'customizer_repeater_features2_004',
				),
				array(
					'title'           => esc_html__( 'Left & Right Sidebars', 'avril-pro' ),
					'text'            => esc_html__( 'Already developed pages for page left & right sidebar for display your page with sidebar widget.', 'avril-pro' ),
					'text2'           => esc_html__( 'click Here', 'avril-pro' ),
					'icon_value'       => 'fa-columns',
					'id'              => 'customizer_repeater_features2_005',
				),
				array(
					'title'           => esc_html__( 'Copyright Removal', 'avril-pro' ),
					'text'            => esc_html__( 'footer editor option you can change the footer copyright information with your footer info.', 'avril-pro' ),
					'text2'           => esc_html__( 'click Here', 'avril-pro' ),
					'icon_value'       => 'fa-copyright ',
					'id'              => 'customizer_repeater_features2_006',
				),
			)
		)
	);
}


/*
 *
 * Gallery Default
 */
 function avril_get_gallery_default() {
	return apply_filters(
		'avril_get_gallery_default', json_encode(
				 array(
				array(
					'image_url'       => get_template_directory_uri() . '/assets/images/gallery/img01.jpg',
					'id'              => 'customizer_repeater_gallery_001',
				),
				array(
					'image_url'       => get_template_directory_uri() . '/assets/images/gallery/img02.jpg',
					'id'              => 'customizer_repeater_gallery_002',
				),
				array(
					'image_url'       => get_template_directory_uri() . '/assets/images/gallery/img03.jpg',
					'id'              => 'customizer_repeater_gallery_003',
				),
				array(
					'image_url'       => get_template_directory_uri() . '/assets/images/gallery/img04.jpg',
					'id'              => 'customizer_repeater_gallery_004',
				),
				array(
					'image_url'       => get_template_directory_uri() . '/assets/images/gallery/img05.jpg',
					'id'              => 'customizer_repeater_gallery_005',
				),
				array(
					'image_url'       => get_template_directory_uri() . '/assets/images/gallery/img06.jpg',
					'id'              => 'customizer_repeater_gallery_006',
				),
				array(
					'image_url'       => get_template_directory_uri() . '/assets/images/gallery/img07.jpg',
					'id'              => 'customizer_repeater_gallery_007',
				),
				array(
					'image_url'       => get_template_directory_uri() . '/assets/images/gallery/img08.jpg',
					'id'              => 'customizer_repeater_gallery_008',
				),
				array(
					'image_url'       => get_template_directory_uri() . '/assets/images/gallery/img09.jpg',
					'id'              => 'customizer_repeater_gallery_009',
				),
				array(
					'image_url'       => get_template_directory_uri() . '/assets/images/gallery/img10.jpg',
					'id'              => 'customizer_repeater_gallery_010',
				),
			)
		)
	);
}


/*
 *
 * Team Default
 */
 function avril_get_team_default() {
	return apply_filters(
		'avril_get_team_default', json_encode(
					  array(
				array(
					'image_url'       => get_template_directory_uri() . '/assets/images/team/img01.jpg',
					'title'           => esc_html__( 'Jack Semper ', 'avril-pro' ),
					'subtitle'        => esc_html__( 'Support','avril-pro' ),
					'text'            => esc_html__( 'Many variations of passages of a Lorem Ipsum available alteration.', 'avril-pro' ),
					'id'              => 'customizer_repeater_team_0001',
					'social_repeater' => json_encode(
						array(
							array(
								'id'   => 'customizer-repeater-social-repeater-team_001',
								'link' => 'facebook.com',
								'icon' => 'fa-facebook',
							),
							array(
								'id'   => 'customizer-repeater-social-repeater-team_003',
								'link' => 'twitter.com',
								'icon' => 'fa-twitter',
							),
							array(
								'id'   => 'customizer-repeater-social-repeater-team_004',
								'link' => 'instagram.com',
								'icon' => 'fa-instagram',
							),
							array(
								'id'   => 'customizer-repeater-social-repeater-team_005',
								'link' => 'linkedin.com',
								'icon' => 'fa-linkedin',
							),
							array(
								'id'   => 'customizer-repeater-social-repeater-team_006',
								'link' => 'behance.com',
								'icon' => 'fa-behance',
							),
							array(
								'id'   => 'customizer-repeater-social-repeater-team_007',
								'link' => 'vimeo.com',
								'icon' => 'fa-vimeo',
							),
						)
					),
				),
				array(
					'image_url'       => get_template_directory_uri() . '/assets/images/team/img02.jpg',
					'title'           => esc_html__( 'Avano Morgan', 'avril-pro' ),
					'subtitle'        => esc_html__( 'Management', 'avril-pro' ),
					'text'            => esc_html__( 'Many variations of passages of a Lorem Ipsum available alteration.', 'avril-pro' ),
					'id'              => 'customizer_repeater_team_0002',
					'social_repeater' => json_encode(
						array(
							array(
								'id'   => 'customizer-repeater-social-repeater-team_0011',
								'link' => 'facebook.com',
								'icon' => 'fa-facebook',
							),
							array(
								'id'   => 'customizer-repeater-social-repeater-team_0012',
								'link' => 'twitter.com',
								'icon' => 'fa-twitter',
							),
							array(
								'id'   => 'customizer-repeater-social-repeater-team_0013',
								'link' => 'pinterest.com',
								'icon' => 'fa-instagram',
							),
							array(
								'id'   => 'customizer-repeater-social-repeater-team_0014',
								'link' => 'linkedin.com',
								'icon' => 'fa-linkedin',
							),
							array(
								'id'   => 'customizer-repeater-social-repeater-team_0015',
								'link' => 'behance.com',
								'icon' => 'fa-behance',
							),
							array(
								'id'   => 'customizer-repeater-social-repeater-team_0016',
								'link' => 'vimeo.com',
								'icon' => 'fa-vimeo',
							),
						)
					),
				),
				array(
					'image_url'       => get_template_directory_uri() . '/assets/images/team/img03.jpg',
					'title'           => esc_html__( 'Philip Wilson', 'avril-pro' ),
					'subtitle'        => esc_html__( 'Marketing', 'avril-pro' ),
					'text'            => esc_html__( 'Many variations of passages of a Lorem Ipsum available alteration.', 'avril-pro' ),
					'id'              => 'customizer_repeater_team_0003',
					'social_repeater' => json_encode(
						array(
							array(
								'id'   => 'customizer-repeater-social-repeater-team_0021',
								'link' => 'facebook.com',
								'icon' => 'fa-facebook',
							),
							array(
								'id'   => 'customizer-repeater-social-repeater-team_0022',
								'link' => 'twitter.com',
								'icon' => 'fa-twitter',
							),
							array(
								'id'   => 'customizer-repeater-social-repeater-team_0023',
								'link' => 'linkedin.com',
								'icon' => 'fa-instagram',
							),
							array(
								'id'   => 'customizer-repeater-social-repeater-team_0024',
								'link' => 'linkedin.com',
								'icon' => 'fa-linkedin',
							),
							array(
								'id'   => 'customizer-repeater-social-repeater-team_0025',
								'link' => 'behance.com',
								'icon' => 'fa-behance',
							),
							array(
								'id'   => 'customizer-repeater-social-repeater-team_0026',
								'link' => 'vimeo.com',
								'icon' => 'fa-vimeo',
							),
						)
					),
				),
				array(
					'image_url'       => get_template_directory_uri() . '/assets/images/team/img04.jpg',
					'title'           => esc_html__( 'Amanda Richards', 'avril-pro' ),
					'subtitle'        => esc_html__( 'Founder', 'avril-pro' ),
					'text'            => esc_html__( 'Many variations of passages of a Lorem Ipsum available alteration.', 'avril-pro' ),
					'id'              => 'customizer_repeater_team_0004',
					'social_repeater' => json_encode(
						array(
							array(
								'id'   => 'customizer-repeater-social-repeater-team_0031',
								'link' => 'facebook.com',
								'icon' => 'fa-facebook',
							),
							array(
								'id'   => 'customizer-repeater-social-repeater-team_0032',
								'link' => 'twitter.com',
								'icon' => 'fa-twitter',
							),
							array(
								'id'   => 'customizer-repeater-social-repeater-team_0033',
								'link' => 'linkedin.com',
								'icon' => 'fa-instagram',
							),
							array(
								'id'   => 'customizer-repeater-social-repeater-team_0034',
								'link' => 'linkedin.com',
								'icon' => 'fa-linkedin',
							),
							array(
								'id'   => 'customizer-repeater-social-repeater-team_0035',
								'link' => 'behance.com',
								'icon' => 'fa-behance',
							),
							array(
								'id'   => 'customizer-repeater-social-repeater-team_0036',
								'link' => 'vimeo.com',
								'icon' => 'fa-vimeo',
							),
						)
					),
				),
			)
		)
	);
}


/*
 *
 * Funfact Default
 */
 function avril_get_funfact_default() {
	return apply_filters(
		'avril_get_funfact_default', json_encode(
				 array(
				array(
					'title'           => esc_html__( '254', 'avril-pro' ),
					'text'            => esc_html__( 'Expert Consultants', 'avril-pro' ),
					'icon_value'       => 'fa-check-circle-o',
					'id'              => 'customizer_repeater_funfact_001',
					
				),
				array(
					'title'           => esc_html__( '807', 'avril-pro' ),
					'text'            => esc_html__( 'Development Hours', 'avril-pro' ),
					'icon_value'       => 'fa-clock-o',
					'id'              => 'customizer_repeater_funfact_002',			
				),
				array(
					'title'           => esc_html__( '926', 'avril-pro' ),
					'text'            => esc_html__( 'Trusted Clients', 'avril-pro' ),
					'icon_value'       => 'fa-group',
					'id'              => 'customizer_repeater_funfact_003',
				),
				array(
					'title'           => esc_html__( '543', 'avril-pro' ),
					'text'            => esc_html__( 'Projects Delivered', 'avril-pro' ),
					'icon_value'       => 'fa-file-movie-o ',
					'id'              => 'customizer_repeater_funfact_004',
				)
			)
		)
	);
}


/*
 *
 * Testimonial Default
 */
 
 function avril_get_testimonial_default() {
	return apply_filters(
		'avril_get_testimonial_default', json_encode(
			array(
				array(
					'title'           => esc_html__( 'Jack Semper', 'avril-pro' ),
					'subtitle'        => esc_html__( 'Structural Engineer', 'avril-pro' ),
					'text'            => esc_html__( 'There are many variations of dummy passages of Lorem Ipsum available  is but the about majority.', 'avril-pro' ),
					'image_url'		  =>  get_template_directory_uri() . '/assets/images/testimonial/img01.png',
					'id'              => 'customizer_repeater_testimonial_001',
				),
				array(
					'title'           => esc_html__( 'Kim Dennis', 'avril-pro' ),
					'subtitle'        => esc_html__( 'Structural Engineer', 'avril-pro' ),
					'text'            => esc_html__( 'There are many variations of dummy passages of Lorem Ipsum available  is but the about majority.', 'avril-pro' ),
					'image_url'		  =>  get_template_directory_uri() . '/assets/images/testimonial/img02.png',
					'id'              => 'customizer_repeater_testimonial_002',
				),
				array(
					'title'           => esc_html__( 'Philip Wilson', 'avril-pro' ),
					'subtitle'        => esc_html__( 'Structural Engineer', 'avril-pro' ),
					'text'            => esc_html__( 'There are many variations of dummy passages of Lorem Ipsum available  is but the about majority.', 'avril-pro' ),
					'image_url'		  =>  get_template_directory_uri() . '/assets/images/testimonial/img03.png',
					'id'              => 'customizer_repeater_testimonial_003',
				),
				array(
					'title'           => esc_html__( 'Kim Dennis', 'avril-pro' ),
					'subtitle'        => esc_html__( 'Structural Engineer', 'avril-pro' ),
					'text'            => esc_html__( 'There are many variations of dummy passages of Lorem Ipsum available  is but the about majority.', 'avril-pro' ),
					'image_url'		  =>  get_template_directory_uri() . '/assets/images/testimonial/img04.png',
					'id'              => 'customizer_repeater_testimonial_004',
				),
		    )
		)
	);
}


/*
 *
 * Skill Default
 */
 function avril_get_skill_default() {
	return apply_filters(
		'avril_get_skill_default', json_encode(
				 array(
				array(
					'title'           => esc_html__( '75.05', 'avril-pro' ),
					'subtitle'           => esc_html__( 'Creativity', 'avril-pro' ),
					'text'            => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut lae et  aliqua.', 'avril-pro' ),
					'id'              => 'customizer_repeater_skill_001',
				),
				array(
					'title'           => esc_html__( '50.02', 'avril-pro' ),
					'subtitle'           => esc_html__( 'Team Work', 'avril-pro' ),
					'text'            => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut lae et  aliqua.', 'avril-pro' ),
					'id'              => 'customizer_repeater_skill_002',		
				),
				array(
					'title'           => esc_html__( '25.06', 'avril-pro' ),
					'subtitle'           => esc_html__( 'Promoting', 'avril-pro' ),
					'text'            => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut lae et  aliqua.', 'avril-pro' ),
					'id'              => 'customizer_repeater_skill_003',
				)
			)
		)
	);
}


/*
 *
 * Skill Default
 */
 function avril_get_faq_default() {
	return apply_filters(
		'avril_get_faq_default', json_encode(
				 array(
				array(
					'icon_value'           => ' fa-question-circle', 
					'title'           => esc_html__( 'Write clear and concise pages?', 'avril-pro' ),
					'text'            => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.', 'avril-pro' ),
					'id'              => 'customizer_repeater_faq_001',
				),
				array(
					'icon_value'           => ' fa-question-circle', 
					'title'           => esc_html__( 'Regularly update each page??', 'avril-pro' ),
					'text'            => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.', 'avril-pro' ),
					'id'              => 'customizer_repeater_faq_002',
				),
				array(
					'icon_value'           => ' fa-question-circle', 
					'title'           => esc_html__( 'Include a search bar?', 'avril-pro' ),
					'text'            => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.', 'avril-pro' ),
					'id'              => 'customizer_repeater_faq_003',
				),
				array(
					'icon_value'           => ' fa-question-circle', 
					'title'           => esc_html__( 'Organize questions by category?', 'avril-pro' ),
					'text'            => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.', 'avril-pro' ),
					'id'              => 'customizer_repeater_faq_004',
				),
				array(
					'icon_value'           => ' fa-question-circle', 
					'title'           => esc_html__( 'Link top questions?', 'avril-pro' ),
					'text'            => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.', 'avril-pro' ),
					'id'              => 'customizer_repeater_faq_005',
				),
				array(
					'icon_value'           => ' fa-question-circle', 
					'title'           => esc_html__( 'Stick to the basics?', 'avril-pro' ),
					'text'            => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.', 'avril-pro' ),
					'id'              => 'customizer_repeater_faq_006',
				)
			)
		)
	);
}


/*
 *
 * Page Service Default
 */
 function avril_get_pg_service_default() {
	return apply_filters(
		'avril_get_pg_service_default', json_encode(
				 array(
				array(
					'title'           => esc_html__( 'Well Documented', 'avril-pro' ),
					'text'            => esc_html__( 'Lorem Ipsum is simply dummy of printing and typesetting and industry. Lorem Ipsum been.', 'avril-pro' ),
					'icon_value'       => 'fa-folder-open-o',
					'id'              => 'customizer_repeater_pg_service_001',
					
				),
				array(
					'title'           => esc_html__( 'Simple To Use', 'avril-pro' ),
					'text'            => esc_html__( 'Lorem Ipsum is simply dummy of printing and typesetting and industry. Lorem Ipsum been.', 'avril-pro' ),
					'icon_value'       => 'fa-list',
					'id'              => 'customizer_repeater_pg_service_002',				
				),
				array(
					'title'           => esc_html__( 'High Performance', 'avril-pro' ),
					'text'            => esc_html__( 'Lorem Ipsum is simply dummy of printing and typesetting and industry. Lorem Ipsum been.', 'avril-pro' ),
					'icon_value'       => 'fa-rocket',
					'id'              => 'customizer_repeater_pg_service_003',
				),
				array(
					'title'           => esc_html__( 'Simple To Use', 'avril-pro' ),
					'text'            => esc_html__( 'Lorem Ipsum is simply dummy of printing and typesetting and industry. Lorem Ipsum been.', 'avril-pro' ),
					'icon_value'       => 'fa-reorder',
					'id'              => 'customizer_repeater_pg_service_004',
				),
				array(
					'title'           => esc_html__( 'Smarter Planning', 'avril-pro' ),
					'text'            => esc_html__( 'Lorem Ipsum is simply dummy of printing and typesetting and industry. Lorem Ipsum been.', 'avril-pro' ),
					'icon_value'       => 'fa-folder-open-o',
					'id'              => 'customizer_repeater_pg_service_005',
					
				),
				array(
					'title'           => esc_html__( 'Innovative Works', 'avril-pro' ),
					'text'            => esc_html__( 'Lorem Ipsum is simply dummy of printing and typesetting and industry. Lorem Ipsum been.', 'avril-pro' ),
					'icon_value'       => 'fa-lightbulb-o',
					'id'              => 'customizer_repeater_pg_service_006',				
				),
				array(
					'title'           => esc_html__( 'Certified Company', 'avril-pro' ),
					'text'            => esc_html__( 'Lorem Ipsum is simply dummy of printing and typesetting and industry. Lorem Ipsum been.', 'avril-pro' ),
					'icon_value'       => 'fa-building',
					'id'              => 'customizer_repeater_pg_service_007',
				),
				array(
					'title'           => esc_html__( 'Simple To Use', 'avril-pro' ),
					'text'            => esc_html__( 'Lorem Ipsum is simply dummy of printing and typesetting and industry. Lorem Ipsum been.', 'avril-pro' ),
					'icon_value'       => 'fa-reorder',
					'id'              => 'customizer_repeater_pg_service_008',
				),
				array(
					'title'           => esc_html__( 'Simple To Use', 'avril-pro' ),
					'text'            => esc_html__( 'Lorem Ipsum is simply dummy of printing and typesetting and industry. Lorem Ipsum been.', 'avril-pro' ),
					'icon_value'       => 'fa-rocket',
					'id'              => 'customizer_repeater_pg_service_009',
				),
			)
		)
	);
}


/*
 *
 * Page Gallery Default
 */
 function avril_get_pg_gallery_default() {
	return apply_filters(
		'avril_get_pg_gallery_default', json_encode(
				 array(
				array(
					'image_url'       => get_template_directory_uri() . '/assets/images/gallery/img01.jpg',
					'id'              => 'customizer_repeater_pg_gallery_001',
				),
				array(
					'image_url'       => get_template_directory_uri() . '/assets/images/gallery/img02.jpg',
					'id'              => 'customizer_repeater_pg_gallery_002',
				),
				array(
					'image_url'       => get_template_directory_uri() . '/assets/images/gallery/img03.jpg',
					'id'              => 'customizer_repeater_pg_gallery_003',
				),
				array(
					'image_url'       => get_template_directory_uri() . '/assets/images/gallery/img04.jpg',
					'id'              => 'customizer_repeater_pg_gallery_004',
				),
				array(
					'image_url'       => get_template_directory_uri() . '/assets/images/gallery/img05.jpg',
					'id'              => 'customizer_repeater_pg_gallery_005',
				),
				array(
					'image_url'       => get_template_directory_uri() . '/assets/images/gallery/img06.jpg',
					'id'              => 'customizer_repeater_pg_gallery_006',
				),
				array(
					'image_url'       => get_template_directory_uri() . '/assets/images/gallery/img07.jpg',
					'id'              => 'customizer_repeater_pg_gallery_007',
				),
				array(
					'image_url'       => get_template_directory_uri() . '/assets/images/gallery/img08.jpg',
					'id'              => 'customizer_repeater_pg_gallery_008',
				),
				array(
					'image_url'       => get_template_directory_uri() . '/assets/images/gallery/img09.jpg',
					'id'              => 'customizer_repeater_pg_gallery_009',
				),
				array(
					'image_url'       => get_template_directory_uri() . '/assets/images/gallery/img10.jpg',
					'id'              => 'customizer_repeater_pg_gallery_010',
				),
				array(
					'image_url'       => get_template_directory_uri() . '/assets/images/gallery/img02.jpg',
					'id'              => 'customizer_repeater_pg_gallery_011',
				),
				array(
					'image_url'       => get_template_directory_uri() . '/assets/images/gallery/img03.jpg',
					'id'              => 'customizer_repeater_pg_gallery_012',
				),
			)
		)
	);
}
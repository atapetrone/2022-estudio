<?php
get_template_part( 'inc/customizer/control-function/functions-style' );
get_template_part( 'inc/customizer/control-function/typography-functions' );
if( ! function_exists( 'avril_dynamic_style' ) ):
    function avril_dynamic_style() {

		$output_css = '';
		
			
		 /**
		 *  Breadcrumb Style
		 */
		 
		$output_css   .= avril_customizer_value( 'breadcrumb_min_height', '.breadcrumb-content', array( 'min-height' ), array( 236, 236, 236 ), 'px' );
		 $output_css   .=  avril_customizer_value( 'breadcrumb_title_size', '.breadcrumb-area h2', array( 'font-size' ), array( 20, 20, 20 ), 'px' );
		  $output_css   .=  avril_customizer_value( 'breadcrumb_content_size', '.breadcrumb-list li', array( 'font-size' ), array( 16, 16, 16 ), 'px' );
		
		$breadcrumb_align				= get_theme_mod('breadcrumb_align','center');
		$breadcrumb_min_height			= get_theme_mod('breadcrumb_min_height','236');	
		if($breadcrumb_align !== '') { 
				$output_css .=".breadcrumb-center .breadcrumb-heading {
					text-align: " .esc_attr($breadcrumb_align). ";
				}\n";
			}
		
		$breadcrumb_bg_img			= get_theme_mod('breadcrumb_bg_img',get_template_directory_uri() .'/assets/images/bg/breadcrumbg.jpg'); 
		$breadcrumb_back_attach		= get_theme_mod('breadcrumb_back_attach','scroll'); 
		$breadcrumb_bg_img_opacity	= get_theme_mod('breadcrumb_bg_img_opacity','0.75');
		$breadcrumb_overlay_color	= get_theme_mod('breadcrumb_overlay_color','#000000');

		if($breadcrumb_bg_img !== '') { 
			$output_css .=".breadcrumb-area {
					background-image: url(" .esc_url($breadcrumb_bg_img). ");
					background-attachment: " .esc_attr($breadcrumb_back_attach). ";
				}\n";
		}
		
		if($breadcrumb_bg_img !== '') { 
			$output_css .=".breadcrumb-area:before {
					background-color: " .esc_attr($breadcrumb_overlay_color). ";
					opacity: " .esc_attr($breadcrumb_bg_img_opacity). ";
				}\n";
		}
		
		/**
		 * Logo Width 
		 */
		$output_css   .= avril_customizer_value( 'logo_width', '.logo img, .mobile-logo img', array( 'max-width' ), array( 140, 140, 140 ), 'px !important' );
		$output_css   .= avril_customizer_value( 'site_ttl_size', '.site-title', array( 'font-size' ), array( 30, 30, 30 ), 'px !important' );
		$output_css   .= avril_customizer_value( 'site_desc_size', '.site-description', array( 'font-size' ), array( 16, 16, 16 ), 'px !important' );
		
		/**
		 * Slider
		 */
		$slider_overlay_enable 				 = get_theme_mod('slider_overlay_enable');
		$slide_overlay_color 				 = get_theme_mod('slide_overlay_color','#fff');
		$slider_opacity						 = get_theme_mod('slider_opacity');
		if($slider_overlay_enable == '1') { 
				$output_css .=".theme-slider {
					opacity: " .esc_attr($slider_opacity). ";
					background: " .esc_attr($slide_overlay_color). ";
				}\n";
			}
		
		/**
		 *  Sidebar Width
		 */
		$avril_sidebar_width = get_theme_mod('avril_sidebar_width',35);
		if($avril_sidebar_width !== '') { 
			$avril_primary_width   = absint( 100 - $avril_sidebar_width );
				$output_css .="	@media (min-width: 992px) {#av-primary-content {
					max-width:" .esc_attr($avril_primary_width). "%;
					flex-basis:" .esc_attr($avril_primary_width). "%;
				}\n";
				$output_css .="#av-secondary-content {
					max-width:" .esc_attr($avril_sidebar_width). "%;
					flex-basis:" .esc_attr($avril_sidebar_width). "%;
				}}\n";
        }
		$output_css   .= avril_customizer_value( 'sidebar_wid_ttl_size', '.sidebar .widget .widget-title', array( 'font-size' ), array( 20, 20, 20 ), 'px' );
		
			$theme_color_enable	= get_theme_mod('theme_color_enable');
			$theme_color 	= get_theme_mod('theme_color','#d61523');
			if($theme_color_enable !== '1') {
			$output_css .=":root {
						--sp-primary: " .esc_attr($theme_color). ";
						--sp-primary-dark: #cc0d1b;
						--sp-secondary:  #151635;
						--sp-secondary-dark: #242424;
						--sp-border-light: #e9e9e9;
						--sp-border-dark: #dddddd;
						--sp-scrollbar: #f2f2f2;
						--sp-scrollbar-thumb: #c2c2c2;
						--sp-gradient-focus:linear-gradient(" .esc_attr($theme_color). ", " .esc_attr($theme_color). "), linear-gradient(#e9e9ea, #e9e9ea);
					}\n";
			
			}	
			
			$primary_color 		= get_theme_mod('primary_color','#d61523');
			$secondary_color 	= get_theme_mod('secondary_color','#151635');
			 
			if($theme_color_enable == '1') { 
				$output_css .=":root {
						--sp-primary: " .esc_attr($primary_color). ";
						--sp-primary-dark: #cc0d1b;
						--sp-secondary: " .esc_attr($secondary_color). ";
						--sp-secondary-dark: #242424;
						--sp-border-light: #e9e9e9;
						--sp-border-dark: #dddddd;
						--sp-scrollbar: #f2f2f2;
						--sp-scrollbar-thumb: #c2c2c2;
						--sp-gradient-focus:linear-gradient(" .esc_attr($theme_color). ", " .esc_attr($theme_color). "), linear-gradient(#e9e9ea, #e9e9ea);
					}\n";
			}
			
		$avril_site_cntnr_width 			 = get_theme_mod('avril_site_cntnr_width','1170');
			if($avril_site_cntnr_width >=768 && $avril_site_cntnr_width <=2000){
				$output_css .=".av-container {
						max-width: " .esc_attr($avril_site_cntnr_width). "px;
					}\n";
			}

		$avril_cntnr_tb_padding 				 = get_theme_mod('avril_cntnr_tb_padding','100');
		$output_css .=" .av-py-default { 
			padding: " .esc_attr($avril_cntnr_tb_padding). "px 0;
		}\n";


		/**
		 *  Typography Body
		 */
		 $avril_body_font_family		 = get_theme_mod('avril_body_font_family','');
		 $avril_body_font_weight	 	 = get_theme_mod('avril_body_font_weight','inherit');
		 $avril_body_text_transform	 = get_theme_mod('avril_body_text_transform','inherit');
		 $avril_body_font_style	 	 = get_theme_mod('avril_body_font_style','inherit');
		 $avril_body_txt_decoration	 = get_theme_mod('avril_body_txt_decoration','none');
		
		 $output_css   .= avril_customizer_value( 'avril_body_font_size', 'body', array( 'font-size' ), array( 16, 16, 16 ), 'px' );
		 $output_css   .= avril_customizer_value( 'avril_body_line_height', 'body', array( 'line-height' ), array( 1.6, 1.6, 1.6 ) );
		 $output_css   .= avril_customizer_value( 'avril_body_ltr_space', 'body', array( 'letter-spacing' ), array( 0, 0, 0 ), 'px' );
		 if($avril_body_font_family !== '') { 
			if ( $avril_body_font_family && ( strpos( $avril_body_font_family, ',' ) != true ) ) {
				avril_enqueue_google_font($avril_body_font_family);
			}	
			 $output_css .=" body{ font-family: " .esc_attr($avril_body_font_family). ";	}\n";
		 }
		 $output_css .=" body{ 
			font-weight: " .esc_attr($avril_body_font_weight). ";
			text-transform: " .esc_attr($avril_body_text_transform). ";
			font-style: " .esc_attr($avril_body_font_style). ";
			text-decoration: " .esc_attr($avril_body_txt_decoration). ";
		} a {text-decoration: " .esc_attr($avril_body_txt_decoration). ";
		}\n";		 
		
		/**
		 *  Typography Heading
		 */
		 for ( $i = 1; $i <= 6; $i++ ) {
			 $avril_heading_font_family	    = get_theme_mod('avril_h' . $i . '_font_family','');	
			 $avril_heading_font_weight	 	= get_theme_mod('avril_h' . $i . '_font_weight','700');
			 $avril_heading_text_transform 	= get_theme_mod('avril_h' . $i . '_text_transform','inherit');
			 $avril_heading_font_style	 	= get_theme_mod('avril_h' . $i . '_font_style','inherit');
			 $avril_heading_txt_decoration	= get_theme_mod('avril_h' . $i . '_text_decoration','inherit');
			 
			 $output_css   .= avril_customizer_value( 'avril_h' . $i . '_font_size', 'h' . $i .'', array( 'font-size' ), array( 36, 36, 36 ), 'px' );
			 $output_css   .= avril_customizer_value( 'avril_h' . $i . '_line_height', 'h' . $i . '', array( 'line-height' ), array( 1.2, 1.2, 1.2 ) );
			 $output_css   .= avril_customizer_value( 'avril_h' . $i . '_ltr_spacing', 'h' . $i . '', array( 'letter-spacing' ), array( 0, 0, 0 ), 'px' );
			  if($avril_heading_font_family !== '') {
				  if ( $avril_heading_font_family && ( strpos( $avril_heading_font_family, ',' ) != true ) ) {
					avril_enqueue_google_font($avril_heading_font_family);
				  }
			  }	
			 $output_css .=" h" . $i . "{ 
				font-family: " .esc_attr($avril_heading_font_family). ";
				font-weight: " .esc_attr($avril_heading_font_weight). ";
				text-transform: " .esc_attr($avril_heading_text_transform). ";
				font-style: " .esc_attr($avril_heading_font_style). ";
				text-decoration: " .esc_attr($avril_heading_txt_decoration). ";
			}\n";
		 }


		/**
		 *  Typography Menu
		 */
		 $avril_menu_font_family		 = get_theme_mod('avril_menu_font_family');
		 $avril_menu_font_weight	 	 = get_theme_mod('avril_menu_font_weight','inherit');
		 $avril_menu_text_transform	 	 = get_theme_mod('avril_menu_text_transform','inherit');
		 $avril_menu_font_style	 	 	 = get_theme_mod('avril_menu_font_style','inherit');
		 $avril_menu_txt_decoration	 	 = get_theme_mod('avril_menu_txt_decoration','inherit');
		 
		 $output_css   .= avril_customizer_value( 'avril_menu_font_size', '.menu-wrap > li > a, .dropdown-menu li a', array( 'font-size' ), array( 15, 15, 15 ), 'px' );
		 $output_css   .= avril_customizer_value( 'avril_menu_line_height', '.menu-wrap > li > a, .dropdown-menu li a', array( 'line-height' ), array( 3, 3, 3 ), '!important');
		 $output_css   .= avril_customizer_value( 'avril_menu_ltr_space', '.menu-wrap > li > a, .dropdown-menu li a', array( 'letter-spacing' ), array( 0, 0, 0 ), 'px' );
		   if($avril_menu_font_family !== '') { 
			if ( $avril_menu_font_family && ( strpos( $avril_menu_font_family, ',' ) != true ) ) {
				avril_enqueue_google_font($avril_menu_font_family);
			}	
			 $output_css .=" .menu-wrap > li > a, .dropdown-menu li a{ font-family: " .esc_attr($avril_menu_font_family). ";	}\n";
		 }
		 $output_css .=".menu-wrap > li > a, .dropdown-menu li a{ 
			font-weight: " .esc_attr($avril_menu_font_weight). ";
			text-transform: " .esc_attr($avril_menu_text_transform). ";
			font-style: " .esc_attr($avril_menu_font_style). ";
			text-decoration: " .esc_attr($avril_menu_txt_decoration). ";
		}\n";
        wp_add_inline_style( 'avril-style', $output_css );
    }
endif;
add_action( 'wp_enqueue_scripts', 'avril_dynamic_style' );
?>
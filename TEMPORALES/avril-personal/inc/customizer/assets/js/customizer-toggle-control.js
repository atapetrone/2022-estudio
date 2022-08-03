/**
 * Customizer controls toggles
 *
 * @package Avril
 */

( function( $ ) {

	/* Internal shorthand */
	var api = wp.customize;

	/**
	 * Trigger hooks
	 */
	AVRILControlTrigger = {

	    /**
	     * Trigger a hook.
	     *
	     * @since 1.0.0
	     * @method triggerHook
	     * @param {String} hook The hook to trigger.
	     * @param {Array} args An array of args to pass to the hook.
		 */
	    triggerHook: function( hook, args )
	    {
	    	$( 'body' ).trigger( 'avril-control-trigger.' + hook, args );
	    },

	    /**
	     * Add a hook.
	     *
	     * @since 1.0.0
	     * @method addHook
	     * @param {String} hook The hook to add.
	     * @param {Function} callback A function to call when the hook is triggered.
	     */
	    addHook: function( hook, callback )
	    {
	    	$( 'body' ).on( 'avril-control-trigger.' + hook, callback );
	    },

	    /**
	     * Remove a hook.
	     *
	     * @since 1.0.0
	     * @method removeHook
	     * @param {String} hook The hook to remove.
	     * @param {Function} callback The callback function to remove.
	     */
	    removeHook: function( hook, callback )
	    {
		    $( 'body' ).off( 'avril-control-trigger.' + hook, callback );
	    },
	};

	/**
	 * Helper class that contains data for showing and hiding controls.
	 *
	 * @since 1.0.0
	 * @class AVRILCustomizerToggles
	 */
	AVRILCustomizerToggles = {
		
		/**
		 *  Mobile Logo
		 */
		'mobile_logo_on' :
		[
			{
				controls: [
					'mobile_logo'
				],
				callback: function( mobile_logo ) {

					var mobile_logo = api( 'mobile_logo_on' ).get();

					if ( '1' == mobile_logo ) {
						return true;
					}
					return false;
				}
			}
		],
		
		/**
		 *  hide_show_nav_btn
		 */
		'hide_show_nav_btn' :
		[
			{
				controls: [
					'nav_btn_lbl',
					'nav_btn_link'
				],
				callback: function( hide_show_nav_btn ) {

					var hide_show_nav_btn = api( 'hide_show_nav_btn' ).get();

					if ( '1' == hide_show_nav_btn ) {
						return true;
					}
					return false;
				}
			}
		],
		
		/**
		 *  hs_scroller
		 */
		'hs_scroller' :
		[
			{
				controls: [
					'scroller_icon'
				],
				callback: function( hs_scroller ) {

					var hs_scroller = api( 'hs_scroller' ).get();

					if ( '1' == hs_scroller ) {
						return true;
					}
					return false;
				}
			}
		],
		
		
		/**
		 *  hs_breadcrumb
		 */
		'hs_breadcrumb' :
		[
			{
				controls: [
					'hs_breadcrumb_bottom',
					'hs_breadcrumb_subs',
					'breadcrumb_title_enable',
					'breadcrumb_path_enable',
					'breadcrumb_contents',
					'breadcrumb_align',
					'breadcrumb_seprator',
					'breadcrumb_sub_shortcode',
					'breadcrumb_min_height',
					'breadcrumb_bg_head',
					'breadcrumb_bg_img',
					'breadcrumb_back_attach',
					'breadcrumb_bg_img_opacity',
					'breadcrumb_overlay_color',
					'breadcrumb_typography',
					'breadcrumb_title_size',
					'breadcrumb_content_size',
				],
				callback: function( hs_breadcrumb ) {

					var hs_breadcrumb = api( 'hs_breadcrumb' ).get();

					if ( '1' == hs_breadcrumb ) {
						return true;
					}
					return false;
				}
			}
		],
		
		/**
		 *  Slider
		 */
		'slider_overlay_enable' :
		[
			{
				controls: [
					'slide_overlay_color',
					'slider_opacity'
				],
				callback: function( slider_overlay_enable ) {

					var slider_overlay_enable = api( 'slider_overlay_enable' ).get();

					if ( '1' == slider_overlay_enable ) {
						return true;
					}
					return false;
				}
			}
		],
		
		
		/**
		 *  CTA
		 */
		'cta_type' :
		[
			{
				controls: [
					'cta_bg_head',
					'cta_bg_setting',
					'cta_bg_position'
				],
				callback: function( cta_type ) {

					var cta_type = api( 'cta_type' ).get();

					if ( 'style-1' == cta_type ) {
						return true;
					}
					return false;
				}
			}
		],
		
		
		/**
		 *  Info First
		 */
		'info_img_type1' :
		[
			{
				controls: [
					'info_first_img_setting',
				],
				callback: function( info_img_type1 ) {

					var info_img_type1 = api( 'info_img_type1' ).get();

					if ( 'image' == info_img_type1 ) {
						return true;
					}
					return false;
				}
			},
			{
				controls: [
					'info_first_icon_setting',
				],
				callback: function( info_img_type1 ) {

					var info_img_type1 = api( 'info_img_type1' ).get();

					if ( 'icon' == info_img_type1 ) {
						return true;
					}
					return false;
				}
			}
		],
		
		/**
		 *  Info Second
		 */
		'info_img_type2' :
		[
			{
				controls: [
					'info_second_img_setting',
				],
				callback: function( info_img_type2 ) {

					var info_img_type2 = api( 'info_img_type2' ).get();

					if ( 'image' == info_img_type2 ) {
						return true;
					}
					return false;
				}
			},
			{
				controls: [
					'info_second_icon_setting',
				],
				callback: function( info_img_type2 ) {

					var info_img_type2 = api( 'info_img_type2' ).get();

					if ( 'icon' == info_img_type2 ) {
						return true;
					}
					return false;
				}
			}
		],
		
		/**
		 *  Info Third
		 */
		'info_img_type3' :
		[
			{
				controls: [
					'info_third_img_setting',
				],
				callback: function( info_img_type3 ) {

					var info_img_type3 = api( 'info_img_type3' ).get();

					if ( 'image' == info_img_type3 ) {
						return true;
					}
					return false;
				}
			},
			{
				controls: [
					'info_third_icon_setting',
				],
				callback: function( info_img_type3 ) {

					var info_img_type3 = api( 'info_img_type3' ).get();

					if ( 'icon' == info_img_type3 ) {
						return true;
					}
					return false;
				}
			}
		],
		
		/**
		 *  Color 
		 */
		'theme_color_enable' :
		[
			{
				controls: [
					'primary_color',
					'secondary_color'
				],
				callback: function( theme_color_enable ) {

					var theme_color_enable = api( 'theme_color_enable' ).get();

					if ( '1' == theme_color_enable ) {
						return true;
					}
					return false;
				}
			}
		],
		
		'footer_bottom_layout' :
		[
			{
				controls: [
					'footer_bottom_1',
					'footer_bottom_2'
				],
				callback: function( footer_bottom_layout ) {

					if ( 'disable' != footer_bottom_layout ) {
						return true;
					}
					return false;
				}
			},
			{
				controls: [
					'footer_first_custom',
				],
				callback: function( footer_bottom_layout ) {

					var footer_section_1 = api( 'footer_bottom_1' ).get();

					if ( 'disable' != footer_bottom_layout && 'custom' == footer_section_1 ) {
						return true;
					}
					return false;
				}
			},
			{
				controls: [
					'footer_first_shortcode',
				],
				callback: function( footer_bottom_layout ) {

					var footer_section_1 = api( 'footer_bottom_1' ).get();

					if ( 'disable' != footer_bottom_layout && 'shortcode' == footer_section_1 ) {
						return true;
					}
					return false;
				}
			},
			{
				controls: [
					'footer_second_custom',
				],
				callback: function( footer_bottom_layout ) {

					var footer_section_2 = api( 'footer_bottom_2' ).get();

					if ( 'disable' != footer_bottom_layout && 'custom' == footer_section_2 ) {
						return true;
					}
					return false;
				}
			},
			{
				controls: [
					'footer_second_shortcode',
				],
				callback: function( footer_bottom_layout ) {

					var footer_section_1 = api( 'footer_bottom_2' ).get();

					if ( 'disable' != footer_bottom_layout && 'shortcode' == footer_section_1 ) {
						return true;
					}
					return false;
				}
			},
		],
		'footer_bottom_1' :
		[
			{
				controls: [
					'footer_first_custom',
				],
				callback: function( enabled_section_1 ) {

					var footer_layout = api( 'footer_bottom_layout' ).get();

					if ( 'custom' == enabled_section_1 && 'disable' != footer_layout ) {
						return true;
					}
					return false;
				}
			},
			{
				controls: [
					'footer_first_shortcode',
				],
				callback: function( enabled_section_1 ) {

					var footer_layout = api( 'footer_bottom_layout' ).get();

					if ( 'shortcode' == enabled_section_1 && 'disable' != footer_layout ) {
						return true;
					}
					return false;
				}
			}
		],
		'footer_bottom_2' :
		[
			{
				controls: [
					'footer_second_custom',
				],
				callback: function( enabled_section_2 ) {

					var footer_layout = api( 'footer_bottom_layout' ).get();

					if ( 'custom' == enabled_section_2 && 'disable' != footer_layout ) {
						return true;
					}
					return false;
				}
			},
			{
				controls: [
					'footer_second_shortcode',
				],
				callback: function( enabled_section_2 ) {

					var footer_layout = api( 'footer_bottom_layout' ).get();

					if ( 'shortcode' == enabled_section_2 && 'disable' != footer_layout ) {
						return true;
					}
					return false;
				}
			}
		],
		
		/**
		 * Above Header
		 */
		'header_above_layout' :
		[
			{
				controls: [
					'above_header_first',
					'above_header_second'
				],
				callback: function( header_above_layout ) {

					if ( 'disable' != header_above_layout ) {
						return true;
					}
					return false;
				}
			},
			{
				controls: [
					'abv_hdr_first_text',
				],
				callback: function( header_above_layout ) {

					var footer_section_1 = api( 'above_header_first' ).get();

					if ( 'disable' != header_above_layout && 'social' == footer_section_1 ) {
						return true;
					}
					return false;
				}
			},
			{
				controls: [
					'hdr_top_mbl',
					'hide_show_mbl_details',
					'tlh_mobile_icon',
					'tlh_mobile_title',
					'tlh_mobile_sbtitle',
					'hdr_top_email',
					'hide_show_email_details',
					'tlh_email_icon',
					'tlh_email_title',
					'tlh_email_sbtitle',
					'hdr_top_contact',
					'hide_show_cntct_details',
					'tlh_contct_icon',
					'tlh_contact_title',
					'tlh_contact_sbtitle',
				],
				callback: function( header_above_layout ) {

					var footer_section_2 = api( 'above_header_second' ).get();

					if ( 'disable' != header_above_layout && 'contact' == footer_section_2 ) {
						return true;
					}
					return false;
				}
			},
			{
				controls: [
					'abv_hdr_first_shortcode',
				],
				callback: function( header_above_layout ) {

					var above_header_1 = api( 'above_header_first' ).get();

					if ( 'disable' != header_above_layout && 'shortcode' == above_header_1 ) {
						return true;
					}
					return false;
				}
			},
			{
				controls: [
					'abv_hdr_second_shortcode',
				],
				callback: function( header_above_layout ) {

					var above_header_2 = api( 'above_header_second' ).get();

					if ( 'disable' != header_above_layout && 'shortcode' == above_header_2 ) {
						return true;
					}
					return false;
				}
			},
		],
		'above_header_first' :
		[
			{
				controls: [
					'hide_show_social_icon',
					'social_icons',
				],
				callback: function( enabled_section_1 ) {

					var above_header_1 = api( 'header_above_layout' ).get();

					if ( 'social' == enabled_section_1 && 'disable' != above_header_1 ) {
						return true;
					}
					return false;
				}
			},
			{
				controls: [
					'abv_hdr_first_shortcode',
				],
				callback: function( enabled_section_1 ) {

					var above_header_1 = api( 'header_above_layout' ).get();

					if ( 'shortcode' == enabled_section_1 && 'disable' != above_header_1 ) {
						return true;
					}
					return false;
				}
			}
		],
		'above_header_second' :
		[
			{
				controls: [
					'hdr_top_mbl',
					'hide_show_mbl_details',
					'tlh_mobile_icon',
					'tlh_mobile_title',
					'tlh_mobile_sbtitle',
					'hdr_top_email',
					'hide_show_email_details',
					'tlh_email_icon',
					'tlh_email_title',
					'tlh_email_sbtitle',
					'hdr_top_contact',
					'hide_show_cntct_details',
					'tlh_contct_icon',
					'tlh_contact_title',
					'tlh_contact_sbtitle',
				],
				callback: function( enabled_section_2 ) {

					var above_header_2 = api( 'header_above_layout' ).get();

					if ( 'contact' == enabled_section_2 && 'disable' != above_header_2 ) {
						return true;
					}
					return false;
				}
			},
			{
				controls: [
					'abv_hdr_second_shortcode',
				],
				callback: function( enabled_section_2 ) {

					var above_header_2 = api( 'header_above_layout' ).get();

					if ( 'shortcode' == enabled_section_2 && 'disable' != above_header_2 ) {
						return true;
					}
					return false;
				}
			}
		],
		
		
		
		/**
		 *  hs_pg_about
		 */
		'hs_pg_about' :
		[
			{
				controls: [
					'pg_about_img',
					'pg_about_title',
					'pg_about_desc',
					'pg_about_btn_lbl1',
					'pg_about_btn_link1',
					'pg_about_btn_lbl2',
					'pg_about_btn_link2',
					'pg_about_btn_lbl3',
					'pg_about_btn_link3',
				],
				callback: function( hs_pg_about ) {

					var hs_pg_about = api( 'hs_pg_about' ).get();

					if ( '1' == hs_pg_about ) {
						return true;
					}
					return false;
				}
			}
		],
		
		
		/**
		 *  hs_pg_about
		 */
		'hs_pg_about_cta' :
		[
			{
				controls: [
					'about_cta_type'
				],
				callback: function( hs_pg_about_cta ) {

					var hs_pg_about_cta = api( 'hs_pg_about_cta' ).get();

					if ( '1' == hs_pg_about_cta ) {
						return true;
					}
					return false;
				}
			}
		],
		
		/**
		 *  hs_pg_pricing
		 */
		'hs_pg_pricing' :
		[
			{
				controls: [
					'pg_pricing_title',
					'pg_pricing_subtitle',
					'pg_pricing_desc',
					'pg_pricing_display_num'
				],
				callback: function( hs_pg_pricing ) {

					var hs_pg_pricing = api( 'hs_pg_pricing' ).get();

					if ( '1' == hs_pg_pricing ) {
						return true;
					}
					return false;
				}
			}
		],
		
		
		/**
		 *  hs_pg_cta_logo
		 */
		'hs_pg_cta_logo' :
		[
			{
				controls: [
					'pg_cta_logo_img',
					'pg_pricing_cta_lg_ttl',
					'pg_pricing_cta_lg_desc',
					'pg_pricing_display_num'
				],
				callback: function( hs_pg_cta_logo ) {

					var hs_pg_cta_logo = api( 'hs_pg_cta_logo' ).get();

					if ( '1' == hs_pg_cta_logo ) {
						return true;
					}
					return false;
				}
			}
		],
		
		
		/**
		 *  hs_pg_pricing_faq
		 */
		'hs_pg_pricing_faq' :
		[
			{
				controls: [
					'pg_pricing_faq_ttl',
					'pg_pricing_faq_content',
				],
				callback: function( hs_pg_pricing_faq ) {

					var hs_pg_pricing_faq = api( 'hs_pg_pricing_faq' ).get();

					if ( '1' == hs_pg_pricing_faq ) {
						return true;
					}
					return false;
				}
			}
		],
		
		
		/**
		 *  hs_pg_pricing_cta
		 */
		'hs_pg_pricing_cta' :
		[
			{
				controls: [
					'pricing_cta_type'
				],
				callback: function( hs_pg_pricing_cta ) {

					var hs_pg_pricing_cta = api( 'hs_pg_pricing_cta' ).get();

					if ( '1' == hs_pg_pricing_cta ) {
						return true;
					}
					return false;
				}
			}
		],
		
		
		
		/**
		 *  hs_ct_info
		 */
		'hs_ct_info' :
		[
			{
				controls: [
					'ct_info_icon1',
					'ct_info_ttl1',
					'ct_info_desc1',
					'ct_info_icon2',
					'ct_info_ttl2',
					'ct_info_desc2',
					'ct_info_icon3',
					'ct_info_ttl3',
					'ct_info_desc3',
				],
				callback: function( hs_ct_info ) {

					var hs_ct_info = api( 'hs_ct_info' ).get();

					if ( '1' == hs_ct_info ) {
						return true;
					}
					return false;
				}
			}
		],
		
		
		/**
		 *  hs_ct_form
		 */
		'hs_ct_form' :
		[
			{
				controls: [
					'ct_form_ttl',
					'ct_form_shortcode',
				],
				callback: function( hs_ct_form ) {

					var hs_ct_form = api( 'hs_ct_form' ).get();

					if ( '1' == hs_ct_form ) {
						return true;
					}
					return false;
				}
			}
		],
		
		
		/**
		 *  hs_pg_opening_hour
		 */
		'hs_pg_opening_hour' :
		[
			{
				controls: [
					'opening_hour_ttl',
					'opening_hour_desc',
					'pg_opening_content',
					'opening_hour_bg_img',
				],
				callback: function( hs_pg_opening_hour ) {

					var hs_pg_opening_hour = api( 'hs_pg_opening_hour' ).get();

					if ( '1' == hs_pg_opening_hour ) {
						return true;
					}
					return false;
				}
			}
		],
		
		/**
		 *  hs_pg_contact_map
		 */
		'hs_pg_contact_map' :
		[
			{
				controls: [
					'contact_page_map_lattitude',
					'contact_page_map_longitude',
				],
				callback: function( hs_pg_contact_map ) {

					var hs_pg_contact_map = api( 'hs_pg_contact_map' ).get();

					if ( '1' == hs_pg_contact_map ) {
						return true;
					}
					return false;
				}
			}
		],
		
		
		/**
		 *  enable_comming_soon
		 */
		'enable_comming_soon' :
		[
			{
				controls: [
					'enable_comming_soon_form',
					'enable_comming_soon_social',
					'comming_soon_head',
					'comming_soon_logo',
					'comming_soon_title',
					'comming_soon_desc',
					'comming_soon_time_head',
					'comming_soon_time',
					'comming_soon_form',
					'comming_soon_shortcode',
					'comming_soon_social',
					'comming_soon_social_icons',
					'comming_soon_bg',
					'comming_soon_bg_img',
				],
				callback: function( enable_comming_soon ) {

					var enable_comming_soon = api( 'enable_comming_soon' ).get();

					if ( '1' == enable_comming_soon ) {
						return true;
					}
					return false;
				}
			}
		],
		
	};

} )( jQuery );

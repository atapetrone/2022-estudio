/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {

	/**
     * Outputs custom css for responsive controls
     * @param  {[string]} setting customizer setting
     * @param  {[string]} css_selector
     * @param  {[array]} css_prop css property to write
     * @param  {String} ext css value extension eg: px, in
     * @return {[string]} css output
     */
    function range_live_media_load( setting, css_selector, css_prop, ext = '' ) {
        wp.customize(
            setting, function( value ) {
                'use strict';
                value.bind(
                    function( to ){
                        var values          = JSON.parse( to );
                        var desktop_value   = JSON.parse( values.desktop );
                        var tablet_value    = JSON.parse( values.tablet );
                        var mobile_value    = JSON.parse( values.mobile );

                        var class_name      = 'customizer-' + setting;
                        var css_class       = $( '.' + class_name );
                        var selector_name   = css_selector;
                        var property_name   = css_prop;

                        var desktop_css     = '';
                        var tablet_css      = '';
                        var mobile_css      = '';

                        if ( property_name.length == 1 ) {
                            var desktop_css     = property_name[0] + ': ' + desktop_value + ext + ';';
                            var tablet_css      = property_name[0] + ': ' + tablet_value + ext + ';';
                            var mobile_css      = property_name[0] + ': ' + mobile_value + ext + ';';
                        } else if ( property_name.length == 2 ) {
                            var desktop_css     = property_name[0] + ': ' + desktop_value + ext + ';';
                            var desktop_css     = desktop_css + property_name[1] + ': ' + desktop_value + ext + ';';

                            var tablet_css      = property_name[0] + ': ' + tablet_value + ext + ';';
                            var tablet_css      = tablet_css + property_name[1] + ': ' + tablet_value + ext + ';';

                            var mobile_css      = property_name[0] + ': ' + mobile_value + ext + ';';
                            var mobile_css      = mobile_css + property_name[1] + ': ' + mobile_value + ext + ';';
                        }

                        var head_append     = '<style class="' + class_name + '">@media (min-width: 320px){ ' + selector_name + ' { ' + mobile_css + ' } } @media (min-width: 720px){ ' + selector_name + ' { ' + tablet_css + ' } } @media (min-width: 960px){ ' + selector_name + ' { ' + desktop_css + ' } }</style>';

                        if ( css_class.length ) {
                            css_class.replaceWith( head_append );
                        } else {
                            $( "head" ).append( head_append );
                        }
                    }
                );
            }
        );
    }
	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title, .site-description' ).css( {
					'clip': 'auto',
					'position': 'relative'
				} );
				$( '.site-title, .site-description' ).css( {
					'color': to
				} );
			}
		} );
	} );
	
	$(document).ready(function ($) {
        $('input[data-input-type]').on('input change', function () {
            var val = $(this).val();
            $(this).prev('.cs-range-value').html(val);
            $(this).val(val);
        });
    })
	
	
	/**
	 * logo_width
	 */
	range_live_media_load( 'logo_width', '.logo img, .mobile-logo img', [ 'max-width' ], 'px !important' );
	
	/**
	 * site_ttl_size
	 */
	 
	range_live_media_load( 'site_ttl_size', 'h4.site-title', [ 'font-size' ], 'px !important' );
	
	/**
	 * site_desc_size
	 */
	 
	range_live_media_load( 'site_desc_size', '.site-description', [ 'font-size' ], 'px !important' );
	
	//tlh_mobile_title
	wp.customize(
		'tlh_mobile_title', function( value ) {
			value.bind(
				function( newval ) {
					$( '#above-header .wgt-3 .text' ).text( newval );
				}
			);
		}
	);
	//tlh_mobile_sbtitle
	wp.customize(
		'tlh_mobile_sbtitle', function( value ) {
			value.bind(
				function( newval ) {
					$( '#above-header .wgt-3 .title' ).text( newval );
				}
			);
		}
	);
	
	//tlh_contact_title
	wp.customize(
		'tlh_contact_title', function( value ) {
			value.bind(
				function( newval ) {
					$( '#above-header .wgt-1 .text' ).text( newval );
				}
			);
		}
	);
	//tlh_contact_sbtitle
	wp.customize(
		'tlh_contact_sbtitle', function( value ) {
			value.bind(
				function( newval ) {
					$( '#above-header .wgt-1 .title' ).text( newval );
				}
			);
		}
	);
	
	//tlh_email_title
	wp.customize(
		'tlh_email_title', function( value ) {
			value.bind(
				function( newval ) {
					$( '#above-header .wgt-2 .text' ).text( newval );
				}
			);
		}
	);
	//tlh_email_sbtitle
	wp.customize(
		'tlh_email_sbtitle', function( value ) {
			value.bind(
				function( newval ) {
					$( '#above-header .wgt-2 .title' ).text( newval );
				}
			);
		}
	);
	
	//info_title
	wp.customize(
		'info_title', function( value ) {
			value.bind(
				function( newval ) {
					$( '#info-section .info-first .text' ).text( newval );
				}
			);
		}
	);
	
	//info_description
	wp.customize(
		'info_description', function( value ) {
			value.bind(
				function( newval ) {
					$( '#info-section .info-first .title' ).text( newval );
				}
			);
		}
	);
	
	//info_title2
	wp.customize(
		'info_title2', function( value ) {
			value.bind(
				function( newval ) {
					$( '#info-section .info-second .text' ).text( newval );
				}
			);
		}
	);
	
	//info_description2
	wp.customize(
		'info_description2', function( value ) {
			value.bind(
				function( newval ) {
					$( '#info-section .info-second .title' ).text( newval );
				}
			);
		}
	);
	
	//info_title3
	wp.customize(
		'info_title3', function( value ) {
			value.bind(
				function( newval ) {
					$( '#info-section .info-third .text' ).text( newval );
				}
			);
		}
	);
	
	//info_description3
	wp.customize(
		'info_description3', function( value ) {
			value.bind(
				function( newval ) {
					$( '#info-section .info-third .title' ).text( newval );
				}
			);
		}
	);
	
	//service_title
	wp.customize(
		'service_title', function( value ) {
			value.bind(
				function( newval ) {
					$( '.service-home .heading-default .ttl' ).text( newval );
				}
			);
		}
	);
	
	//service_description
	wp.customize(
		'service_description', function( value ) {
			value.bind(
				function( newval ) {
					$( '.service-home .heading-default p' ).text( newval );
				}
			);
		}
	);
	
	//pg_service_title
	wp.customize(
		'pg_service_title', function( value ) {
			value.bind(
				function( newval ) {
					$( '.page-service .heading-default .ttl' ).text( newval );
				}
			);
		}
	);
	
	//pg_service_description
	wp.customize(
		'pg_service_description', function( value ) {
			value.bind(
				function( newval ) {
					$( '.page-service .heading-default p' ).text( newval );
				}
			);
		}
	);
	
	
	//feature_title
	wp.customize(
		'feature_title', function( value ) {
			value.bind(
				function( newval ) {
					$( '#features-section .heading-default .ttl' ).text( newval );
				}
			);
		}
	);
	
	//feature_description
	wp.customize(
		'feature_description', function( value ) {
			value.bind(
				function( newval ) {
					$( '#features-section .heading-default p' ).text( newval );
				}
			);
		}
	);
	
	//feature2_title
	wp.customize(
		'feature2_title', function( value ) {
			value.bind(
				function( newval ) {
					$( '#features-section2 .heading-default .ttl' ).text( newval );
				}
			);
		}
	);
	
	//feature2_description
	wp.customize(
		'feature2_description', function( value ) {
			value.bind(
				function( newval ) {
					$( '#features-section2 .heading-default p' ).text( newval );
				}
			);
		}
	);
	
	//Porfolio_title
	wp.customize(
		'Porfolio_title', function( value ) {
			value.bind(
				function( newval ) {
					$( '.home-portfolio .heading-default .ttl' ).text( newval );
				}
			);
		}
	);
	
	//porfolio_description
	wp.customize(
		'porfolio_description', function( value ) {
			value.bind(
				function( newval ) {
					$( '.home-portfolio .heading-default p' ).text( newval );
				}
			);
		}
	);
	
	//pg_Porfolio_title
	wp.customize(
		'pg_Porfolio_title', function( value ) {
			value.bind(
				function( newval ) {
					$( '.portfolio-page .heading-default .ttl' ).text( newval );
				}
			);
		}
	);
	
	//pg_porfolio_desc
	wp.customize(
		'pg_porfolio_desc', function( value ) {
			value.bind(
				function( newval ) {
					$( '.portfolio-page .heading-default p' ).text( newval );
				}
			);
		}
	);
	
	//gallery_title
	wp.customize(
		'gallery_title', function( value ) {
			value.bind(
				function( newval ) {
					$( '.home-gallery .heading-default .ttl' ).text( newval );
				}
			);
		}
	);
	
	//gallery_description
	wp.customize(
		'gallery_description', function( value ) {
			value.bind(
				function( newval ) {
					$( '.home-gallery .heading-default p' ).text( newval );
				}
			);
		}
	);
	
	//pg_gallery_title
	wp.customize(
		'pg_gallery_title', function( value ) {
			value.bind(
				function( newval ) {
					$( '.page-gallery .heading-default .ttl' ).text( newval );
				}
			);
		}
	);
	
	//pg_gallery_description
	wp.customize(
		'pg_gallery_description', function( value ) {
			value.bind(
				function( newval ) {
					$( '.page-gallery .heading-default p' ).text( newval );
				}
			);
		}
	);
	
	//pg_contact_title
	wp.customize(
		'pg_contact_title', function( value ) {
			value.bind(
				function( newval ) {
					$( '#contact-section .heading-default .ttl' ).text( newval );
				}
			);
		}
	);
	
	//pg_contact_description
	wp.customize(
		'pg_contact_description', function( value ) {
			value.bind(
				function( newval ) {
					$( '#contact-section .heading-default p' ).text( newval );
				}
			);
		}
	);
	
	
	//ct_info_ttl1
	wp.customize(
		'ct_info_ttl1', function( value ) {
			value.bind(
				function( newval ) {
					$( '#contact-section .info1 .text' ).text( newval );
				}
			);
		}
	);
	
	//ct_info_desc1
	wp.customize(
		'ct_info_desc1', function( value ) {
			value.bind(
				function( newval ) {
					$( '#contact-section .info1 .title' ).text( newval );
				}
			);
		}
	);
	
	//ct_info_ttl2
	wp.customize(
		'ct_info_ttl2', function( value ) {
			value.bind(
				function( newval ) {
					$( '#contact-section .info2 .text' ).text( newval );
				}
			);
		}
	);
	
	//ct_info_desc2
	wp.customize(
		'ct_info_desc2', function( value ) {
			value.bind(
				function( newval ) {
					$( '#contact-section .info2 .title' ).text( newval );
				}
			);
		}
	);
	
	//ct_info_ttl3
	wp.customize(
		'ct_info_ttl3', function( value ) {
			value.bind(
				function( newval ) {
					$( '#contact-section .info3 .text' ).text( newval );
				}
			);
		}
	);
	
	//ct_info_desc3
	wp.customize(
		'ct_info_desc3', function( value ) {
			value.bind(
				function( newval ) {
					$( '#contact-section .info3 .title' ).text( newval );
				}
			);
		}
	);
	
	//ct_form_ttl
	wp.customize(
		'ct_form_ttl', function( value ) {
			value.bind(
				function( newval ) {
					$( '#contact-section .send-your-enquiry h4' ).text( newval );
				}
			);
		}
	);
	
	
	
	
	//pricing_title
	wp.customize(
		'pricing_title', function( value ) {
			value.bind(
				function( newval ) {
					$( '.home-pricing .heading-default .ttl' ).text( newval );
				}
			);
		}
	);
	
	//pricing_description
	wp.customize(
		'pricing_description', function( value ) {
			value.bind(
				function( newval ) {
					$( '.home-pricing .heading-default p' ).text( newval );
				}
			);
		}
	);
	
	//pg_pricing_title
	wp.customize(
		'pg_pricing_title', function( value ) {
			value.bind(
				function( newval ) {
					$( '.page-pricing .heading-default .ttl' ).text( newval );
				}
			);
		}
	);
	
	//pg_pricing_subtitle
	wp.customize(
		'pg_pricing_subtitle', function( value ) {
			value.bind(
				function( newval ) {
					$( '.page-pricing .heading-default p' ).text( newval );
				}
			);
		}
	);
	//team_title
	wp.customize(
		'team_title', function( value ) {
			value.bind(
				function( newval ) {
					$( '#team-section .heading-default .ttl' ).text( newval );
				}
			);
		}
	);
	
	//team_subtitle
	wp.customize(
		'team_subtitle', function( value ) {
			value.bind(
				function( newval ) {
					$( '#team-section .heading-default p' ).text( newval );
				}
			);
		}
	);
	
	//testimonial_title
	wp.customize(
		'testimonial_title', function( value ) {
			value.bind(
				function( newval ) {
					$( '#testimonial-section .heading-default .ttl' ).text( newval );
				}
			);
		}
	);
	
	//testimonial_description
	wp.customize(
		'testimonial_description', function( value ) {
			value.bind(
				function( newval ) {
					$( '#testimonial-section .heading-default p' ).text( newval );
				}
			);
		}
	);
	
	//cta_description
	wp.customize(
		'cta_description', function( value ) {
			value.bind(
				function( newval ) {
					$( '#cta-section .cta-content p' ).text( newval );
				}
			);
		}
	);
	
	//cta_btn_lbl1
	wp.customize(
		'cta_btn_lbl1', function( value ) {
			value.bind(
				function( newval ) {
					$( '#cta-section  a.av-btn-primary' ).text( newval );
				}
			);
		}
	);
	
	//cta_btn_lbl2
	wp.customize(
		'cta_btn_lbl2', function( value ) {
			value.bind(
				function( newval ) {
					$( '#cta-section .cta-learn-more a' ).text( newval );
				}
			);
		}
	);
	
	//blog_title
	wp.customize(
		'blog_title', function( value ) {
			value.bind(
				function( newval ) {
					$( '.home-blog .heading-default .ttl' ).text( newval );
				}
			);
		}
	);
	
	//blog_description
	wp.customize(
		'blog_description', function( value ) {
			value.bind(
				function( newval ) {
					$( '.home-blog .heading-default p' ).text( newval );
				}
			);
		}
	);
	
	//pg_blog_title
	wp.customize(
		'pg_blog_title', function( value ) {
			value.bind(
				function( newval ) {
					$( '.blog-page .heading-default .ttl' ).text( newval );
				}
			);
		}
	);
	
	//pg_blog_desc
	wp.customize(
		'pg_blog_desc', function( value ) {
			value.bind(
				function( newval ) {
					$( '.blog-page .heading-default p' ).text( newval );
				}
			);
		}
	);
	
	//custom_title
	wp.customize(
		'custom_title', function( value ) {
			value.bind(
				function( newval ) {
					$( '#custom-section .heading-default .ttl' ).text( newval );
				}
			);
		}
	);
	
	//custom_description
	wp.customize(
		'custom_description', function( value ) {
			value.bind(
				function( newval ) {
					$( '#custom-section .heading-default p' ).text( newval );
				}
			);
		}
	);
	
	//skill_title
	wp.customize(
		'skill_title', function( value ) {
			value.bind(
				function( newval ) {
					$( '#skills-section .heading-default .ttl' ).text( newval );
				}
			);
		}
	);
	
	//skill_subtitle
	wp.customize(
		'skill_subtitle', function( value ) {
			value.bind(
				function( newval ) {
					$( '#skills-section .heading-default p' ).text( newval );
				}
			);
		}
	);
	
	//pg_about_title
	wp.customize(
		'pg_about_title', function( value ) {
			value.bind(
				function( newval ) {
					$( '#about-section .about-panel h3' ).text( newval );
				}
			);
		}
	);
	
	//pg_about_desc
	wp.customize(
		'pg_about_desc', function( value ) {
			value.bind(
				function( newval ) {
					$( '#about-section .about-panel p' ).text( newval );
				}
			);
		}
	);
	
	//pg_about_btn_lbl1
	wp.customize(
		'pg_about_btn_lbl1', function( value ) {
			value.bind(
				function( newval ) {
					$( '#about-section .av-btn-wrapper .av-btn-primary' ).text( newval );
				}
			);
		}
	);
	
	//pg_about_btn_lbl2
	wp.customize(
		'pg_about_btn_lbl2', function( value ) {
			value.bind(
				function( newval ) {
					$( '#about-section .av-btn-wrapper .av-btn-border' ).text( newval );
				}
			);
		}
	);
	
	//pg_about_btn_lbl3
	wp.customize(
		'pg_about_btn_lbl3', function( value ) {
			value.bind(
				function( newval ) {
					$( '#about-section .av-btn-wrapper .av-btn-text-icon' ).text( newval );
				}
			);
		}
	);
	
	//pg_pricing_cta_lg_ttl
	wp.customize(
		'pg_pricing_cta_lg_ttl', function( value ) {
			value.bind(
				function( newval ) {
					$( '.pg-price-cta-logo h4' ).text( newval );
				}
			);
		}
	);
	
	//pg_pricing_cta_lg_desc
	wp.customize(
		'pg_pricing_cta_lg_desc', function( value ) {
			value.bind(
				function( newval ) {
					$( '.pg-price-cta-logo p' ).text( newval );
				}
			);
		}
	);
	
	
	//opening_hour_ttl
	wp.customize(
		'opening_hour_ttl', function( value ) {
			value.bind(
				function( newval ) {
					$( '#contact-section .opening-heading h4' ).text( newval );
				}
			);
		}
	);
	
	//opening_hour_desc
	wp.customize(
		'opening_hour_desc', function( value ) {
			value.bind(
				function( newval ) {
					$( '#contact-section .opening-heading p' ).text( newval );
				}
			);
		}
	);
	
	/**
	 * Container Width
	 */
	wp.customize( 'avril_site_cntnr_width', function( value ) {
		
		value.bind( function( avril_site_cntnr_width ) {
			var class_name      = 'avril_site_cntnr_width'; // Used as id in gfont link
			var css_class       = $( '.' + class_name );			
			
			if (avril_site_cntnr_width >= 768 && avril_site_cntnr_width < 2000){
				var head_append     = '<style class="' + class_name + '">.av-container{ max-width: ' + avril_site_cntnr_width + 'px;}</style>';
			}

			if ( css_class.length ) {
				css_class.replaceWith( head_append );
			} else {
				$( 'head' ).append( head_append );
			}
			
		});
		
	} );
	
	/**
	 * avril_cntnr_tb_padding
	 */
	wp.customize( 'avril_cntnr_tb_padding', function( value ) {
		value.bind( function( margin ) {
			jQuery( '.av-py-default' ).css( 'padding', margin+ 'px 0' );
		} );
	} );
	
	/**
	 * Breadcrumb Typography
	 */
	range_live_media_load( 'breadcrumb_title_size', '#breadcrumb-section h2', [ 'font-size' ], 'px' );
	range_live_media_load( 'breadcrumb_content_size', '#breadcrumb-section li', [ 'font-size' ], 'px' );
	
	range_live_media_load( 'breadcrumb_min_height', 'div.breadcrumb-content', [ 'min-height' ], 'px' );
	
	
	/**
	 * Sidebar width.
	 */
	wp.customize( 'avril_sidebar_width', function( value ) {		
            'use strict';
            value.bind(
                function( to ){
                    var class_name      = 'customizer-sidebar-width'; // Used as id in gfont link
                    var css_class       = $( '.' + class_name );

                    var sidebar_width   = to;
                    var content_width   = ( 100 - to );

                    var head_append     = '<style class="' + class_name + '">@media (min-width: 992px){#av-secondary-content { max-width: ' + sidebar_width + '%;flex-basis: ' + sidebar_width + '%; } #av-primary-content { max-width: ' + content_width + '%;flex-basis: ' + content_width + '%; }}</style>';

                    if ( css_class.length ) {
                        css_class.replaceWith( head_append );
                    } else {
                        $( 'head' ).append( head_append );
                    }
                }
            );
        }
    );
	
	/**
	 * sidebar_wid_ttl_size
	 */
	range_live_media_load( 'sidebar_wid_ttl_size', '.sidebar .widget .widget-title', [ 'font-size' ], 'px' );
	
	/**
	 * Body font family
	 */
	wp.customize( 'avril_body_font_family', function( value ) {
		value.bind( function( font_family ) {
			jQuery( 'body' ).css( 'font-family', font_family );
		} );
	} );
	
	/**
	 * Body font size
	 */
	
	range_live_media_load( 'avril_body_font_size', 'body', [ 'font-size' ], 'px' );
	
	/**
	 * Body Letter Spacing
	 */
	
	range_live_media_load( 'avril_body_ltr_space', 'body', [ 'letter-spacing' ], 'px' );
	
	/**
	 * Body font weight
	 */
	wp.customize( 'avril_body_font_weight', function( value ) {
		value.bind( function( font_weight ) {
			jQuery( 'body' ).css( 'font-weight', font_weight );
		} );
	} );
	
	/**
	 * Body font style
	 */
	wp.customize( 'avril_body_font_style', function( value ) {
		value.bind( function( font_style ) {
			jQuery( 'body' ).css( 'font-style', font_style );
		} );
	} );
	
	/**
	 * Body Text Decoration
	 */
	wp.customize( 'avril_body_txt_decoration', function( value ) {
		value.bind( function( decoration ) {
			jQuery( 'body, a' ).css( 'text-decoration', decoration );
		} );
	} );
	/**
	 * Body text tranform
	 */
	wp.customize( 'avril_body_text_transform', function( value ) {
		value.bind( function( text_tranform ) {
			jQuery( 'body' ).css( 'text-transform', text_tranform );
		} );
	} );
	
	/**
	 * avril_body_line_height
	 */
	range_live_media_load( 'avril_body_line_height', 'body', [ 'line-height' ] );
	
	/**
	 * H1 font family
	 */
	wp.customize( 'avril_h1_font_family', function( value ) {
		value.bind( function( font_family ) {
			jQuery( 'h1' ).css( 'font-family', font_family );
		} );
	} );
	
	/**
	 * H1 font size
	 */
	range_live_media_load( 'avril_h1_font_size', 'h1', [ 'font-size' ], 'px' );
	
	/**
	 * H1 font style
	 */
	wp.customize( 'avril_h1_font_style', function( value ) {
		value.bind( function( font_style ) {
			jQuery( 'h1' ).css( 'font-style', font_style );
		} );
	} );
	
	/**
	 * H1 Text Decoration
	 */
	wp.customize( 'avril_h1_text_decoration', function( value ) {
		value.bind( function( decoration ) {
			jQuery( 'h1' ).css( 'text-decoration', decoration );
		} );
	} );
	
	/**
	 * H1 font weight
	 */
	wp.customize( 'avril_h1_font_weight', function( value ) {
		value.bind( function( font_weight ) {
			jQuery( 'h1' ).css( 'font-weight', font_weight );
		} );
	} );
	
	/**
	 * H1 text tranform
	 */
	wp.customize( 'avril_h1_text_transform', function( value ) {
		value.bind( function( text_tranform ) {
			jQuery( 'h1' ).css( 'text-transform', text_tranform );
		} );
	} );
	
	/**
	 * H1 line height
	 */
	range_live_media_load( 'avril_h1_line_height', 'h1', [ 'line-height' ] );
	
	/**
	 * H1 Letter Spacing
	 */
	 
	range_live_media_load( 'avril_h1_ltr_spacing', 'h1', [ 'letter-spacing' ], 'px' );
	
	/**
	 * H2 font family
	 */
	wp.customize( 'avril_h2_font_family', function( value ) {
		value.bind( function( font_family ) {
			jQuery( 'h2' ).css( 'font-family', font_family );
		} );
	} );
	
	/**
	 * H2 font size
	 */
	range_live_media_load( 'avril_h2_font_size', 'h2', [ 'font-size' ], 'px' );
	
	/**
	 * H2 font style
	 */
	wp.customize( 'avril_h2_font_style', function( value ) {
		value.bind( function( font_style ) {
			jQuery( 'h2' ).css( 'font-style', font_style );
		} );
	} );
	
	/**
	 * H2 Text Decoration
	 */
	wp.customize( 'avril_h2_text_decoration', function( value ) {
		value.bind( function( decoration ) {
			jQuery( 'h2' ).css( 'text-decoration', decoration );
		} );
	} );
	
	/**
	 * H2 font weight
	 */
	wp.customize( 'avril_h2_font_weight', function( value ) {
		value.bind( function( font_weight ) {
			jQuery( 'h2' ).css( 'font-weight', font_weight );
		} );
	} );
	
	/**
	 * H2 text tranform
	 */
	wp.customize( 'avril_h2_text_transform', function( value ) {
		value.bind( function( text_tranform ) {
			jQuery( 'h2' ).css( 'text-transform', text_tranform );
		} );
	} );
	
	/**
	 * H2 line height
	 */
	range_live_media_load( 'avril_h2_line_height', 'h2', [ 'line-height' ]);
	
	/**
	 * H2 Letter Spacing
	 */
	
	range_live_media_load( 'avril_h2_ltr_spacing', 'h2', [ 'letter-spacing' ], 'px' );
	/**
	 * H3 font family
	 */
	wp.customize( 'avril_h3_font_family', function( value ) {
		value.bind( function( font_family ) {
			jQuery( 'h3' ).css( 'font-family', font_family );
		} );
	} );
	
	/**
	 * H3 font size
	 */
	range_live_media_load( 'avril_h3_font_size', 'h3', [ 'font-size' ], 'px' );
	
	/**
	 * H3 font style
	 */
	wp.customize( 'avril_h3_font_style', function( value ) {
		value.bind( function( font_style ) {
			jQuery( 'h3' ).css( 'font-style', font_style );
		} );
	} );
	
	/**
	 * H3 Text Decoration
	 */
	wp.customize( 'avril_h3_text_decoration', function( value ) {
		value.bind( function( decoration ) {
			jQuery( 'h3' ).css( 'text-decoration', decoration );
		} );
	} );
	
	/**
	 * H3 font weight
	 */
	wp.customize( 'avril_h3_font_weight', function( value ) {
		value.bind( function( font_weight ) {
			jQuery( 'h3' ).css( 'font-weight', font_weight );
		} );
	} );
	
	/**
	 * H3 text tranform
	 */
	wp.customize( 'avril_h3_text_transform', function( value ) {
		value.bind( function( text_tranform ) {
			jQuery( 'h3' ).css( 'text-transform', text_tranform );
		} );
	} );
	
	/**
	 * H3 line height
	 */
	range_live_media_load( 'avril_h3_line_height', 'h3', [ 'line-height' ]);
	
	/**
	 * H3 Letter Spacing
	 */
	
	range_live_media_load( 'avril_h3_ltr_spacing', 'h3', [ 'letter-spacing' ], 'px' );
	
	
	/**
	 * H4 font family
	 */
	wp.customize( 'avril_h4_font_family', function( value ) {
		value.bind( function( font_family ) {
			jQuery( 'h4' ).css( 'font-family', font_family );
		} );
	} );
	
	/**
	 * H4 font size
	 */
	range_live_media_load( 'avril_h4_font_size', 'h4', [ 'font-size' ], 'px' );
	
	/**
	 * H4 font style
	 */
	wp.customize( 'avril_h4_font_style', function( value ) {
		value.bind( function( font_style ) {
			jQuery( 'h4' ).css( 'font-style', font_style );
		} );
	} );
	
	/**
	 * H4 Text Decoration
	 */
	wp.customize( 'avril_h4_text_decoration', function( value ) {
		value.bind( function( decoration ) {
			jQuery( 'h4' ).css( 'text-decoration', decoration );
		} );
	} );
	
	/**
	 * H4 font weight
	 */
	wp.customize( 'avril_h4_font_weight', function( value ) {
		value.bind( function( font_weight ) {
			jQuery( 'h4' ).css( 'font-weight', font_weight );
		} );
	} );
	
	/**
	 * H4 text tranform
	 */
	wp.customize( 'avril_h4_text_transform', function( value ) {
		value.bind( function( text_tranform ) {
			jQuery( 'h4' ).css( 'text-transform', text_tranform );
		} );
	} );
	
	/**
	 * H4 line height
	 */
	range_live_media_load( 'avril_h4_line_height', 'h4', [ 'line-height' ]);
	
	/**
	 * H4 Letter Spacing
	 */
	
		range_live_media_load( 'avril_h4_ltr_spacing', 'h4', [ 'letter-spacing' ], 'px' );
	
	/**
	 * H5 font family
	 */
	wp.customize( 'avril_h5_font_family', function( value ) {
		value.bind( function( font_family ) {
			jQuery( 'h5' ).css( 'font-family', font_family );
		} );
	} );
	
	/**
	 * H5 font size
	 */
	range_live_media_load( 'avril_h5_font_size', 'h5', [ 'font-size' ], 'px' );
	
	/**
	 * H5 font style
	 */
	wp.customize( 'avril_h5_font_style', function( value ) {
		value.bind( function( font_style ) {
			jQuery( 'h5' ).css( 'font-style', font_style );
		} );
	} );
	
	/**
	 * H5 Text Decoration
	 */
	wp.customize( 'avril_h5_text_decoration', function( value ) {
		value.bind( function( decoration ) {
			jQuery( 'h5' ).css( 'text-decoration', decoration );
		} );
	} );
	
	
	/**
	 * H5 font weight
	 */
	wp.customize( 'avril_h5_font_weight', function( value ) {
		value.bind( function( font_weight ) {
			jQuery( 'h5' ).css( 'font-weight', font_weight );
		} );
	} );
	
	/**
	 * H5 text tranform
	 */
	wp.customize( 'avril_h5_text_transform', function( value ) {
		value.bind( function( text_tranform ) {
			jQuery( 'h5' ).css( 'text-transform', text_tranform );
		} );
	} );
	
	/**
	 * H5 line height
	 */
	range_live_media_load( 'avril_h5_line_height', 'h5', [ 'line-height' ]);
	
	/**
	 * H5 Letter Spacing
	 */
	
	range_live_media_load( 'avril_h5_ltr_spacing', 'h5', [ 'letter-spacing' ], 'px' );
	
	/**
	 * H6 font family
	 */
	wp.customize( 'avril_h6_font_family', function( value ) {
		value.bind( function( font_family ) {
			jQuery( 'h6' ).css( 'font-family', font_family );
		} );
	} );
	
	/**
	 * H6 font size
	 */
	range_live_media_load( 'avril_h6_font_size', 'h6', [ 'font-size' ], 'px' );
	
	/**
	 * H6 font style
	 */
	wp.customize( 'avril_h6_font_style', function( value ) {
		value.bind( function( font_style ) {
			jQuery( 'h6' ).css( 'font-style', font_style );
		} );
	} );
	
	/**
	 * H6 Text Decoration
	 */
	wp.customize( 'avril_h6_text_decoration', function( value ) {
		value.bind( function( decoration ) {
			jQuery( 'h6' ).css( 'text-decoration', decoration );
		} );
	} );
	
	
	/**
	 * H6 font weight
	 */
	wp.customize( 'avril_h6_font_weight', function( value ) {
		value.bind( function( font_weight ) {
			jQuery( 'h6' ).css( 'font-weight', font_weight );
		} );
	} );
	
	/**
	 * H6 text tranform
	 */
	wp.customize( 'avril_h6_text_transform', function( value ) {
		value.bind( function( text_tranform ) {
			jQuery( 'h6' ).css( 'text-transform', text_tranform );
		} );
	} );
	
	/**
	 * H6 line height
	 */
	range_live_media_load( 'avril_h6_line_height', 'h6', [ 'line-height' ]);
	
	/**
	 * H6 Letter Spacing
	 */
	
	range_live_media_load( 'avril_h6_ltr_spacing', 'h6', [ 'letter-spacing' ], 'px' );
	
	
	
	
	
	/**
	 * Menu font size
	 */
	
	range_live_media_load( 'avril_menu_font_size', '.menu-wrap > li > a, .dropdown-menu li a', [ 'font-size' ], 'px' );
	
	/**
	 * Menu Letter Spacing
	 */
	
	range_live_media_load( 'avril_menu_ltr_space', '.menu-wrap > li > a, .dropdown-menu li a', [ 'letter-spacing' ], 'px' );
	
	/**
	 * Menu font weight
	 */
	wp.customize( 'avril_menu_font_weight', function( value ) {
		value.bind( function( font_weight ) {
			jQuery( '.menu-wrap > li > a, .dropdown-menu li a' ).css( 'font-weight', font_weight );
		} );
	} );
	
	/**
	 * Menu font style
	 */
	wp.customize( 'avril_menu_font_style', function( value ) {
		value.bind( function( font_style ) {
			jQuery( '.menu-wrap > li > a, .dropdown-menu li a' ).css( 'font-style', font_style );
		} );
	} );
	
	/**
	 * Menu Text Decoration
	 */
	wp.customize( 'avril_menu_txt_decoration', function( value ) {
		value.bind( function( decoration ) {
			jQuery( '.menu-wrap > li > a, .dropdown-menu li a' ).css( 'text-decoration', decoration );
		} );
	} );
	/**
	 * Menu text tranform
	 */
	wp.customize( 'avril_menu_text_transform', function( value ) {
		value.bind( function( text_tranform ) {
			jQuery( '.menu-wrap > li > a, .dropdown-menu li a' ).css( 'text-transform', text_tranform );
		} );
	} );
	
	/**
	 * avril_menu_line_height
	 */
	range_live_media_load( 'avril_menu_line_height', '.menu-wrap > li > a, .dropdown-menu li a', [ 'line-height' ] );
	
} )( jQuery );
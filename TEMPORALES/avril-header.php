<?php
function avril_header_settings( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Header Settings Panel
	=========================================*/
	$wp_customize->add_panel( 
		'header_section', 
		array(
			'priority'      => 2,
			'capability'    => 'edit_theme_options',
			'title'			=> __('Header', 'avril-pro'),
		) 
	);
	
	/*=========================================
	Avril Site Identity
	=========================================*/
	$wp_customize->add_section(
        'title_tagline',
        array(
        	'priority'      => 1,
            'title' 		=> __('Site Identity','avril-pro'),
			'panel'  		=> 'header_section',
		)
    );

	// Logo Width // 
	if ( class_exists( 'Avril_Customizer_Range_Control' ) ) {
		$wp_customize->add_setting(
			'logo_width',
			array(
				'default'			=> '140',
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'avril_sanitize_range_value',
				'transport'         => 'postMessage',
			)
		);
		$wp_customize->add_control( 
		new Avril_Customizer_Range_Control( $wp_customize, 'logo_width', 
			array(
				'label'      => __( 'Logo Width', 'avril-pro' ),
				'section'  => 'title_tagline',
				 'media_query'   => true,
					'input_attr'    => array(
						'mobile'  => array(
							'min'           => 0,
							'max'           => 500,
							'step'          => 1,
							'default_value' => 140,
						),
						'tablet'  => array(
							'min'           => 0,
							'max'           => 500,
							'step'          => 1,
							'default_value' => 140,
						),
						'desktop' => array(
							'min'           => 0,
							'max'           => 500,
							'step'          => 1,
							'default_value' => 140,
						),
					),
			) ) 
		);
	}
	
	// Typography
	$wp_customize->add_setting(
		'logo_typography'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'logo_typography',
		array(
			'type' => 'hidden',
			'label' => __('Typography','avril-pro'),
			'section' => 'title_tagline',
			'priority' => 100,
		)
	);
	
	// Site Title Font Size// 
	if ( class_exists( 'Avril_Customizer_Range_Control' ) ) {
		$wp_customize->add_setting(
			'site_ttl_size',
			array(
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'avril_sanitize_range_value',
				'transport'         => 'postMessage'
			)
		);
		$wp_customize->add_control( 
		new Avril_Customizer_Range_Control( $wp_customize, 'site_ttl_size', 
			array(
				'label'      => __( 'Site Title Font Size', 'avril-pro' ),
				'section'  => 'title_tagline',
				'priority' => 101,
				 'media_query'   => true,
                'input_attr'    => array(
                    'mobile'  => array(
                        'min'           => 0,
                        'max'           => 100,
                        'step'          => 1,
                        'default_value' => 30,
                    ),
                    'tablet'  => array(
                        'min'           => 0,
                        'max'           => 100,
                        'step'          => 1,
                        'default_value' => 30,
                    ),
                    'desktop' => array(
                        'min'           => 0,
                        'max'           => 100,
                        'step'          => 1,
                        'default_value' => 30,
                    ),
                ),
			) ) 
		);

	// Site Description Font Size// 	
		$wp_customize->add_setting(
			'site_desc_size',
			array(
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'avril_sanitize_range_value',
				'transport'         => 'postMessage'
			)
		);
		$wp_customize->add_control( 
		new Avril_Customizer_Range_Control( $wp_customize, 'site_desc_size', 
			array(
				'label'      => __( 'Site Description Font Size', 'avril-pro' ),
				'section'  => 'title_tagline',
				'priority' => 102,
				 'media_query'   => true,
                'input_attr'    => array(
                    'mobile'  => array(
                        'min'           => 0,
                        'max'           => 100,
                        'step'          => 1,
                        'default_value' => 12,
                    ),
                    'tablet'  => array(
                        'min'           => 0,
                        'max'           => 100,
                        'step'          => 1,
                        'default_value' => 12,
                    ),
                    'desktop' => array(
                        'min'           => 0,
                        'max'           => 100,
                        'step'          => 1,
                        'default_value' => 12,
                    ),
                ),
			) ) 
		);
	}
	
	/*=========================================
	Avril Header Types
	=========================================*/
	$wp_customize->add_section(
        'header_type',
        array(
        	'priority'      => 2,
            'title' 		=> __('Header Type','avril-pro'),
			'panel'  		=> 'header_section',
		)
    );
	
	$wp_customize->add_setting( 
		'avril_header_type' , 
			array(
			'default' => __('header-default', 'avril-pro' ),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_text',
		) 
	);

	$wp_customize->add_control(
	'avril_header_type' , 
		array(
			'label'          => __( 'Header Type', 'avril-pro' ),
			'section'        => 'header_type',
			'type'           => 'select',
			'choices'        => 
			array(
				'header-default'      									=> __( 'Header 1', 'avril-pro' ),
				'header-center' 										=> __( 'Header 2', 'avril-pro' ),
				'header-center header-transparent' 						=> __( 'Header 3', 'avril-pro' ),
				'header-transparent'   									=> __( 'Header 4', 'avril-pro' ),
				'header-above-light header-transparent'   				=> __( 'Header 5', 'avril-pro' ),
				'header-above-light'   									=> __( 'Header 6', 'avril-pro' ),
				'header-above-light header-center'   					=> __( 'Header 7', 'avril-pro' ),
				'header-above-light header-center header-transparent' 	=> __( 'Header 8', 'avril-pro' ),
			) 
		) 
	);
	
	
	/*=========================================
	Above Header Section
	=========================================*/
	$wp_customize->add_section(
        'above_header',
        array(
        	'priority'      => 2,
            'title' 		=> __('Above Header','avril-pro'),
			'panel'  		=> 'header_section',
		)
    );
	
	if ( class_exists( 'Avril_Customize_Control_Radio_Image' ) ) {

		$wp_customize->add_setting(
			'header_above_layout', array(
				'sanitize_callback' => 'avril_sanitize_text',
				'default' => 'layout-2',
			)
		);

		$wp_customize->add_control(
			new Avril_Customize_Control_Radio_Image(
				$wp_customize, 'header_above_layout', array(
					'label'     => esc_html__( 'Layout', 'avril-pro' ),
					'section'   => 'above_header',
					'priority'  => 2,
					'choices'   => array(
						'disable' => array(
							'url' => apply_filters( 'disable', trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/images/none.svg' ),
						),
						'layout-1' => array(
							'url' => apply_filters( 'layout-1', trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/images/full-width.svg' ),
						),
						'layout-2' => array(
							'url' => apply_filters( 'layout-2', trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/images/layout-center.svg' ),
						),
					),
				)
			)
		);
	}

	$wp_customize->add_setting( 
		'above_header_first' , 
			array(
			'default' => __('social', 'avril-pro' ),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_select',
		) 
	);

	$wp_customize->add_control(
	'above_header_first' , 
		array(
			'label'          => __( 'Section 1', 'avril-pro' ),
			'section'        => 'above_header',
			'type'           => 'select',
			'choices'        => 
			array(
				''       => __( 'None', 'avril-pro' ),
				'social' => __( 'Social', 'avril-pro' ),
				'widget' => __( 'Widget', 'avril-pro' ),
				'menu'   => __( 'Header Menu', 'avril-pro' ),
				'shortcode'   => __( 'Shortcode', 'avril-pro' ),
			) 
		) 
	);
	
	
	
	$wp_customize->add_setting( 
		'hide_show_social_icon' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_checkbox',
			'transport'         => $selective_refresh,
			'priority' => 1,
		) 
	);
	
	$wp_customize->add_control(
	'hide_show_social_icon', 
		array(
			'label'	      => esc_html__( 'Hide/Show', 'avril-pro' ),
			'section'     => 'above_header',
			'type'        => 'checkbox'
		) 
	);
	
	/**
	 * Customizer Repeater
	 */
		$wp_customize->add_setting( 'social_icons', 
			array(
			 'sanitize_callback' => 'avril_repeater_sanitize',
			 'priority' => 2,
			 'default' => avril_get_social_icon_default()
		)
		);
		
		$wp_customize->add_control( 
			new AVRIL_Repeater( $wp_customize, 
				'social_icons', 
					array(
						'label'   => esc_html__('Social Icons','avril-pro'),
						'section' => 'above_header',
						'customizer_repeater_icon_control' => true,
						'customizer_repeater_link_control' => true,
					) 
				) 
			);
	
	// Header first Shortcode // 
	$wp_customize->add_setting(
    	'abv_hdr_first_shortcode',
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_html',
		)
	);	

	$wp_customize->add_control( 
		'abv_hdr_first_shortcode',
		array(
		    'label'   		=> __('Section 1 Shortcode','avril-pro'),
		    'section'		=> 'above_header',
			'type' 			=> 'textarea',
			'transport'         => $selective_refresh,
		)  
	);	
	
	$wp_customize->add_setting( 
		'above_header_second' , 
			array(
			'default' => __('contact', 'avril-pro' ),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_select',
		) 
	);

	$wp_customize->add_control(
	'above_header_second' , 
		array(
			'label'          => __( 'Section 2', 'avril-pro' ),
			'section'        => 'above_header',
			'type'           => 'select',
			'choices'        => 
			array(
				''       => __( 'None', 'avril-pro' ),
				'contact' => __( 'Contact', 'avril-pro' ),
				'widget' => __( 'Widget', 'avril-pro' ),
				'menu'   => __( 'Header Menu', 'avril-pro' ),
				'shortcode'   => __( 'Shortcode', 'avril-pro' ),
			) 
		) 
	);
	
	// Mobile
	$wp_customize->add_setting(
		'hdr_top_mbl'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_text',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
	'hdr_top_mbl',
		array(
			'type' => 'hidden',
			'label' => __('Phone','avril-pro'),
			'section' => 'above_header',
			
		)
	);
	$wp_customize->add_setting( 
		'hide_show_mbl_details' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_checkbox',
			'transport'         => $selective_refresh,
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'hide_show_mbl_details', 
		array(
			'label'	      => esc_html__( 'Hide/Show', 'avril-pro' ),
			'section'     => 'above_header',
			'type'        => 'checkbox'
		) 
	);	
	// icon // 
	$wp_customize->add_setting(
    	'tlh_mobile_icon',
    	array(
	        'default' => 'fa-map-marker',
			'sanitize_callback' => 'sanitize_text_field',
			'capability' => 'edit_theme_options',
		)
	);	

	$wp_customize->add_control(new Avril_Icon_Picker_Control($wp_customize, 
		'tlh_mobile_icon',
		array(
		    'label'   		=> __('Icon','avril-pro'),
		    'section' 		=> 'above_header',
			'iconset' => 'fa',
			
		))  
	);
	
	// Mobile title // 
	$wp_customize->add_setting(
    	'tlh_mobile_title',
    	array(
	        'default'			=> __('Online 24x7','avril-pro'),
			'sanitize_callback' => 'avril_sanitize_text',
			'transport'         => $selective_refresh,
			'capability' => 'edit_theme_options',
			'priority' => 3,
		)
	);	

	$wp_customize->add_control( 
		'tlh_mobile_title',
		array(
		    'label'   		=> __('Title','avril-pro'),
		    'section' 		=> 'above_header',
			'type'		 =>	'text'
		)  
	);
	
	// Mobile subtitle // 
	$wp_customize->add_setting(
    	'tlh_mobile_sbtitle',
    	array(
	        'default'			=> __('5589953904','avril-pro'),
			'sanitize_callback' => 'avril_sanitize_text',
			'capability' => 'edit_theme_options',
			'transport'         => $selective_refresh,
			'priority' => 4,
		)
	);	

	$wp_customize->add_control( 
		'tlh_mobile_sbtitle',
		array(
		    'label'   		=> __('Subtitle','avril-pro'),
		    'section' 		=> 'above_header',
			'type'		 =>	'text'
		)  
	);
	// Mobile
	$wp_customize->add_setting(
		'hdr_top_email'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_text',
			'priority' => 5,
		)
	);

	$wp_customize->add_control(
	'hdr_top_email',
		array(
			'type' => 'hidden',
			'label' => __('Email','avril-pro'),
			'section' => 'above_header',
		)
	);
	$wp_customize->add_setting( 
		'hide_show_email_details' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_checkbox',
			'transport'         => $selective_refresh,
			'priority' => 6,
		) 
	);
	
	$wp_customize->add_control(
	'hide_show_email_details', 
		array(
			'label'	      => esc_html__( 'Hide/Show', 'avril-pro' ),
			'section'     => 'above_header',
			'type'        => 'checkbox'
		) 
	);	
	
	// icon // 
	$wp_customize->add_setting(
    	'tlh_email_icon',
    	array(
	        'default' => 'fa-phone',
			'sanitize_callback' => 'sanitize_text_field',
			'capability' => 'edit_theme_options',
		)
	);	

	$wp_customize->add_control(new Avril_Icon_Picker_Control($wp_customize, 
		'tlh_email_icon',
		array(
		    'label'   		=> __('Icon','avril-pro'),
		    'section' 		=> 'above_header',
			'iconset' => 'fa',
			
		))  
	);	
	// Mobile title // 
	$wp_customize->add_setting(
    	'tlh_email_title',
    	array(
	        'default'			=> __('Email Us','avril-pro'),
			'sanitize_callback' => 'avril_sanitize_text',
			'capability' => 'edit_theme_options',
			'transport'         => $selective_refresh,
			'priority' => 7,
		)
	);	

	$wp_customize->add_control( 
		'tlh_email_title',
		array(
		    'label'   		=> __('Title','avril-pro'),
		    'section' 		=> 'above_header',
			'type'		 =>	'text'
		)  
	);
	
	// Mobile subtitle // 
	$wp_customize->add_setting(
    	'tlh_email_sbtitle',
    	array(
	        'default'			=> __('informes@compressmania.com','avril-pro'),
			'sanitize_callback' => 'avril_sanitize_text',
			'transport'         => $selective_refresh,
			'capability' => 'edit_theme_options',
			'priority' => 8,
		)
	);	

	$wp_customize->add_control( 
		'tlh_email_sbtitle',
		array(
		    'label'   		=> __('Subtitle','avril-pro'),
		    'section' 		=> 'above_header',
			'type'		 =>	'text'
		)  
	);
	
	// Contact
	$wp_customize->add_setting(
		'hdr_top_contact'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_text',
			'priority' => 9,
		)
	);

	$wp_customize->add_control(
	'hdr_top_contact',
		array(
			'type' => 'hidden',
			'label' => __('Contact','avril-pro'),
			'section' => 'above_header',
		)
	);
	$wp_customize->add_setting( 
		'hide_show_cntct_details' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_checkbox',
			'transport'         => $selective_refresh,
			'priority' => 10,
		) 
	);
	
	$wp_customize->add_control(
	'hide_show_cntct_details', 
		array(
			'label'	      => esc_html__( 'Hide/Show', 'avril-pro' ),
			'section'     => 'above_header',
			'type'        => 'checkbox'
		) 
	);	
	
	// icon // 
	$wp_customize->add_setting(
    	'tlh_contct_icon',
    	array(
	        'default' => 'fa-clock-o',
			'sanitize_callback' => 'sanitize_text_field',
			'capability' => 'edit_theme_options',
		)
	);	

	$wp_customize->add_control(new Avril_Icon_Picker_Control($wp_customize, 
		'tlh_contct_icon',
		array(
		    'label'   		=> __('Icon','avril-pro'),
		    'section' 		=> 'above_header',
			'iconset' => 'fa',
			
		))  
	);		
	// Mobile title // 
	$wp_customize->add_setting(
    	'tlh_contact_title',
    	array(
	        'default'			=> __('8:00AM - 6:00PM','avril-pro'),
			'sanitize_callback' => 'avril_sanitize_text',
			'transport'         => $selective_refresh,
			'capability' => 'edit_theme_options',
			'priority' => 11,
		)
	);	

	$wp_customize->add_control( 
		'tlh_contact_title',
		array(
		    'label'   		=> __('Title','avril-pro'),
		    'section' 		=> 'above_header',
			'type'		 =>	'text'
		)  
	);
	
	// Mobile subtitle // 
	$wp_customize->add_setting(
    	'tlh_contact_sbtitle',
    	array(
	        'default'			=> __('Monday to Saturday','avril-pro'),
			'sanitize_callback' => 'avril_sanitize_text',
			'transport'         => $selective_refresh,
			'capability' => 'edit_theme_options',
			'priority' => 12,
		)
	);	

	$wp_customize->add_control( 
		'tlh_contact_sbtitle',
		array(
		    'label'   		=> __('Subtitle','avril-pro'),
		    'section' 		=> 'above_header',
			'type'		 =>	'text'
		)  
	);
	
	
	// Header Second Shortcode // 
	$wp_customize->add_setting(
    	'abv_hdr_second_shortcode',
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_html',
		)
	);	

	$wp_customize->add_control( 
		'abv_hdr_second_shortcode',
		array(
		    'label'   		=> __('Section 2 Shortcode','avril-pro'),
		    'section'		=> 'above_header',
			'type' 			=> 'textarea',
			'transport'         => $selective_refresh,
		)  
	);	
	
	/*=========================================
	Top Header Left
	=========================================*/
	$wp_customize->add_section(
        'header_top_left',
        array(
        	'priority'      => 1,
            'title' 		=> __('Top Left Header','avril-pro'),
			'panel'  		=> 'header_section',
		)
    );
	
	
	/*=========================================
	Top Header Left
	=========================================*/	
	$wp_customize->add_section(
        'header_top_right',
        array(
        	'priority'      => 2,
            'title' 		=> __('Top Right Header','avril-pro'),
			'panel'  		=> 'header_section',
		)
    );
	
	
	/*=========================================
	Header Navigation
	=========================================*/	
	$wp_customize->add_section(
        'header_navigation',
        array(
        	'priority'      => 4,
            'title' 		=> __('Header Navigation','avril-pro'),
			'panel'  		=> 'header_section',
		)
    );
	
	// Search
	$wp_customize->add_setting(
		'hdr_nav_search'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_text',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
	'hdr_nav_search',
		array(
			'type' => 'hidden',
			'label' => __('Search','avril-pro'),
			'section' => 'header_navigation',
		)
	);
	$wp_customize->add_setting( 
		'hide_show_search' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_checkbox',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'hide_show_search', 
		array(
			'label'	      => esc_html__( 'Hide/Show', 'avril-pro' ),
			'section'     => 'header_navigation',
			'type'        => 'checkbox'
		) 
	);	
	
	// Cart
	$wp_customize->add_setting(
		'hdr_nav_cart'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_text',
			'priority' => 3,
		)
	);

	$wp_customize->add_control(
	'hdr_nav_cart',
		array(
			'type' => 'hidden',
			'label' => __('Cart','avril-pro'),
			'section' => 'header_navigation',
		)
	);
	$wp_customize->add_setting( 
		'hide_show_cart' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_checkbox',
			'priority' => 4,
		) 
	);
	
	$wp_customize->add_control(
	'hide_show_cart', 
		array(
			'label'	      => esc_html__( 'Hide/Show', 'avril-pro' ),
			'section'     => 'header_navigation',
			'type'        => 'checkbox'
		) 
	);	
	
	// Button
	$wp_customize->add_setting(
		'hdr_nav_btn'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_text',
			'priority' => 5,
		)
	);

	$wp_customize->add_control(
	'hdr_nav_btn',
		array(
			'type' => 'hidden',
			'label' => __('Button','avril-pro'),
			'section' => 'header_navigation',
		)
	);
	$wp_customize->add_setting( 
		'hide_show_nav_btn' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_checkbox',
			'transport'         => $selective_refresh,
			'priority' => 6,
		) 
	);
	
	$wp_customize->add_control(
	'hide_show_nav_btn', 
		array(
			'label'	      => esc_html__( 'Hide/Show', 'avril-pro' ),
			'section'     => 'header_navigation',
			'type'        => 'checkbox'
		) 
	);	
	
	// Button Label // 
	$wp_customize->add_setting(
    	'nav_btn_lbl',
    	array(
	        'default'			=> __('Book Now','avril-pro'),
			'sanitize_callback' => 'avril_sanitize_text',
			'capability' => 'edit_theme_options',
			'priority' => 7,
		)
	);	

	$wp_customize->add_control( 
		'nav_btn_lbl',
		array(
		    'label'   		=> __('Button Label','avril-pro'),
		    'section' 		=> 'header_navigation',
			'type'		 =>	'text'
		)  
	);
	
	// Button Link // 
	$wp_customize->add_setting(
    	'nav_btn_link',
    	array(
	        'default'			=> __('#','avril-pro'),
			'sanitize_callback' => 'avril_sanitize_url',
			'capability' => 'edit_theme_options',
			'priority' => 8,
		)
	);	

	$wp_customize->add_control( 
		'nav_btn_link',
		array(
		    'label'   		=> __('Button Link','avril-pro'),
		    'section' 		=> 'header_navigation',
			'type'		 =>	'text'
		)  
	);
	
	/*=========================================
	Sticky Header
	=========================================*/	
	$wp_customize->add_section(
        'sticky_header_set',
        array(
        	'priority'      => 4,
            'title' 		=> __('Sticky Header','avril-pro'),
			'panel'  		=> 'header_section',
		)
    );
	
	// Heading
	$wp_customize->add_setting(
		'sticky_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_text',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
	'sticky_head',
		array(
			'type' => 'hidden',
			'label' => __('Sticky Header','avril-pro'),
			'section' => 'sticky_header_set',
		)
	);
	$wp_customize->add_setting( 
		'hide_show_sticky' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_checkbox',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'hide_show_sticky', 
		array(
			'label'	      => esc_html__( 'Hide/Show', 'avril-pro' ),
			'section'     => 'sticky_header_set',
			'type'        => 'checkbox'
		) 
	);	
}
add_action( 'customize_register', 'avril_header_settings' );

// Header selective refresh
function avril_header_partials( $wp_customize ){

	// hide show Social
	$wp_customize->selective_refresh->add_partial(
		'hide_show_social_icon', array(
			'selector' => '#above-header .widget_social_widget',
			'container_inclusive' => true,
			'render_callback' => 'header_top_right',
			'fallback_refresh' => true,
		)
	);
	// hide_show_cntct_details
	$wp_customize->selective_refresh->add_partial(
		'hide_show_cntct_details', array(
			'selector' => '#above-header .wgt-1',
			'container_inclusive' => true,
			'render_callback' => 'header_top_right',
			'fallback_refresh' => true,
		)
	);
	// hide_show_email_details
	$wp_customize->selective_refresh->add_partial(
		'hide_show_email_details', array(
			'selector' => '#above-header .wgt-2',
			'container_inclusive' => true,
			'render_callback' => 'header_top_right',
			'fallback_refresh' => true,
		)
	);
	// hide_show_mbl_details
	$wp_customize->selective_refresh->add_partial(
		'hide_show_mbl_details', array(
			'selector' => '#above-header .wgt-3',
			'container_inclusive' => true,
			'render_callback' => 'header_top_left',
			'fallback_refresh' => true,
		)
	);
	
	// hide_show_nav_btn
	$wp_customize->selective_refresh->add_partial(
		'hide_show_nav_btn', array(
			'selector' => '.navigator .av-button-area',
			'container_inclusive' => true,
			'render_callback' => 'header_navigation',
			'fallback_refresh' => true,
		)
	);
	// tlh_mobile_title
	$wp_customize->selective_refresh->add_partial( 'tlh_mobile_title', array(
		'selector'            => '#above-header .wgt-3 .text',
		'settings'            => 'tlh_mobile_title',
		'render_callback'  => 'avril_tlh_mobile_title_render_callback',
	) );
	
	// tlh_mobile_sbtitle
	$wp_customize->selective_refresh->add_partial( 'tlh_mobile_sbtitle', array(
		'selector'            => '#above-header .wgt-3 .title',
		'settings'            => 'tlh_mobile_sbtitle',
		'render_callback'  => 'avril_tlh_mobile_sbtitle_render_callback',
	) );
	
	// tlh_email_title
	$wp_customize->selective_refresh->add_partial( 'tlh_email_title', array(
		'selector'            => '#above-header .wgt-2 .text',
		'settings'            => 'tlh_email_title',
		'render_callback'  => 'avril_tlh_email_title_render_callback',
	) );
	
	// tlh_email_sbtitle
	$wp_customize->selective_refresh->add_partial( 'tlh_email_sbtitle', array(
		'selector'            => '#above-header .wgt-2 .title',
		'settings'            => 'tlh_email_sbtitle',
		'render_callback'  => 'avril_tlh_email_sbtitle_render_callback',
	) );
	
	// tlh_contact_title
	$wp_customize->selective_refresh->add_partial( 'tlh_contact_title', array(
		'selector'            => '#above-header .wgt-1 .text',
		'settings'            => 'tlh_contact_title',
		'render_callback'  => 'avril_tlh_contact_title_render_callback',
	) );
	
	// tlh_contact_sbtitle
	$wp_customize->selective_refresh->add_partial( 'tlh_contact_sbtitle', array(
		'selector'            => '#above-header .wgt-1 .title',
		'settings'            => 'tlh_contact_sbtitle',
		'render_callback'  => 'avril_tlh_contact_sbtitle_render_callback',
	) );
	}

add_action( 'customize_register', 'avril_header_partials' );

// tlh_mobile_title
function avril_tlh_mobile_title_render_callback() {
	return get_theme_mod( 'tlh_mobile_title' );
}

// tlh_mobile_sbtitle
function avril_tlh_mobile_sbtitle_render_callback() {
	return get_theme_mod( 'tlh_mobile_sbtitle' );
}

// tlh_email_title
function avril_tlh_email_title_render_callback() {
	return get_theme_mod( 'tlh_email_title' );
}

// tlh_email_sbtitle
function avril_tlh_email_sbtitle_render_callback() {
	return get_theme_mod( 'tlh_email_sbtitle' );
}

// tlh_contact_title
function avril_tlh_contact_title_render_callback() {
	return get_theme_mod( 'tlh_contact_title' );
}

// tlh_contact_sbtitle
function avril_tlh_contact_sbtitle_render_callback() {
	return get_theme_mod( 'tlh_contact_sbtitle' );
}
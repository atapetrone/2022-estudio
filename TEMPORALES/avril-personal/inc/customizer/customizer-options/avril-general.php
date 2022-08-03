<?php
function avril_genearl_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	$wp_customize->add_panel(
		'avril_general', array(
			'priority' => 31,
			'title' => esc_html__( 'General', 'avril-pro' ),
		)
	);
	
	/*=========================================
	Preloader
	=========================================*/
	$wp_customize->add_section(
		'preloader', array(
			'title' => esc_html__( 'Preloader', 'avril-pro' ),
			'priority' => 1,
			'panel' => 'avril_general',
		)
	);
	
	$wp_customize->add_setting( 
		'hs_preloader' , 
			array(
			'default' => '',
			'sanitize_callback' => 'avril_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 1,
		) 
	);
	
	$wp_customize->add_control(
	'hs_preloader', 
		array(
			'label'	      => esc_html__( 'Hide / Show Preloader', 'avril-pro' ),
			'section'     => 'preloader',
			'type'        => 'checkbox'
		) 
	);
	
	/*=========================================
	Scroller
	=========================================*/
	$wp_customize->add_section(
		'top_scroller', array(
			'title' => esc_html__( 'Top Scroller', 'avril-pro' ),
			'priority' => 4,
			'panel' => 'avril_general',
		)
	);
	
	$wp_customize->add_setting( 
		'hs_scroller' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'avril_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 1,
		) 
	);
	
	$wp_customize->add_control(
	'hs_scroller', 
		array(
			'label'	      => esc_html__( 'Hide / Show Scroller', 'avril-pro' ),
			'section'     => 'top_scroller',
			'type'        => 'checkbox'
		) 
	);
	
	// Scroller icon // 
	$wp_customize->add_setting(
    	'scroller_icon',
    	array(
	        'default' => 'fa-arrow-up',
			'sanitize_callback' => 'sanitize_text_field',
			'capability' => 'edit_theme_options',
		)
	);	

	$wp_customize->add_control(new Avril_Icon_Picker_Control($wp_customize, 
		'scroller_icon',
		array(
		    'label'   		=> __('Scroller Icon','avril-pro'),
		    'section' 		=> 'top_scroller',
			'iconset' => 'fa',
			
		))  
	);
	/*=========================================
	Breadcrumb  Section
	=========================================*/
	$wp_customize->add_section(
		'breadcrumb_setting', array(
			'title' => esc_html__( 'Page Breadcrumb', 'avril-pro' ),
			'priority' => 12,
			'panel' => 'avril_general',
		)
	);
	
	// Settings
	$wp_customize->add_setting(
		'breadcrumb_settings'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_text',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
	'breadcrumb_settings',
		array(
			'type' => 'hidden',
			'label' => __('Settings','avril-pro'),
			'section' => 'breadcrumb_setting',
		)
	);
	
	// Breadcrumb Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'hs_breadcrumb' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'avril_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'transport'         => $selective_refresh,
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'hs_breadcrumb', 
		array(
			'label'	      => esc_html__( 'Hide / Show Section', 'avril-pro' ),
			'section'     => 'breadcrumb_setting',
			'settings'    => 'hs_breadcrumb',
			'type'        => 'checkbox'
		) 
	);
	
	// Breadcrumb Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'hs_breadcrumb_bottom' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'avril_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'transport'         => $selective_refresh,
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'hs_breadcrumb_bottom', 
		array(
			'label'	      => esc_html__( 'Hide / Show Breadcrumb Bottom', 'avril-pro' ),
			'section'     => 'breadcrumb_setting',
			'settings'    => 'hs_breadcrumb_bottom',
			'type'        => 'checkbox'
		) 
	);
	
	// Breadcrumb Hide/ Show Subscribe // 
	$wp_customize->add_setting( 
		'hs_breadcrumb_subs' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'avril_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'transport'         => $selective_refresh,
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'hs_breadcrumb_subs', 
		array(
			'label'	      => esc_html__( 'Hide / Show Subscribe', 'avril-pro' ),
			'section'     => 'breadcrumb_setting',
			'settings'    => 'hs_breadcrumb_subs',
			'type'        => 'checkbox'
		) 
	);
	
	// enable on Page Title
	$wp_customize->add_setting(
		'breadcrumb_title_enable'
			,array(
			'default' => '1',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_checkbox',
			'priority' => 3,
			'transport'         => $selective_refresh,
		)
	);

	$wp_customize->add_control(
	'breadcrumb_title_enable',
		array(
			'type' => 'checkbox',
			'label' => __('Enable Page Title on Breadcrumb?','avril-pro'),
			'section' => 'breadcrumb_setting',
		)
	);
	
	// enable on Page Path
	$wp_customize->add_setting(
		'breadcrumb_path_enable'
			,array(
			'default' => '1',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_checkbox',
			'priority' => 4,
			'transport'         => $selective_refresh,
		)
	);

	$wp_customize->add_control(
	'breadcrumb_path_enable',
		array(
			'type' => 'checkbox',
			'label' => __('Enable Page Path on Breadcrumb?','avril-pro'),
			'section' => 'breadcrumb_setting',
		)
	);
	
	// Breadcrumb Content Section // 
	$wp_customize->add_setting(
		'breadcrumb_contents'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_text',
			'priority' => 5,
		)
	);

	$wp_customize->add_control(
	'breadcrumb_contents',
		array(
			'type' => 'hidden',
			'label' => __('Content','avril-pro'),
			'section' => 'breadcrumb_setting',
		)
	);
	
	
	// Breadcrumb Align // 
	$wp_customize->add_setting( 
		'breadcrumb_align' , 
			array(
			'default' => __('center', 'avril-pro'),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_select',
			'priority' => 6,
		) 
	);

	$wp_customize->add_control(
	'breadcrumb_align' , 
		array(
			'label'          => __( 'Alignment', 'avril-pro'),
			'section'        => 'breadcrumb_setting',
			'type'           => 'select',
			'priority'  	 => 10,
			'choices'        => 
			array(
				'left'       => __( 'Left', 'avril-pro'),
				'center' => __( 'Center', 'avril-pro'),
				'right' => __( 'Right', 'avril-pro')
			) 
		) 
	);	
	
	// Seprator // 
	$wp_customize->add_setting(
    	'breadcrumb_seprator',
    	array(
			'default'      => __( '>', 'avril-pro'),
			'sanitize_callback' => 'avril_sanitize_text',
			'capability' => 'edit_theme_options',
			'priority' => 7,
		)
	);	

	$wp_customize->add_control( 
		'breadcrumb_seprator',
		array(
		    'label'   => esc_html__('Seprator','avril-pro'),
		    'section' => 'breadcrumb_setting',
			'type' => 'text',
		)  
	);
	
	$wp_customize->add_setting(
    	'breadcrumb_sub_shortcode',
    	array(
			'sanitize_callback' => 'avril_sanitize_html',
			'capability' => 'edit_theme_options',
			'priority' => 7,
		)
	);	

	$wp_customize->add_control( 
		'breadcrumb_sub_shortcode',
		array(
		    'label'   => esc_html__('Subscribe Shortcode','avril-pro'),
		    'section' => 'breadcrumb_setting',
			'type' => 'textarea',
		)  
	);
	
	// Content size // 
	$wp_customize->add_setting(
    	'breadcrumb_min_height',
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_range_value',
			'transport'         => 'postMessage',
			'priority' => 8,
		)
	);
	$wp_customize->add_control( 
		new Avril_Customizer_Range_Control( $wp_customize, 'breadcrumb_min_height', 
			array(
				'label'      => __( 'Min Height', 'avril-pro'),
				'section'  => 'breadcrumb_setting',
				'media_query'   => true,
				'input_attr'    => array(
					'mobile'  => array(
						'min'           => 0,
						'max'           => 1000,
						'step'          => 1,
						'default_value' => 236,
					),
					'tablet'  => array(
						'min'           => 0,
						'max'           => 1000,
						'step'          => 1,
						'default_value' => 236,
					),
					'desktop' => array(
						'min'           => 0,
						'max'           => 1000,
						'step'          => 1,
						'default_value' => 236,
					),
				),
			) ) 
		);
		
	// Background // 
	$wp_customize->add_setting(
		'breadcrumb_bg_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_text',
			'priority' => 9,
		)
	);

	$wp_customize->add_control(
	'breadcrumb_bg_head',
		array(
			'type' => 'hidden',
			'label' => __('Background','avril-pro'),
			'section' => 'breadcrumb_setting',
		)
	);
	
	// Background Image // 
    $wp_customize->add_setting( 
    	'breadcrumb_bg_img' , 
    	array(
			'default' 			=> get_template_directory_uri() .'/assets/images/bg/breadcrumbg.jpg',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_url',	
			'priority' => 10,
		) 
	);
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize , 'breadcrumb_bg_img' ,
		array(
			'label'          => esc_html__( 'Background Image', 'avril-pro'),
			'section'        => 'breadcrumb_setting',
		) 
	));
	
	// Background Attachment // 
	$wp_customize->add_setting( 
		'breadcrumb_back_attach' , 
			array(
			'default' => 'scroll',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_select',
			'priority'  => 10,
		) 
	);
	
	$wp_customize->add_control(
	'breadcrumb_back_attach' , 
		array(
			'label'          => __( 'Background Attachment', 'avril-pro' ),
			'section'        => 'breadcrumb_setting',
			'type'           => 'select',
			'choices'        => 
			array(
				'inherit' => __( 'Inherit', 'avril-pro' ),
				'scroll' => __( 'Scroll', 'avril-pro' ),
				'fixed'   => __( 'Fixed', 'avril-pro' )
			) 
		) 
	);
	
	// Image Opacity // 
	if ( class_exists( 'Avril_Customizer_Range_Control' ) ) {
	$wp_customize->add_setting(
    	'breadcrumb_bg_img_opacity',
    	array(
	        'default'			=> '0.75',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_range_value',
			'priority'  => 11,
		)
	);
	$wp_customize->add_control( 
	new Avril_Customizer_Range_Control( $wp_customize, 'breadcrumb_bg_img_opacity', 
		array(
			'label'      => __( 'Opacity', 'avril-pro'),
			'section'  => 'breadcrumb_setting',
			'settings' => 'breadcrumb_bg_img_opacity',
			 'media_query'   => false,
                'input_attr'    => array(
                    'desktop' => array(
                        'min'           => 0,
                        'max'           => 1,
                        'step'          => 0.1,
                        'default_value' => 0.6,
                    ),
                ),
		) ) 
	);
	}
	
	$wp_customize->add_setting(
	'breadcrumb_overlay_color', 
	array(
		'default' => '#000000',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'priority'  => 12,
    ));
	
	$wp_customize->add_control( 
		new WP_Customize_Color_Control
		($wp_customize, 
			'breadcrumb_overlay_color', 
			array(
				'label'      => __( 'Overlay Color', 'avril-pro'),
				'section'    => 'breadcrumb_setting',
			) 
		) 
	);
	
	// Typography
	$wp_customize->add_setting(
		'breadcrumb_typography'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_text',
			'priority'  => 13,
		)
	);

	$wp_customize->add_control(
	'breadcrumb_typography',
		array(
			'type' => 'hidden',
			'label' => __('Typography','avril-pro'),
			'section' => 'breadcrumb_setting',
		)
	);
	
	if ( class_exists( 'Avril_Customizer_Range_Control' ) ) {
	// Title size // 
	$wp_customize->add_setting(
    	'breadcrumb_title_size',
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_range_value',
			'transport'         => 'postMessage',
			'priority'  => 14,
		)
	);
	$wp_customize->add_control( 
	new Avril_Customizer_Range_Control( $wp_customize, 'breadcrumb_title_size', 
		array(
			'label'      => __( 'Title Size', 'avril-pro' ),
			'section'  => 'breadcrumb_setting',
			'media_query'   => true,
			'input_attr'    => array(
				'mobile'  => array(
					'min'           => 0,
					'max'           => 100,
					'step'          => 1,
					'default_value' => 20,
				),
				'tablet'  => array(
					'min'           => 0,
					'max'           => 100,
					'step'          => 1,
					'default_value' => 20,
				),
				'desktop' => array(
					'min'           => 0,
					'max'           => 100,
					'step'          => 1,
					'default_value' => 20,
				),
			),
		) ) 
	);
	// Content size // 
	$wp_customize->add_setting(
    	'breadcrumb_content_size',
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_range_value',
			'transport'         => 'postMessage',
			'priority'  => 15,
		)
	);
	$wp_customize->add_control( 
	new Avril_Customizer_Range_Control( $wp_customize, 'breadcrumb_content_size', 
		array(
			'label'      => __( 'Content Size', 'avril-pro' ),
			'section'  => 'breadcrumb_setting',
			'media_query'   => true,
			'input_attr'    => array(
				'mobile'  => array(
					'min'           => 0,
					'max'           => 50,
					'step'          => 1,
					'default_value' => 16,
				),
				'tablet'  => array(
					'min'           => 0,
					'max'           => 50,
					'step'          => 1,
					'default_value' => 16,
				),
				'desktop' => array(
					'min'           => 0,
					'max'           => 50,
					'step'          => 1,
					'default_value' => 16,
				),
			),
		) ) 
	);
	}
	
	/*=========================================
	Avril Container
	=========================================*/
	$wp_customize->add_section(
        'avril_container',
        array(
        	'priority'      => 2,
            'title' 		=> __('Container','avril-pro'),
			'panel'  		=> 'avril_general',
		)
    );
	
	if ( class_exists( 'Avril_Customizer_Range_Control' ) ) {
		//container width
		$wp_customize->add_setting(
			'avril_site_cntnr_width',
			array(
				'default'			=> '1200',
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'avril_sanitize_range_value',
				'transport'         => 'postMessage',
				'priority'      => 1,
			)
		);
		$wp_customize->add_control( 
		new Avril_Customizer_Range_Control( $wp_customize, 'avril_site_cntnr_width', 
			array(
				'label'      => __( 'Container Width', 'avril-pro' ),
				'section'  => 'avril_container',
				 'media_query'   => false,
                'input_attr'    => array(
                    'desktop' => array(
                        'min'           => 768,
                        'max'           => 2000,
                        'step'          => 1,
                        'default_value' => 1200,
                    ),
                ),
			) ) 
		);
		
		//Margin Top
		$wp_customize->add_setting(
			'avril_cntnr_tb_padding',
			array(
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'avril_sanitize_range_value',
				'transport'         => 'postMessage',
				'priority'      => 3,
			)
		);
		$wp_customize->add_control( 
		new Avril_Customizer_Range_Control( $wp_customize, 'avril_cntnr_tb_padding', 
			array(
				'label'      => __( 'Top Bottom Padding', 'avril-pro' ),
				'section'  => 'avril_container',
				 'media_query'   => false,
                'input_attr'    => array(
                    'desktop' => array(
                        'min'           => 0,
                        'max'           => 200,
                        'step'          => 1,
                        'default_value' => 100,
                    ),
                ),
			) ) 
		);
	}
}

add_action( 'customize_register', 'avril_genearl_setting' );


// breadcrumb selective refresh
function avril_breadcrumb_section_partials( $wp_customize ){

	// hs_breadcrumb
	$wp_customize->selective_refresh->add_partial(
		'hs_breadcrumb', array(
			'selector' => '#breadcrumb-section',
			'container_inclusive' => true,
			'render_callback' => 'breadcrumb_setting',
			'fallback_refresh' => true,
		)
	);
	
	//hs_breadcrumb_bottom
	$wp_customize->selective_refresh->add_partial(
		'hs_breadcrumb_bottom', array(
			'selector' => '#breadcrumb-section .breadcrumb-footer',
			'container_inclusive' => true,
			'render_callback' => 'breadcrumb_setting',
			'fallback_refresh' => true,
		)
	);
	
	//hs_breadcrumb_subs
	$wp_customize->selective_refresh->add_partial(
		'hs_breadcrumb_subs', array(
			'selector' => '#breadcrumb-section .breadcrumb-widget',
			'container_inclusive' => true,
			'render_callback' => 'breadcrumb_setting',
			'fallback_refresh' => true,
		)
	);
	
	// breadcrumb_title_enable
	$wp_customize->selective_refresh->add_partial(
		'breadcrumb_title_enable', array(
			'selector' => '#breadcrumb-section .breadcrumb-heading',
			'container_inclusive' => true,
			'render_callback' => 'breadcrumb_setting',
			'fallback_refresh' => true,
		)
	);
	// breadcrumb_path_enable
	$wp_customize->selective_refresh->add_partial(
		'breadcrumb_path_enable', array(
			'selector' => '#breadcrumb-section .breadcrumb-list',
			'container_inclusive' => true,
			'render_callback' => 'breadcrumb_setting',
			'fallback_refresh' => true,
		)
	);	
	}

add_action( 'customize_register', 'avril_breadcrumb_section_partials' );

<?php
function avril_pricing_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Pricing Section
	=========================================*/
	$wp_customize->add_section(
		'pricing_setting', array(
			'title' => esc_html__( 'Pricing Section', 'avril-pro' ),
			'priority' => 8,
			'panel' => 'avril_frontpage_sections',
		)
	);
	
	// pricing Header Section // 
	$wp_customize->add_setting(
		'pricing_headings'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_text',
			'priority' => 3,
		)
	);

	$wp_customize->add_control(
	'pricing_headings',
		array(
			'type' => 'hidden',
			'label' => __('Header','avril-pro'),
			'section' => 'pricing_setting',
		)
	);
	
	// Pricing Title // 
	$wp_customize->add_setting(
    	'pricing_title',
    	array(
	        'default'			=> __('Technology from tomorrow','avril-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 4,
		)
	);	
	
	$wp_customize->add_control( 
		'pricing_title',
		array(
		    'label'   => __('Title','avril-pro'),
		    'section' => 'pricing_setting',
			'type'           => 'text',
		)  
	);
	
	// Service Subtitle // 
	$wp_customize->add_setting(
    	'pricing_subtitle',
    	array(
	        'default'			=> __('Outstanding <span class="av-heading animate-7"><span class="av-text-wrapper"><b class="is-show">Pricing</b>                                   <b>Pricing</b><b>Pricing</b></span></span>','avril-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_html',
			'priority' => 5,
		)
	);	
	
	$wp_customize->add_control( 
		'pricing_subtitle',
		array(
		    'label'   => __('Subtitle','avril-pro'),
		    'section' => 'pricing_setting',
			'type'           => 'textarea',
		)  
	);
	
	// PricingDescription // 
	$wp_customize->add_setting(
    	'pricing_description',
    	array(
	        'default'			=> __('Lorem Ipsum is simply dummy of printing and typesetting and industry. Lorem Ipsum been.','avril-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_text',
			'transport'         => $selective_refresh,
			'priority' => 6,
		)
	);	
	
	$wp_customize->add_control( 
		'pricing_description',
		array(
		    'label'   => __('Description','avril-pro'),
		    'section' => 'pricing_setting',
			'type'           => 'textarea',
		)  
	);

	// Pricing content Section // 
	
	$wp_customize->add_setting(
		'porfolio_content_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_text',
			'priority' => 7,
		)
	);

	$wp_customize->add_control(
	'porfolio_content_head',
		array(
			'type' => 'hidden',
			'label' => __('Content','avril-pro'),
			'section' => 'pricing_setting',
		)
	);
	
	if ( class_exists( 'Avril_Customizer_Range_Control' ) ) {
		$wp_customize->add_setting(
			'pricing_display_num',
			array(
				'default' => '3',
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'avril_sanitize_range_value',
				'priority' => 8,
			)
		);
		$wp_customize->add_control( 
		new Avril_Customizer_Range_Control( $wp_customize, 'pricing_display_num', 
			array(
				'label'      => __( 'No. of Pricing Display', 'avril-pro' ),
				'section'  => 'pricing_setting',
				 'media_query'   => false,
					'input_attr'    => array(
						'desktop' => array(
							'min'           => 1,
							'max'           => 100,
							'step'          => 1,
							'default_value' => 3,
						),
					),
			) ) 
		);
	}
	
	// Pricing column // 
	$wp_customize->add_setting(
    	'price_sec_column',
    	array(
	        'default'			=> '4',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_select',
			'priority' => 9,
		)
	);	

	$wp_customize->add_control(
		'price_sec_column',
		array(
		    'label'   		=> __('Pricing Column','avril-pro'),
		    'section' 		=> 'pricing_setting',
			'type'			=> 'select',
			'choices'        => 
			array(
				'12' => __( '1 column', 'avril-pro' ),
				'6' => __( '2 column', 'avril-pro' ),
				'4' => __( '3 column', 'avril-pro' ),
				'3' => __( '4 column', 'avril-pro' ),
			) 
		) 
	);
}

add_action( 'customize_register', 'avril_pricing_setting' );

// pricing selective refresh
function avril_pricing_section_partials( $wp_customize ){
	
	// pricing_title
	$wp_customize->selective_refresh->add_partial( 'pricing_title', array(
		'selector'            => '.home-pricing .heading-default .ttl',
		'settings'            => 'pricing_title',
		'render_callback'  => 'avril_pricing_title_render_callback',
	
	) );
	
	// pricing_subtitle
	$wp_customize->selective_refresh->add_partial( 'pricing_subtitle', array(
		'selector'            => '.home-pricing .heading-default h3',
		'settings'            => 'pricing_subtitle',
		'render_callback'  => 'avril_pricing_subtitle_render_callback',
	
	) );
	
	// pricing_description
	$wp_customize->selective_refresh->add_partial( 'pricing_description', array(
		'selector'            => '.home-pricing .heading-default p',
		'settings'            => 'pricing_description',
		'render_callback'  => 'avril_pricing_description_render_callback',
	
	) );
	
	}

add_action( 'customize_register', 'avril_pricing_section_partials' );

// pricing_title
function avril_pricing_title_render_callback() {
	return get_theme_mod( 'pricing_title' );
}

// pricing_subtitle
function avril_pricing_subtitle_render_callback() {
	return get_theme_mod( 'pricing_subtitle' );
}

// service description
function avril_pricing_description_render_callback() {
	return get_theme_mod( 'pricing_description' );
}
<?php
function avril_portfoilo_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Porfolio  Section
	=========================================*/
	$wp_customize->add_section(
		'portfolio_setting', array(
			'title' => esc_html__( 'Porfolio Section', 'avril-pro' ),
			'priority' => 5,
			'panel' => 'avril_frontpage_sections',
		)
	);
	
	// Settings
	$wp_customize->add_setting(
		'portfolio_settings'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_text',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
	'portfolio_settings',
		array(
			'type' => 'hidden',
			'label' => __('Settings','avril-pro'),
			'section' => 'portfolio_setting',
		)
	);
	
	// portfolio Tab Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'hs_portfolio_tab' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'avril_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'transport'         => $selective_refresh,
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'hs_portfolio_tab', 
		array(
			'label'	      => esc_html__( 'Hide / Show Filter Tab', 'avril-pro' ),
			'section'     => 'portfolio_setting',
			'type'        => 'checkbox'
		) 
	);
	
	// Portfolio Header Section // 
	$wp_customize->add_setting(
		'portfolio_headings'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_text',
			'priority' => 3,
		)
	);

	$wp_customize->add_control(
	'portfolio_headings',
		array(
			'type' => 'hidden',
			'label' => __('Header','avril-pro'),
			'section' => 'portfolio_setting',
		)
	);
	
	// Porfolio Title // 
	$wp_customize->add_setting(
    	'Porfolio_title',
    	array(
	        'default'			=> __('Technology from tomorrow','avril-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 4,
		)
	);	
	
	$wp_customize->add_control( 
		'Porfolio_title',
		array(
		    'label'   => __('Title','avril-pro'),
		    'section' => 'portfolio_setting',
			'type'           => 'text',
		)  
	);
	
	// Service Subtitle // 
	$wp_customize->add_setting(
    	'porfolio_subtitle',
    	array(
	        'default'			=> __('Outstanding <span class="av-heading animate-7"><span class="av-text-wrapper"><b class="is-show">Porfolio</b>                                   <b>Porfolio</b><b>Porfolio</b></span></span>','avril-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_html',
			'priority' => 5,
		)
	);	
	
	$wp_customize->add_control( 
		'porfolio_subtitle',
		array(
		    'label'   => __('Subtitle','avril-pro'),
		    'section' => 'portfolio_setting',
			'type'           => 'textarea',
		)  
	);
	
	// porfolio Description // 
	$wp_customize->add_setting(
    	'porfolio_description',
    	array(
	        'default'			=> __('Lorem Ipsum is simply dummy of printing and typesetting and industry. Lorem Ipsum been.','avril-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_text',
			'transport'         => $selective_refresh,
			'priority' => 6,
		)
	);	
	
	$wp_customize->add_control( 
		'porfolio_description',
		array(
		    'label'   => __('Description','avril-pro'),
		    'section' => 'portfolio_setting',
			'type'           => 'textarea',
		)  
	);

	// porfolio content Section // 
	
	$wp_customize->add_setting(
		'porfolio_contents_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_text',
			'priority' => 7,
		)
	);

	$wp_customize->add_control(
	'porfolio_contents_head',
		array(
			'type' => 'hidden',
			'label' => __('Content','avril-pro'),
			'section' => 'portfolio_setting',
		)
	);
	
	if ( class_exists( 'Avril_Customizer_Range_Control' ) ) {
		$wp_customize->add_setting(
			'portfolio_display_num',
			array(
				'default' => '10',
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'avril_sanitize_range_value',
				'priority' => 8,
			)
		);
		$wp_customize->add_control( 
		new Avril_Customizer_Range_Control( $wp_customize, 'portfolio_display_num', 
			array(
				'label'      => __( 'No. of Portfolio Display', 'avril-pro' ),
				'section'  => 'portfolio_setting',
				 'media_query'   => false,
					'input_attr'    => array(
						'desktop' => array(
							'min'           => 1,
							'max'           => 100,
							'step'          => 1,
							'default_value' => 10,
						),
					),
			) ) 
		);
	}
}

add_action( 'customize_register', 'avril_portfoilo_setting' );

// portfolio selective refresh
function avril_Porfolio_section_partials( $wp_customize ){	
	// hs_portfolio_tab
	$wp_customize->selective_refresh->add_partial(
		'hs_portfolio_tab', array(
			'selector' => '.home-portfolio .av-tab-filter',
			'container_inclusive' => true,
			'render_callback' => 'portfolio_setting',
			'fallback_refresh' => true,
		)
	);
	
	// Porfolio_title
	$wp_customize->selective_refresh->add_partial( 'Porfolio_title', array(
		'selector'            => '.home-portfolio .heading-default .ttl',
		'settings'            => 'Porfolio_title',
		'render_callback'  => 'avril_Porfolio_title_render_callback',
	
	) );
	
	// porfolio_subtitle
	$wp_customize->selective_refresh->add_partial( 'porfolio_subtitle', array(
		'selector'            => '.home-portfolio .heading-default h3',
		'settings'            => 'porfolio_subtitle',
		'render_callback'  => 'avril_porfolio_subtitle_render_callback',
	
	) );
	
	// porfolio_description
	$wp_customize->selective_refresh->add_partial( 'porfolio_description', array(
		'selector'            => '.home-portfolio .heading-default p',
		'settings'            => 'porfolio_description',
		'render_callback'  => 'avril_porfolio_description_render_callback',
	
	) );
	
	}

add_action( 'customize_register', 'avril_Porfolio_section_partials' );

// Porfolio_title
function avril_Porfolio_title_render_callback() {
	return get_theme_mod( 'Porfolio_title' );
}

// porfolio_subtitle
function avril_porfolio_subtitle_render_callback() {
	return get_theme_mod( 'porfolio_subtitle' );
}

// service description
function avril_porfolio_description_render_callback() {
	return get_theme_mod( 'porfolio_description' );
}